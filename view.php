<?php  require("head.php");include("inc_forbidaccess.php"); ?>



<table width=100% border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#ACA899" id="show">

<?php
include ("conn.php");

//引用链接数据库

if (!empty ($_GET['id'])) //得到传递过来的参数$_GET语法
	{

	$sql = "select * from `$table` where `id`='" . $_GET['id'] . "'"; //id是通过传递过来的。
	//在sql查询中数据库名、表名通通用`，即tab上面那个键
	$query = mysql_query($sql); //执行sql命令。
	$rs = mysql_fetch_array($query); //资源转为数组，里面存放了文章标题、文章id，文章内容等。
	//print_r($rs);//显示数组详细信息
	//Function name must be a string in 如果函数面前加$就会报类似错误
	$sqlhit = "update `zheng` set hits=hits+1 where `id`='" . $_GET['id'] . "'";
	mysql_query($sqlhit);
}
else
{
echo "您没有传递ID";
	include("inc_jump.php");
	//jump("view.php?id=247");
	jump("index.php");
	//FFEEAA 背景颜色 边框颜色 ACA899  棕色 FFEEAA
}

?>
 <tr border=1  bgcolor="#FFEEAA" ><td>运单号码</td><td>订单号码</td><td>订单类型</td><td>服务方式</td><td>寄件日期</td>

 <td>目的地</td><td>派件地点</td><td>件数</td> <td>重量</td><td>代收货款</td>
 <td>支付方式</td><td>签收人</td><td>签收日期</td>
  </tr>

 <tr>
<td><?php echo $rs["扫描单号"];?></td><td><?php echo $rs["订单号码"];?></td><td><?php echo $rs["订单类型"];?></td> <td><?php echo $rs["服务方式"];?> </td><td><?php echo $rs["寄件日期"];?></td>

 <td><?php echo $rs["目的地"];?></td><td><?php echo $rs["派件地点"];?></td><td><?php echo $rs["件数"];?></td> <td><?php echo $rs["重量"];?></td><td><?php echo $rs["代收货款"];?></td>
 <td><?php echo $rs["支付方式"];?></td><td><?php echo $rs["签收人"];?></td><td><?php echo $rs["签收日期"];?></td>
  </tr>


  <tr border=1 bgcolor="#FFEEAA">
   <td>寄件客户</td><td colspan="2">商品名称</td><td>收件人</td><td>收件电话</td><td  colspan="3">收件地址</td>
 <td>时效</td><td colspan="2">配送要求</td><td>上传人</td><td>上传日期</td>
  </tr>

    <tr>
   <td><?php echo $rs["客户名称"];?></td><td colspan="2"><?php echo $rs["商品"];?></td><td><?php echo $rs["收件人"];?></td><td><?php echo $rs["收件电话"];?></td><td  colspan="3"><?php echo $rs["收件地址"];?></td>
 <td><?php echo $rs["时效"];?></td><td colspan="2"><?php echo $rs["配送要求"];?></td><td><?php echo $rs["上传人"];?></td><td><?php echo $rs["上传日期"];?></td>
  </tr>
<tr align="center" bgcolor="#ACA899">
<td colspan="5"><a href="search.php">搜索</a></td><td colspan="8"><a href="index.php">首页</a></td>
</tr>

</table>
<?php require'foot.php';?>
