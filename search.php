<?php  require("head.php");include("inc_forbidaccess.php"); ?>
<table width=100% border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFEEAA" bordercolor="#ACA899">
<form action="" method="get">
<tr><td>条数:<input type="text" name="limits" maxlength="5" size="2" value="20"></td></tr>
<tr><td>搜:<select name="tiaojian">
<option value="number">扫描单号</option>
<option value="kefuname">客户名称</option>
<option value="shoujiandianhua">收件电话</option>
<option value="shoujianren">收件人</option>
<option value="raddress">收件地址</option>
<option value="sdate">寄件日期</option>
<option value="qianshouren">签收人</option>
<option value="payway">支付方式</option>

</select>
<tr><td>关键字:<input type="text" name="keys" value=""></td></tr>
<tr><td><input type="submit" name="subs" value="搜索"></td></tr>
<tr><td><?php $_GET['keys']==true ? print "搜索完毕" : print "请点击一个选项进行搜索"; ?></td></tr>
</form>
<!--<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">-->
<?php
	//FFEEAA 背景颜色 边框颜色 ACA899  棕色 FFEEAA
include ("conn.php");
//引用链接数据库
$table = "daojian";
$sql = "select * from `$table`";
$where = "";

if (!empty ($_GET['keys'])) {
$ziduan=$_GET['tiaojian'];
print($ziduan);
switch ($ziduan)
{

case "number":	$ziduan = "扫描单号";
  break;
case "kefuname":	$ziduan = "客户名称";
  break;
  case "shoujiandianhua":	$ziduan = "收件电话";
  break;
  case "shoujianren":	$ziduan = "收件人";
  break;
  case "raddress":	$ziduan = "收件地址";
  break;
  case "c":	$ziduan = "扫描单号";
  break;
  case "payway":	$ziduan = "货款支付方式";
  break;
  case "qianshouren":	$ziduan = "签收人";
  break;
  case "sdate":	$ziduan = "寄件日期";
  break;
default:	$ziduan = "收件地址";
}

	$arr = explode(" ", $_GET['keys']);
	$where = " where " . $ziduan . " like '%" . $arr[0] . "%'"; //模糊搜索
	if (count($arr) < 6) //空格分隔查找不能大于6个。免得报错。
		{
		for ($i = 1; $i < count($arr); $i++) {
			$where=$where. " or " . $ziduan . " like '%" . $arr[$i] . "%'";

		}
	}


	$sql .= $where;
}//判断关键字是否为空完毕
 else {

	if (!empty ($_GET['limits'])) {
		$tiaoshu = "limit 0," . $_GET['limits'];
	} else {
		$tiaoshu = "limit 0,15";
	}
	$sql = "select * from `$table` order by id $tiaoshu";

}//是否为空的反向完毕

//echo $sql;
$quary = mysql_query($sql); //query只执行一次sql语句

//iconv_substr($rs['contents'],0,5,"gbk")起始位，长度，编码截取5个字符，中文英文皆可
$key = @ $_GET['keys'];
$key=trim($key);
//if($key!="")
//{print_r($arr);}

while ($rs = mysql_fetch_array($quary)) {
	$title = $rs['扫描单号'];
	$content = $rs['客户名称'];
	if ($key != "") {

		for ($i = 0; $i < count($arr); $i++) {
			$title = preg_replace("/($arr[$i])/", "<b><font color=black size=5>\\1</font></b>", $title);
			$content = preg_replace("/($arr[$i])/", "<b><font color=#RED fontsize=1>\\1</font></b>", $content);
		}

	}
?>
 <tr bgcolor="#FFEEAA"><td>单号:<a href="view.php?id=<?php echo $rs["id"]."&userid=".@$_GET["userid"]."&usersid=".@$_GET["usersid"];?>"><?php echo $title;?></a>
</td></tr>
<tr bgcolor="#ffffff"><td>扫描时间:<?php echo $rs['扫描时间']?></td>
<tr bgcolor="#ffffff"><td>客户名称:<?php echo $content;


	//echo iconv_substr($content, 0, 300, "gbk") . "..";
	//echo "<hr>";
	//echo $rs['contents']
?>
</td></tr>
<?php


}
?>
<tr  bgcolor=#FFFFFF><td><a href='index.php'>进入首页</a></td></tr>
<tr  bgcolor=#FFFFFF><td><a href='manage.php'>管理中心</a></td></tr>

</table>
<?php require'foot.php';?>