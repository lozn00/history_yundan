<?php  require("head.php");include("inc_forbidaccess.php"); ?>
<style>
input[type="text"]
{
  width:150px;
  display:block;
  margin-bottom:10px;
  background-color:yellow;
  font-family: Verdana, Arial;
}

input[type="button"]
{
  width:120px;
  margin-left:35px;
  display:block;
  font-family: Verdana, Arial;
}
</style>
<div class="biaoti">快递单号导入系统csv->mysql</div>
<?php
include ("inc_insertcsv.php");
//	insertcsv("upload/" . $_FILES["file"]["name"]); //开始读入文件

echo $_POST["doing"];
switch ($_POST["doing"]) {
	case "upload" :
		upload();
		break;
	case "insert" :insert();

		break;
	default :
		echo "先点击上传到服务器目录，然后点击导入数据库";
		echo $_POST["doing"];
		break;

}//switch 结束

function insert()
{
	if (!file_exists("upload/temp.csv"))
	{
		echo "upload/temp.csv不存在！";
		return;
	}

		insertcsv("upload/temp.csv");
}


function upload() {

	if ($_FILES["file"]["size"] > 200000000) {
		echo "上传的文件过大！";
	}

	if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "text/plain") || ($_FILES["file"]["type"] == "image/pjpeg"))) {
		if ($_FILES["file"]["error"] > 0) {

			if ($_FILES["file"]["error"] == 2) {
				echo "您上传的文件超过了html设置的大小";
			} else
				if ($_FILES["file"]["error"] == 3) {
					echo "传输中断！";
				} else
					if ($_FILES["file"]["error"] == 4) {
						echo "没有文件被上传！";
					} else {
						echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					}
		} else {
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024 / 1024) . " M<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " K<br />";
			echo "Size: " . ($_FILES["file"]["size"]) . " B<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
			//	if (file_exists("upload/" . $_FILES["file"]["name"])) {
			if (file_exists("upload/temp.csv")) {
				echo $_FILES["file"]["name"] . "上传的文件已存在，执行删除操作！";
				//if (@ unlink("upload/" . $_FILES["file"]["name"])) {
				if (@ unlink("upload/temp.csv")) {
					echo "删除成功！";
				} else {
					echo "删除失败！";
				}
			}
			//if (move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]
			if (move_uploaded_file($_FILES["file"]["tmp_name"], "upload/temp.csv")) {
				//include ("inc_insertcsv.php");

				//	insertcsv("upload/" . $_FILES["file"]["name"]); //开始读入文件
				echo "<br/>上传文件到upload文件夹完毕!";

			} else {
				mkdir("upload");
				echo "移动临时文件" . $_FILES["file"]["tmp_name"] . "到upload/temp.csv失败！可能是upload目录不存在或temp.csv被占用！当前已尝试创建upload文件夹请试一次";
			}

		}
	} else {

		if (!empty ($_POST["submit"])) {
			echo "您上传的文件类型为：" . $_FILES["file"]["type"] . "服务器已拒绝！";
			echo "错误指令：" . $_FILES["file"]["error"];
			echo "请选择一个csv文件进行上传导入！";
		}
	}
}//upload函数结束
?>

<form action="" method="post"
enctype="multipart/form-data">
<label for="file">文件名:</label>
<input type="hidden" name="doing" value ="upload">
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="上传到目录" />
<br>
<label>把电脑的csv文件上传到upload目录下</label>
</form>
<hr>
<form action="" method="post">
<input type="hidden" name="doing" value ="insert">
<input type="submit" name="submit" value="导入数据库"/>
<br>
<label>把upload目录下的temp.csv导入数据库，表名为daojian</label>
</form>

<hr>
<div class="tip">
		<b>注意：</b></br>
	从软件中导出到xls格式，然后用自带的word转换为csv格式然后浏览上传即可</br>
	转换为csv格式后之后不要修改保存，这样做word软件可能会把<b>数字</b>数据变成科学型数据</br>
	那么导入到数据库后是科学型数据。<br/>
	导出之前请看清楚是否有字段重复出现，<b>在派单表中重量，件数，收件人，收件地址等重复了</b><br/>
	重复的字段出现会导致插入失败！表数据中不能包含英文半角逗号,半角，否则可能出现插入数据出错！
	</div>
<div class="daohang">
<li><a href="manage.php">管理中心</a></li>
<li><a href="index.php">网站首页</a></li>
</div>