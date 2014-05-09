<?php
require'conn.php';
$user = addslashes($_POST['user']);
$pass = md5(addslashes($_POST['pass']));

session_start();
$sql = mysql_query("SELECT * FROM `usuarios` WHERE login='$user' AND senha='$pass';") or die(mysql_error());

if( mysql_num_rows($sql) > 0 ) {
	session_start();
	$_SESSION['jx-user'] =$user;
	$_SESSION['jx-pass'] = $pass;
	header("Location: ../home");
} else {
	header("Location: ../login?m=er");
}
