<?php
require_once ('config.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php


if(empty($_POST['account']))
	echo "<script>alert('帐号不能为空');location='Register.php';</script>";
else if(empty($_POST['password']))
	echo "<script>alert('密码不能为空');location='Register.php';</script>";
else if($_POST['password']!=$_POST['passwordConfirm'])
	echo "<script>alert('两次密码不一样');location='Register.php';</script>";
else if(!empty($_POST['tel'])&&!is_numeric($_POST['tel']))
	echo "<script>alert('手机号码必须全为数字');location='Register.php';</script>";
else if(!empty($_POST['email'])&&!ereg("([0-9a-zA-Z]+)([@])([0-9a-zA-Z]+)(.)([0-9a-zA-Z]+)",$_POST['email']))
	echo "<script>alert('邮箱输入不合法');location='Register.php';</script>";
else{
$_SESSION['User']=$_POST['account'];
$sql="insert into User values('','".$_POST['account']."','".md5($_POST['password'])."','".$_POST['gender']."','".$_POST['tel']."','".$_POST['email']."')";
$result=mysql_query($sql)or die(mysql_error());
if($result)
echo "<script>alert('恭喜你注册成功,马上进入主页面');location='Home-Page.php';</script>";
else
{
	echo "<script>alert('注册失败');location='Register.php';</script>";
	mysql_close();
}
	}


?>