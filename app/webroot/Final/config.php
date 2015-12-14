<?php
if (!isset ($_SESSION)) {
	ob_start();
	session_start();
}
 $hostname="localhost"; //mysql地址
 $basename="w0340096"; //mysql用户名
 $basepass="wItJw8"; //mysql密码
 $database="db0340096"; //mysql数据库名称

 $conn=mysql_connect($hostname,$basename,$basepass)or die("error!"); //连接mysql              
 mysql_select_db($database,$conn); //选择mysql数据库
 mysql_query("set names 'utf8'");//mysql编码
?>