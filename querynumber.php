<?php
require("inc_querynumber.php");
if(!empty($_GET["submit"]))
{
}


?>
<div class="tip">
运单查询系统API演示
</div>
  <form action="inc_querynumber.php?number="<?php echo $result=isset($_GET["number"])? trim($_POST['number']) : '' ?> method="get" enctype="text/plain">

  <input type="text" name="number" value="12345" size="40" maxlength="40"/>

  <input type="submit" name="submit" value="查询"/>

  </form>
  <li>  <a href="index.php">网站首页</a></li>


</html>