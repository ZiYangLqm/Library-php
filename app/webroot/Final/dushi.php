<?php session_start();
require_once ('config.php');//如果没有联系数据库需先连接数据库，若已连接则不执行
//if(empty($_SESSION['User']))
if(!isset($_SESSION['User']))
{
	require "header.html";
}
else
{
	require("header_login.html");
	//header("location='Home-Lofin.php?tj=".$_SESSION['User']."'");
	//echo "<script>location='Home-Login.php?tj=".$_SESSION['User']."';</script>";
	//echo "<script>location='Home-Lofin.php'</script>";
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="SHMn"/> 
<meta name="Copyright" content="SHMn"/> 

<link rel="stylesheet" type="text/css" href="Home-page.css" />

	<div class="main_list_f"> <!--主题层-->
		<div class="main_list">
			<ul style="list-style-type:none">
				<li>
					<div class="img"> <a href=""> <img src="bookimg/dushi1.jpg" alt="" title=""> </a> </div>
					<div class="writer">作者啦啦：<a href="" target="_blank"></a></div> <!--target 属性规定在何处打开 action URL,_blank在新窗口中打开-->
					<div class="rank">推荐指数：<span>10</span>赞</div>
				</li>
		</div>
		
	
	</div>


<?php
require "footer.html";
?>