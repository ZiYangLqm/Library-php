<?php
require_once ('config.php');//如果没有联系数据库需先连接数据库，若已连接则不执行
require "header.html";
?>

<script language="JavaScript">
function chk(form_register){
	if (form_register.account_log.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("帐号不能为空！");
		form_register.account_log.focus();   
		return (false);   
	}		
	
	if (form_register.password_log.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("密码不能为空！");
		form_register.password_log.focus();   
		return (false);   
	}	

}
</script>
<?php
error_reporting(E_ALL ^ E_NOTICE); 
if($_POST["btnLogin"]){
	$name=$_POST['account_log'];
	$pw=md5($_POST['password_log']);
	$sql="select * from User where User_user='".$name."'"; 
	$result=mysql_query($sql) or die("账号不正确");
	$num=mysql_num_rows($result);
	if($num==0){
		echo "<script>alert('帐号不存在');location='Login.php';</script>";
	}
	while($rs=mysql_fetch_object($result))
	{
		if($rs->User_password!=$pw)
		{
			echo "<script>alert('密码不正确');location='Login.php';</script>";
			mysql_close();
		}
		else 
		{
			$_SESSION['User']=$_POST['account_log'];
			//echo "<script>alert('正转到您的页面');location='Home-Lofin.php?tj=".$_SESSION['User']."';</script>";
			echo "<script>alert('正转到您的页面');location='Home-Lofin.php;</script>";
			header("Location:Home-Page.php");
			mysql_close();
		}
	}
}
?>

<link rel="stylesheet" type="text/css" href="Register.css" />
	<br>
<div class="container">
	<div class="content">
		<div style="float:left;width: 580px;">
		<h2>用戶登录</h2>
		<hr>
		<form id="form_register" name="form_register" method="POST" onSubmit="return chk(this)" action="">
		<table class="register">
			<tr>
				<td><label>帳號</label></td>
				<td><input type="text" name="account_log" id="account_log" placeholder="輸入您的帳號" /></td>
			</tr>
			<tr>
				<td><label>密碼</label></td>
				<td><input type="password" name="password_log" id="password_log" value="" placeholder="輸入您的密碼"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="btnLogin" id="btnLogin" value="登录" /></td>
			</tr>
		</table>
		</form>
	    </div>
	    <div style="width:1px; height:260px; border-left:1px dashed #000; float:right"></div>
	</div><!-- end of .content -->
	 <div class="reg_r">
        <div class="reg_intro">
            <a href="/Login.php">歡迎登录</a>，登錄后您可以<br />
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