<?php

include("conn.php");

function insertcsv($file)
{
$table="daojian";
$temp=file_get_contents($file);//读入行内容
$temp=iconv("GB2312","UTF-8",$temp);//把读入的转换为utf8否则和数据库不兼容 由于编码转换不支持数组，所以用上面那种方式读入
$arr=explode("\n", $temp);//再继续变为数组
$arr=preg_replace('#,+\s*$#', '', $arr);// 一次处理好后面可能包含的逗号
$cloums=$arr[1];//第二行为列名
$cloums=trim($cloums);//正则无法删除空格，需要使用这个
//处理重量和件数字段重复问题
$count=substr_count($cloums,"件数");//取出文本出现次数
if($count>1)
{	$cloums=str_replace_limit("件数","运单件数",$cloums,1);}
$count=substr_count($cloums,"重量");
if($count>1)
{$cloums=str_replace_limit("重量","运单重量",$cloums,1);}
$arr1=explode(",",$cloums);//算出列的长度 ，方便以后传递，
$columcount=count($arr1);//列的长度
$cloums=trimstpace($cloums);//删除所有空格
//include("conn.php");
echo "<center><p><h1>运单表第一行/标题,第二行/字段</h1></p></center>";
echo "<center><p><h3>".count($arr)."行/".$columcount."列</h3></p></center>";
include("inc_isexist.php");
	for($i=2;$i<count($arr);$i++)//第一行是主标题，第二行没列列标题
	{
	$carr=explode(",",$arr[$i]);
    insertyundanrr($cloums,$carr,$i,$columcount);
//print_r($carr);
   // echo $arr[$i];
	}
}
/**
 * 插入表单 字段和值数组
 * 第一个参数表示：name,age这样的 插入的字段如insert into yundan(第一个参数)
 * line use to show line
 * count use to 循环生成次数
 */
function insertyundanrr($str,$arr,$line,$columcount)

{
	$table="daojian";

	//global $columcount; //转换为全局才能访问外部的那个全局
	//echo $columcount;
	for($i=0;$i<$columcount;$i++)
	{
		if($i+1==$columcount)
           {

           	 $value=$value."'".$arr[$i];
           	  $value=trim($value);//正则无法删除空格，需要使用这个
          $value=$value."'";
           	 }
           else
           { $value=$value."'".$arr[$i]."'".",";}

       }//for结束

$sql="insert into ".$table."(".$str.")values(".$value.")";


if(isexist($arr[0],$table,"扫描单号"))

{
	  	echo "<p>运单号".$arr[0]."已存在！</p>";

  }
  else if(mysql_query($sql))
  {
	echo "<p>运单表第".$line."行导入成功！</p>";
  }
  else
  {
echo "<p>运单表第".$line."行数据导入失败！运单号".$arr[0]."【".$sql."】";
  }

}


/**
 * 删除换行 空格，
 */
function trimall($str)
{
  $qian=array(" ","　","\t","\n","\r");
  $hou=array("","","","","");
 return str_replace($qian,$hou,$str);
}
/**
 * 删除空格
 */
function trimstpace($str)
{
  $qian=array(" ","　","\t");
  $hou=array("","","");
 return str_replace($qian,$hou,$str);
}


/**
 * 替换指定次数
 */
function str_replace_limit($search, $replace, $subject, $limit=-1) {

// constructing mask(s)...

if (is_array($search)) {

foreach ($search as $k=>$v) {

$search[$k] = '`' . preg_quote($search[$k],'`') . '`';

}

}

else {

$search = '`' . preg_quote($search,'`') . '`';

}

// replacement

return preg_replace($search, $replace, $subject, $limit);

}


?>
