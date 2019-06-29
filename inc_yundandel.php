<?php
include('head.php');//解决乱码以及加表头！
include("conn.php");//引用链接数据库
include("inc_forbidaccess.php");
include("inc_json.php");
$colum="扫描单号";
 if(isset($_GET["del"]))
 {
 	require("inc_isexist.php");
 	if(!isexist($_GET["del"]))
 	{
 		//echo "运单不存在！";
 		jsonecho("2","单号不存在");
 		exit();
 	}

$number=$_GET['del'];
$sql="delete from `yundan` where `$colum`=".$_GET['del'];

echo $sql;
if(mysql_query($sql))

{
	jsonecho("0","删除成功！");
 //echo "删除成功！";
 }

 else
 {
 	jsonecho("1","删除失败！");
 	//echo "删除失败！";
 }

 }
 else
 {
 		jsonecho("3","没有传递单号");
 	//echo "非法操作";
 }
?>
