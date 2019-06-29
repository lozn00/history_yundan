<?php

/*
 * Created on 2015-1-20
 * ��ɳ�����п������޹�˾����
 *
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 *
 */
 //require("conn.php"); 这个使用数据库的时候自然要使用这个。

 require("inc_islogin.php");
 if(!islogin())
 {
  	echo "请登录后再进入";
 	require("inc_jump.php");
 	jump("login.php");
 	exit();
 	//非法操作！
 }
 

?>
