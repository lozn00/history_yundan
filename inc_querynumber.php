<?php
 include("head.php");
 require("conn.php");
 require("inc_forbidaccess.php");
 include("inc_isexist.php");
 require("inc_json.php");
 $cl="扫描单号";
 if(isset($_GET["number"]))
 {

if(isexist($_GET["number"],"daojian","扫描单号"))
 {
$query=mysql_query("select * from $table where $cl=".$_GET["number"]);
$arr=mysql_fetch_array($query);
$arrs=array(
array(
 'id',//
 '扫描单号',//
'扫描时间',//
'上传时间',//
'扫描站点',//
'上一站点',//
'班次',//
'预报总运单',//
'运单件数',//
'运单重量',//
'操作员',//
'寄件站点',//
'客户名称',//
'收件人',//
'收件地址',//
'件数',//
'重量',//
'订单号码',//
'订单类型',//
'包装类型',//
'目的地',//
'派件站点',//
'服务方式',//
'商品',//
'货款支付方式',//
'代收货款',//
'保价金额',//
'声明价值',//
'配送状态',//
'备注',//
 ) ,
array(
$arr["id"],//
$arr["扫描单号"],//
$arr["扫描时间"],//
$arr["上传时间"],//
$arr["扫描站点"],//
$arr["上一站点"],//
$arr["班次"],//
$arr["预报总运单"],//
$arr["运单件数"],//
$arr["运单重量"],//
$arr["操作员"],//
$arr["寄件站点"],//
$arr["客户名称"],//
$arr["收件人"],//
$arr["收件地址"],//
$arr["件数"],//
$arr["重量"],//
$arr["订单号码"],//
$arr["订单类型"],//
$arr["包装类型"],//
$arr["目的地"],//
$arr["派件站点"],//
$arr["服务方式"],//
$arr["商品"],//
$arr["货款支付方式"],//
$arr["代收货款"],//
$arr["保价金额"],//
$arr["声明价值"],//
$arr["配送状态"],//
$arr["备注"],//
  )
  );

 jsonecho("0","查询成功");
echo "{";

foreach ($arr as $key=>$value)
{

	if($key>0 )
	{
		continue;
	}
   echo '"'.$key.'":"'.$value.'"';
   echo ',';//分割


    }



 }
 else
 {


 jsonecho("1","运单不存在");
 	}

 }


?>

