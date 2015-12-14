<!DOCTYPE HTML>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="SHMn"/> 
<meta name="Copyright" content="SHMn"/> 

<link rel="stylesheet" type="text/css" href="/Final/Home-page.css" />
<head>
	<title>图书借阅系统</title>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
	<script>
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
</script>
</head>
<body>
	<header>
     <div class="Top_line">
     	<div calss="Top_left">
			<h1 class="Text_logo" id="Top_back"><a style="text-decoration:none; color:#D8BFD8;" href="/user/userIndex">图书借阅系统</a></h1>
			<p><em>designed by <a href="mailto:ziyanglqm@163.com">liuqingmeng</a></em></p>
		</div>
		<div class="Top_right">
			<span id=""  style="color:#AAAAAA">加入我们：</span>
     		<span id=""><a href="/user/login" target="_blank">登录</a></span>
     		<span id=""><a href="/user/register" target="_blank">注册</a></span>
	 	</div>
	 </div>
	</header>
	<div id="menu">
		<div id="sort">
			<ul>
				<li><a href="#" style="color:#66B3FF;">分类:</a></li>
				<li class="hw1"><a href="yanqing.php">计算机</a></li>
				<li class="hw2"><a href="xuanhuan.php">农林</a></li>
				<li class="hw3"><a href="wuxia.php">医学</a></li>
				<li class="hw4"><a href="dushi.php">科普</a></li>
				<li class="hw5"><a href="wangyou.php">通信</a></li>
				<li class="hw6"><a href="qita.php">其他</a></li>
			</ul>
		</div>
		<div id="search">
			<form  action=""><!--表单数据将通过 method 属性附加到 URL 上-->
				<fieldset><!--組合表單中的相關元素-->
				<input type="text" name="search-text" id="key" placeholder="输入书名或作者" size="15" />
				<input type="submit" id="search-submit" value="查找" />
				</fieldset>
			</form>
		</div>
	</div>