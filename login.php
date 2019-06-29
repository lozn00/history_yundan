<?php
session_start();
include("head.php");
/*
 * Created on 2015-1-20
 */

 $u = isset($_POST['u']) ? trim($_POST['u']) : null;//如果设置了删除这个用户名的首尾空！
//是否已社会资
$p = isset($_POST['p']) ? trim($_POST['p']) : null;

//$pmd5 = md5($u . 'wnxd' . md5($p));
if(!empty($_POST["submit"]))
if($u!=null &&$p!=null)
{

include("conn.php");
include("inc_userroot.php");
 if(pwdIsok($u,$p))
 {

 	$_SESSION["login"]="1";//普通用户已登录! 暂时不设置超级用户！
 	echo "登录授权成功！";
 	 	require("inc_jump.php");
 	jump("manage.php");
 	echo '<a href="manage.php">等不及了，马上进入</a>';
 }
 else
 {
 	echo "用户名或密码错误";
 }

}
else
{
	echo "用户名或密码不能为空";
}
// <form action="" method="post">表单中定义编码后php无法获取post数据，导致我调试了半天都没调试出来


?>


  <form action="" method="post">
  <input type="text" name="u" value="admin" size="40" maxlength="40"/>
  <br/>
    <input type="text" name="p" value="admin" size="40" maxlength="40"/>
<br/>

   <input type="submit" name="submit" value="提交"/>
  </form>
<a href="index.php">返回首页</a>
