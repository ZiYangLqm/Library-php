<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>unregister Session</title>
</head>
<body>
<?php
session_start();
echo "開啟 Session<br>";
// 註冊Session變數
echo "註冊 Session 變數 fruit 和 drink<br>";
// 舊版寫法必須先註冊再設定 
//	session_register("fruit");
//	session_register("drink");
$_SESSION["fruit"] = "orange";
$_SESSION["drink"] = "coffee";

// 取消 Session 變數 drink
unset($_SESSION["drink"]); //舊版寫法 session_unregister("drink");

if ( !isset($_SESSION["drink"]) ) {
   echo "Session 變數 drink 不存在! ";
   $value = $_SESSION["fruit"];
   echo "fruit = $value<br>";
}
session_unset();  // 刪除所有 Session 變數
if ( !isset($_SESSION["fruit"]) ) 
   echo "Session 變數 fruit 不存在!<br>";
   
// 關閉 Session
session_destroy();
echo "已經關閉 Session<br>";
// To use the session variables again, session_start() has to be called.
?>
</body>
</html>