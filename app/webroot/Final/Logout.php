<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php session_start();
    error_reporting(E_ALL ^ E_NOTICE); 
	//unset($_SESSION['User']);//清空指定的session
	//session_destroy(); //清空以创建的所有SESSION
	//session_unset("User");//清空指定的session
	//unset($_SESSION['User']);
    //session.setMaxInactiveInterval(0.0)；
    //session_destroy();
    //$value = $_SESSION["User"];
	//echo "fruit = $value<br>";
    unset($_SESSION['User']);
    //$value = $_SESSION["User"];
    //echo "fruit = $value<br>";
    //session_unset("User");//清空指定的session
    //session_unset('User');//或者unset($_SESSION);

    //session_destroy();
	echo "<script>alert('已退出');location='Home-Page.php';</script>";
?>