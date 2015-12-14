<?php
require_once ('config.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php


if(empty($_POST['account']))
	echo "<script>alert('帐号不能为空');location='?tj=register';</script>";
else if(!empty($_POST['tel'])&&!is_numeric($_POST['tel']))
	echo "<script>alert('手机号码必须全为数字');location='?tj=register';</script>";
else if(!empty($_POST['email'])&&!ereg("([0-9a-zA-Z]+)([@])([0-9a-zA-Z]+)(.)([0-9a-zA-Z]+)",$_POST['email']))
	echo "<script>alert('邮箱输入不合法');location='?tj=register';</script>";
else{
$_SESSION['User']=$_POST['account'];
mysql_query($sql="update User set User_sex='".$_POST['gender']."', User_phone='".$_POST['tel']."',User_email='".$_POST['email']."' where User_user='".$_SESSION['User']."'");
	echo "<script>alert('修改成功');location='Infor_Person.php';</script>";
	}


?>