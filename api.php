<style type="text/css">
<!--
-->
</style>
<h3>运单查询API接口文档说明</h3>
提示：登录后必须保存返回的cookies，否则无法实现PC软件客户端、手机客户端的验证。Session也需要用到Cookies
<li><b>运单查询接口</b></li>
</br>
接口网址：<?php echo "http://".$_SERVER["SERVER_NAME"]."\inc_querynumbr.php" ?>
</br>
请求方式：GET请求
</br>
请求参数：number=单号
</br>
演示： <?php echo "http://".$_SERVER["SERVER_NAME"]."\inc_querynumbr.php?number=12345" ?>
</br>
<li><b>运单添加接口</b></li>
</br>
接口网址：<?php echo "http://".$_SERVER["SERVER_NAME"]."\inc_querynumbr.php" ?>
</br>
请求方式：POST请求
</br>
请求参数：submit为提交必须参数 具体参考<?php echo "http://".$_SERVER["SERVER_NAME"]."\querynumbr.html" ?>
的写法</br>
演示： <?php echo "http://".$_SERVER["SERVER_NAME"]."\inc_yundanadd.php" ?>
</br>
<li><b>运单删除接口</b></li>
</br>
接口网址：<?php echo "http://".$_SERVER["SERVER_NAME"]."\inc_querynumbr.php"  ?>
</br>
请求方式：GET请求

</br>
请求参数：del=单号
</br>
演示： <?php echo "http://".$_SERVER["SERVER_NAME"]."\inc_yundandel.php?del=12345" ?>
</br>
</br>
</br>
<li><b><a href="index.php">首页</a></b></li>