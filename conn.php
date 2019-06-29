<?php
//include('head.php');
require'mysql_config.php';
mysql_connect($sqladdress,$username,$databasepassword)//数据库id地址/数据库用户名/数据库密码)、默认端口为3306如果未改可以不填
or die("mysql连接失败，请联系技术部");
//$connect=mysql_connect($sqladdress,$username,$databasepassword);
//if(!$connect){
//exit('数据库连接失败，请检查后重试');
//}
@mysql_select_db($databasename)or die("选择数据库失败");
mysql_query('set names utf8');
$table="daojian";
?>