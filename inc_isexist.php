<?php
/*
 * Created on 2015-1-20
 */
 //运单是否存在
function  isexist($number,$table="yundan_c",$columname="扫描单号")//php函数是个怪胎，竟然不需要定义返回值类型， 字段名
{

$sql="select * from ".$table." where $columname=$number";
//echo $sql;
//echo $sql;
if($run_sql=mysql_query("select * from $table where ".$columname."=$number"))
{
//执行sql命令。
//$shuzu_sid=mysql_fetch_array($run_sql);//资源转为数组，显示详细数组信息。
//$query=mysql_query($sql);
$num=mysql_num_rows($run_sql);
//echo $num."ff";
if($num>0)
{
return true;
}

}
//cho ("共查询到了".$num."条数据");

return false;
}
?>
