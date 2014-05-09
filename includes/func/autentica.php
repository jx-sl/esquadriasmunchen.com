<?php
	include("../class/Auth.php");
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$auth = new Auth($user,$pass);
 	if ($auth->login()) {
 		die("location:principal.php");
 	}else{
 		die("location:login.php");
 	}