<?php
include('head.php');//解决乱码以及加表头！
include("conn.php");//引用链接数据库
include("inc_forbidaccess.php");
include("inc_json.php");
if(!empty($_POST['submit']))//如果没提交没有值会报错，所以加个判断sub就是下面表单中的sub按钮
{
 //$pid=$_POST["id"];
 $scallnumber=$_POST["scallnumber"];
 $scalltime=$_POST["scalltime"];
 $uploadtime=$_POST["uploadtime"];
 $scallsite=$_POST["scallsite"];
 $beforesie=$_POST["beforesie"];
 $classtime=$_POST["classtime"];
 $forecast=$_POST["forecast"];
 $pcount=$_POST["pcount"];
 $pheight=$_POST["pheight"];
 $operator=$_POST["operator"];
 $jijiansite=$_POST["jijiansite"];
 $customer=$_POST["customer"];
 $rperson=$_POST["rperson"];
 $raddaddress=$_POST["raddaddress"];
 $pcount=$_POST["pcount"];
 $pheight=$_POST["pheight"];
 $ordernumber=$_POST["ordernumber"];
 $ordertype=$_POST["ordertype"];
 $packagetype=$_POST["packagetype"];
 $destination=$_POST["destination"];
 $paijiansite=$_POST["paijiansite"];
 $serviceway=$_POST["serviceway"];
 $goods=$_POST["goods"];
 $payway=$_POST["payway"];
 $daishou=$_POST["daishou"];
 $baojia=$_POST["baojia"];
 $statementcost=$_POST["statementcost"];
 $peisongstate=$_POST["peisongstate"];
 $note=$_POST["note"];

$sql="insert into `$table`(`id`,`扫描单号`,`扫描时间`,`上传时间`,`扫描站点`,`上一站点`,`班次`,`预报总运单`,`件数`,`重量`,`操作员`,`寄件站点`,`客户名称`,`收件人`,`收件地址`,`订单号码`,`订单类型`,`包装类型`,`目的地`,`派件站点`,`服务方式`,`商品`,`货款支付方式`,`代收货款`,`保价金额`,`声明价值`,`配送状态`,`备注`)
    values(null,'$scallnumber','$scalltime','$uploadtime','$scallsite','$beforesie','$classtime','$forecast','$pcount','$pheight','$operator','$jijiansite','$customer',
	'$rperson','$raddaddress','$ordernumber','$ordertype','$packagetype','$destination','$paijiansite','$serviceway','$goods','$payway','$daishou','$baojia','$statementcost','$peisongstate','$note')";

    //运单唯一编号，产品名称，产品备注，发件人，发贱人手机，发件人地址收件人，收件人手机，收件人地址，客户名称，支付方式，代付金额， 报价金额
//echo $sql;

if(empty($_POST["scallnumber"]))
{

	jsonecho("4","运单号必须填写");
	return;
}

if( mysql_query($sql))
{
	//echo "success";
	jsonecho("0","添加运单号成功");

}
else
{
	//失败原因进行查询！
require("inc_isexist.php");
	if(isexist($number))
	{
	jsonecho("1","添加失败，运单号已存在！");
		//echo '添加失败，运单号已存在！';
	}
	else
	{
		jsonecho("2","添加失败！原因未知！");
		//echo '添加失败！原因未知';
	}

//$result=mysql_fetch_array($run_sql);//资源转为数组，显示详细数组信息。
}



//unset($_POST);

}
else
{
		jsonecho("3","无效的请求");
	//echo "请填写内容 ";
}

//include("yundanadd.html");
?>


