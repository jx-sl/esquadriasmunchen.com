<?php
require'../includes/conn.php';
require'../includes/utils.php';

$nome = addslashes($_POST['name']);
$login = addslashes($_POST['login']);
$senha = md5(addslashes($_POST['pass']));
$id = $sql = "";

if(isset($_POST['id'])){
	$id = addslashes($_POST['id']);
}

if($id!=''){
	$sql = "UPDATE
	usuarios
	SET
	nome='$nome',
	login='$login',
	senha='$senha',
	nivel='1',
	ativo='1'
	WHERE
	id='$id'";
}else{
	$sql = "INSERT INTO
	usuarios
	(nome, login, senha, ativo, nivel)
	VALUES
	('$nome', '$login', '$senha', '1', '1')";
die($nome." ".$login." ".$senha);
}

mysql_query($sql) or die(mysql_error());
header("Location: ./");
