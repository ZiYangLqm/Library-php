<?php session_start();
require_once ('config.php');//如果没有联系数据库需先连接数据库，若已连接则不执行
require "header_login.html";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="SHMn"/> 
<meta name="Copyright" content="SHMn"/> 
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="Register.css" />
<script language="JavaScript">
	$(document).ready(
		function()
		{
			$(':input').blur(
			function() 
			{
	  			// :input is a jQuery extension, selects all input, textarea, select and button elements
	  			// or you can use $('input') to select only <input> elements
	  			if($(this).val().length == 0) 
	  			{
					$(this).addClass('error').attr('placeholder','不可空白'); 
	  			}
			});
			$(':input').focus(
			function() 
			{
	  			$(this).removeClass('error').attr('placeholder','請輸入');
			});
		});
		function ReturnToMain()
		{
			location='Home-Login.php';
		}
</script>

<?php
$sql="select * from User where User_user='".$_SESSION['User']."'"; //显示用户信息
$rs=mysql_fetch_array(mysql_query($sql));
?>
<div class="container">
	<div class="content">
		<div style="float:left;width: 580px;">
		<h2>用户信息</h2>
		<hr>
		<form id="form_register" name="form_register" method="POST"  action="ModifyUser.php">
		<table class="register">
			<tr>
				<td><label>帳&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;號</label><font color="#FF0000"> *不可修改</font></td>
				<td><input type="text" name="account" id="account" value="<? echo $rs['User_user'];?>" /></td>
			</tr>
			<tr>
				<td><label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;別</label></td>
				<td>
				<input type="text" name="gender" id="gender" value="<? echo $rs['User_sex'];?>" />
				</td>
			</tr>
			<tr>
				<td><label>信&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</label></td>
				<td><input type="text" name="email" id="email" value="<? echo $rs['User_email'];?>"/></td>
			</tr>
			<tr>
				<td><label>電&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;話</label></td>
				<td><input type="text" name="tel" id="tel" value="<? echo $rs['User_phone'];?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td> 
				<input type="button" name="btnToMain" id="btnToMain" value="回首页" onclick="ReturnToMain()"/>
				&nbsp;
				<input type="submit" name="btnRegister" id="btnRegister" value="点击可修改" />
				</td>
			</tr>
		</table>
		</form>
	    </div>
	    <div style="width:1px; height:260px; border-left:1px dashed #000; float:right"></div>
	</div><!-- end of .content -->
	 <div class="reg_r">
        <div class="reg_intro">
            <a href="">歡迎您</a>，登錄后您可以<br />
            <br />
            <span class="t1">分享书籍</span><br><br />
            <span class="t2">独乐乐不如众乐乐，和朋友一起分享你的书籍！</span><br><br />
            <span class="t1">阅读书籍</span><br><br />
            <span class="t2">汇聚海量书籍，在线免费观看，支持书籍收藏、浏览书签等功能！</span><br><br />
            <span class="t1">下载书籍</span><br><br />
            <span class="t2">支持TXT格式全文下载！</span><br><br />
            <span class="t1">我的空间</span><br><br />
            <span class="t2">个性的私人空间，好友汇聚一堂！</span>
        </div>
    </div>
</div><!-- end of .container -->
<?php
require "footer.html";
?>