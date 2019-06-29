<?php  require("head.php");require("inc_forbidaccess.php"); ?>
<table width=100% border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFEEAA" bordercolor="#ACA899">


<?php
	//FFEEAA 背景颜色 边框颜色 ACA899  棕色 FFEEAA
include("conn.php");//引用链接数据库
$table="daojian";
function serach()
{
if(!empty($_GET['keys']))
{

$w=" `title` like '%".$_GET['keys']."%'" ;//模糊搜索
echo "搜索完毕!<br>";
}
else
{
$w=1;
}
if(!empty($_GET['limits']))
{
$tiaoshu=" limit ".$_GET['limits'];
}
else
{$tiaoshu='';}
$sql="select * from `$table` where $w order by id desc $tiaoshu";
$quary=mysql_query($sql);
return $quary;
}
function pageurl()//得到相对路径+当前文件名
{
$url=$_SERVER["REQUEST_URI"]; //获取服务器后面的地址{除域名外}
$url=parse_url($url);//将URL解析成有固定键值的数组的函数
$url=$url["path"];//数组变量转换为变量得到相对地址
return $url;
}

function pageinfo($getpage,$url="")//防止出现负页
{
$url=$url;
if($getpage>5)
{

echo "<a href=$url?&page=".($getpage-5).">".($getpage-5)."</a>|";
echo "<a href=$url?&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==5)
{
echo "<a href=$url?&page=".($getpage-4).">".($getpage-4)."</a>|<a href=$url?&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==4)
{
echo "<a href=$url?&page=".($getpage-3).">".($getpage-3)."</a>|";
echo "<a href=$url?&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==3)
{

echo "<a href=$url?&page=".($getpage-2).">".($getpage-2)."</a>|<a href=$url?&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==2)
{
echo "<a href=$url?&page=".($getpage-1).">".($getpage-1)."</a>|";
return;
}
if($getpage==1)
{
return;
}

}
$pagesize=10;//定义每一页显示的条数
$url=pageurl();//得到当前相对路径
$sql=mysql_query("SELECT * FROM `$table`");//先执行sql然后统计总数
$num = mysql_num_rows($sql);//记录条数
$countpage = ceil($num/10); //算出总页 并取整数
if(!empty($_GET["page"]))//强制跳转到设置页的首页
{
$getpage=$_GET["page"];
$page=($getpage-1)*$pagesize;
}
else
{
    echo "<script language=\"javascript\">location.href='$url?&page=1';</script>";
    return;
}

//用公式觉得limit取得url的条数。
if($num > $pagesize)
{
 if($getpage<0)
 $getpage=1;
}
//如果所有记录总数大于当前页面要显示的条数，那么把设置limit的前面
if($getpage<=1||$getpage=="1")
{//$page=0;$pagesize=11;
$sql1="select * from `$table` order by id desc limit ".$pagesize;
}
else
{$sql1="select * from `$table` order by id desc limit ".$page.",".$pagesize;//执行sql语句
}
$query=mysql_query($sql1);
echo "<tr bgcolor=#FFEEAA><th>长沙三人行快运有限责任公司运单查询系统</th></tr>";
echo "<tr bgcolor=#FFEEAA><th>共".$num."条单号</th></tr>";

echo "<tr color=red><td>";
pageinfo($getpage);//调用前页数字函数
echo $getpage."|";
echo "<a href=$url?&page=".($getpage+1).">".($getpage+1)."</a>|<a href=$url?&page=".($getpage+2).">".($getpage+2)."</a>|";
echo "<a href=$url?&page=".($getpage+3).">".($getpage+3)."</a>|<a href=$url?&page=".($getpage+4).">".($getpage+4)."</a>|";
echo "<a href=$url?&page=".($getpage+5).">".($getpage+5)."</a>|<a href=$url?&page=".($getpage+6).">".($getpage+6)."</a>";
echo "</td></tr>";


echo "<tr color=red><td>";

echo "<a href=$url?&page=".($getpage-1).">上页</a>-<a href=$url?&page=".($getpage+1).">下页</a>-
<a href=$url?&page=1>首页</a>-<a href=$url?&page=".$countpage.">尾页</a>-<a href='search.php?'>搜索</a>";

echo "</td></tr>";
//$rs=mysql_fetch_array($query);"."

while($rs=mysql_fetch_array($query))
{
?>

<tr bgcolor="#FFEEAA"><td>

单号:<a href="view.php?id=<?php echo $rs['id'];?>">
 <?php echo $rs['扫描单号'];?> </a>
</td></tr>
<tr bgcolor="#ffffff"><td>客户名称:<?php echo $rs['客户名称']?></td></tr>
<tr bgcolor="#ffffff"><td>收件人:<br><?php echo iconv_substr($rs['收件人'],0,20,"gbk")."..";
//echo "<hr>";
//echo $rs['contents']
?>
</td></tr>
<?php

}
?>
<tr bgcolor=#FFFFFF>
<td><b>客服电话：</b>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=694886526&site=qq&menu=yes">
<img border="0" src="http://wpa.qq.com/pa?p=2:694886526:52" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>694886526
</td>
<tr  bgcolor=#FFFFFF>
<td align="center">
<table width=100% align="center">
<td><a href='manage.php'>管理中心</a></td>
<td><a href='http://517gw.com'>公司主页</td>
<td><a href='http://kuaidi100.com'>快递100</td>
</table>
</td>
</tr>
</table>

<?php require'foot.php';?>