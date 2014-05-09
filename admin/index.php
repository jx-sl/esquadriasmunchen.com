<?php
session_start();
if(!isset($_SESSION['jx-user']) && !isset($_SESSION['jx-pass'])){
	header("location: login");
}else{
	header("location: home");
}