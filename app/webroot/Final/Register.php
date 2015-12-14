<!DOCTYPE HTML>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="SHMn"/> 
<meta name="Copyright" content="SHMn"/> 

<link rel="stylesheet" type="text/css" href="Register.css" />
<head>
	<title>註冊</title>
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
	<style>
		input.error::-webkit-input-placeholder { color: #BA55D3; }
		input.error::-moz-placeholder {	color: #BA55D3; }
		input.error:-ms-input-placeholder {	color: #BA55D3; }
		input.error::placeholder { color: #BA55D3; }
	</style>
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

$(document).ready(function(){
	$("#key").autocomplete({ 
		source: function( request, response ) {
			$.ajax({
				url: "BookNameDB.php",
				type: 'POST',
				data:{key: request.term},
				dataType: "text",
				success: function(data){
					response(data.split(", "));
				}
			});
		},
		minLength: 1,
		select: function( event, ui ) {
			//The default action is to replace the text field's value with the value of the selected item.
			$("#key").css({'background-color': 'skyblue'});
		}
	});
});

function chk(form_register){
	if (form_register.account.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("帐号不能为空！");
		form_register.account.focus();   
		return (false);   
	}		
	
	if (form_register.password.value.replace(/(^\s*)|(\s*$)/g, "") == ""){
		alert("密码不能为空！");
		form_register.password.focus();   
		return (false);   
	}	
	
	if (form_register.passwordConfirm.value != form_register.password.value){
		alert("两次输入密码不一样！");
		form_register.passwordConfirm.focus();   
		return (false);   
	}	
}
</script>


</head>
<body>
	<header>
		<div class="Top_line">
     	<div calss="Top_left">
			<h1 class="Text_logo" id="Top_back">我愛寫小說</h1>
			<p><em>designed by <a href="mailto:ziyanglqm@163.com">SHMn</a></em></p>
		</div>
	 </div>
	</header>
	<div id="menu">
		<div id="sort">
			<ul>
				<li><a href="#" style="color:#66B3FF;">分類:</a></li>
				<li class="hw1"><a href="Homework1.html">言情</a></li>
				<li class="hw2"><a href="hm2/hm2-0340096-劉慶猛.html">玄幻</a></li>
				<li class="hw3"><a href="#">武俠</a></li>
				<li class="hw4"><a href="#">都市</a></li>
				<li class="hw5"><a href="#">網遊</a></li>
				<li class="hw6"><a href="#">其他</a></li>
			</ul>
		</div>
		<div id="search">
			<form action=""><!--表单数据将通过 method 属性附加到 URL 上-->
				<fieldset><!--組合表單中的相關元素-->
				<input type="text" name="s" id="key" placeholder="輸入书名或作者" size="15" />
				<input type="submit" id="search-submit" value="查找" />
				</fieldset>
			</form>
		</div>
	</div>
	<br>
<div class="container">
	<div class="content">
		<div style="float:left;width: 580px;">
		<h2>新用戶註冊</h2>
		<hr>
		<form id="form_register" name="form_register" method="POST" onSubmit="return chk(this)" action="AddUser.php">
		<table class="register">
			<tr>
				<td><label>帳&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;號</label><font color="#FF0000"> *</font></td>
				<td><input type="text" name="account" id="account" placeholder="輸入您的帳號" /></td>
			</tr>
			<tr>
				<td><label>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼</label><font color="#FF0000"> *</font></td>
				<td><input type="password" name="password" id="password" value="" placeholder="輸入您的密碼"/></td>
			</tr>
			<tr>
				<td><label>確認密碼</label><font color="#FF0000"> *</font></td>
				<td><input type="password" name="passwordConfirm" id="passwordConfirm" value="" placeholder="輸入您的密碼"/></td>
			</tr>
			<tr>
				<td><label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;別</label></td>
				<td>
					<input type="radio" name="gender" id="male" value="男" checked="checked" />男
					<input type="radio" name="gender" id="female" value="女" />女
				</td>
			</tr>
			<tr>
				<td><label>信&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</label></td>
				<td><input type="text" name="email" id="email" value="" placeholder="輸入您的郵箱"/></td>
			</tr>
			<tr>
				<td><label>電&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;話</label></td>
				<td><input type="text" name="tel" id="tel" value="" placeholder="請輸入你的電話號碼"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="btnRegister" id="btnRegister" value="註冊" /></td>
			</tr>
		</table>
		</form>
	    </div>
	    <div style="width:1px; height:260px; border-left:1px dashed #000; float:right"></div>
	</div><!-- end of .content -->
	 <div class="reg_r">
        <div class="reg_intro">
            <a href="/Login.php">已注册请登录</a>，注册后您可以<br />
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

<footer style="clear: left;">
	     <p style="text-align:center; position: relative; bottom: -120px;";>&copy;2013-2014 我愛寫小說 | 本站小说版权均为原版权人所有 <a href="mailto:ziyanglqm@163.com"> 聯繫我 </a></p>
	</footer>
</body>
</html>