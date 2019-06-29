<?php


  //是否已登录授权
function islogin()
{
	//经过调试表明，session在每一个界面如果要调用就必须开始session
if($_SESSION["login"])
{
	return true;
}
else
{
	return false;}
}
?>
