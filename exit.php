<?php
session_start();
//include("head.php");
include ("inc_islogin.php");

if (islogin()) {
	if (@ !session_destroy()) {
		echo "退出失败或已经退出！";

	} else {
		echo "退出成功！";
	}


}
else
{

session_destroy();
		echo "已经退出成功！";
	}

include ("inc_jump.php");
jump("login.php");
?>
