<?php
if (isset($_GET["key"]))
	$key=$_GET["key"]; //get the parameter from URL
else if (isset($_POST["key"]))
	$key=$_POST["key"];
else
	$key="";

$uac = new mysqli("localhost", "w0340096", "wItJw8", "db0340096");
if ($uac->connect_errno) {
	echo "error[" . $uac->connect_errno . "]" . $uac->connect_error;
	exit;
}
$uac->query("SET NAMES 'utf8'");

$hint1="";
$hint="";
$hint2="";
if (strlen($key) > 0) {
	$qs = "select BookName from Books"
		. " where BookName like '"
		. $uac->real_escape_string($key)
		. "%' limit 0,10";
	//echo $qs;
	$rs = $uac->query($qs);
	$qs2 = "select BookAuthor from Books"
		. " where BookAuthor like '"
		. $uac->real_escape_string($key)
		. "%' limit 0,10";
	//echo $qs;
	$rs2 = $uac->query($qs2);
	if ($uac->connect_errno) {
		echo '¿ù»~ ['. $uac->connect_errno . '] ½Ð¹q....';
		exit;
	}
	while ($row = $rs->fetch_assoc()) { 
		$hint .= ", " . $row['BookName'];
	}
	while ($row2 = $rs2->fetch_assoc()) { 
		$hint2 .= ", " . $row2['BookAuthor'];
	}
	if (!empty($hint)) { $hint = substr($hint,2); }
	if (!empty($hint2)) { $hint2 = substr($hint2,2); }
}
if (empty($hint) && empty($hint2)) { $hint="no suggestion"; }

//output the response
$hint1 = $hint2.", ".$hint;
echo $hint1;
?>