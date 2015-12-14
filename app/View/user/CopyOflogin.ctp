<?php
echo $this->element('header');
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

<link rel="stylesheet" type="text/css" href="/Final/Register.css" />
	<br>
<div class="container">
	<div class="content">
		<div style="float:left;width: 580px;">
		<h2>用户登录</h2>
		<hr>
		<form id="form_register" name="form_register" method="POST" onSubmit="return chk(this)" action="">
		<table class="register">
			<tr>
				<td><label>账号</label></td>
				<td><input type="text" name="account_log" id="account_log" placeholder="输入您的账号" /></td>
			</tr>
			<tr>
				<td><label>密码</label></td>
				<td><input type="password" name="password_log" id="password_log" value="" placeholder="输入您的密码"/></td>
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
            <a href="/user/login">欢迎登录</a>，登录后您可以<br />
            <br />
            <span class="t1">借阅书籍</span><br><br />
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
echo $this->element('footer');
?>