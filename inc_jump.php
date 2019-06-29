<?php
/*
 * Created on 2015-1-20
 * ��ɳ�����п������޹�˾����
 *
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 function jump($url,$time=2)
 {
 	echo "即将跳转到".$url;
 //header("Location:$url");

 echo '<meta http-equiv=\'refresh\' content=\''.$time.';url="'.$url.'\'>';
 //exit();
 }
 /*
 <meta http-equiv='refresh' content='3;url=manger.php?userid=1&usersid=c7ae3d8ea294cd4037eb472dcfe1781f'><a href='manger.php?userid=1&usersid=c7ae3d8ea294cd4037eb472dcfe1781f'>等不及了，马上进入后台</a>
*/
?>
