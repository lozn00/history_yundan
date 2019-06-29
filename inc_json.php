<?php
/*
 * Created on 2015-1-20
 * ��ɳ�����п������޹�˾����
 *
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
//resultjson("1000","正常");
function jsonecho($code,$text)
{
	//结果和提示
	echo '{"code":'.$code.',"text":"'.$text.'"} ';
}


/*arr结构：
{
	"code":1000,"text":"主文本内容","arrdemo":[{ "姓名":"罗正","年龄":20},{ "姓名":"张三","年龄":20},{ "姓名":"李四","年龄":23}]

}
*/
//jsonarr("10000","你好","ff");
function jsonarr($code,$text,$arr)
{
	//结果和提示
	echo '{';//结构根目录头

	echo '"code":'.$code.',"text":"'.$text.'"';//主信息代码

echo  ',';//连接代码 连接数组名称
echo '"arrdemo"';//定义数组名称
echo  ',';//连接代码
echo '['; //定义数组内容总符号前
//===============================

$arr=array(100,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);

foreach($arr as $value)
{
	echo '{';//子头
	echo '"年龄":,';//姓名
	echo $value;
	echo '}';//子尾
	echo ',';

}

//===============================

echo ']';//定义数组内容后

echo '}';//结构根目录尾部




}


/* 定义二维数组
$arr=array(
             "row1"=>array(100,200,300,400),
             "row2"=>array("num"=>100,"name"=>"Liuxy","score"=>98)
           );

foreach ($arr as $key=>$value)
{
    echo "$key=>$value";
    echo "<br>";
    foreach ($value as $k=>$var) echo "$k=>$var<br>";
}
*/
?>