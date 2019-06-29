<?php

//用户名密码是否正确！
 function pwdIsok($username,$pwd)

{
$sql="select * from users where username='$username' and pwd='$pwd'";
//echo $sql;
if($run_sql=mysql_query($sql))
{
	$num=mysql_num_rows($run_sql);
	//echo $num; 调试查询返回的记录

if($num>0)
{return true;
}//执行数据库完成了吗诶呦
//echo "你好";
return false; //不管是执行数据库失败还是查询结果没有都失败1
}

}
// 太粗心了，用户名我写出number了搞得我调试了许久


 ?>
