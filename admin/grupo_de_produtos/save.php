<?php
require'../includes/conn.php';
require'../includes/utils.php';

$name = addslashes($_POST['name']);
$url = addslashes(getUrl($_POST['name']));
$ativo = addslashes($_POST['ativo']);

$id = $sql = "";

if(isset($_POST['id'])){
	$id = addslashes($_POST['id']);
}

if($id!=''){
	$sql = "UPDATE
	produtos_grupo
	SET
	nome='$name',
	url='$url',
	ativo='$ativo',
	usuario_modificacao='1'
	WHERE
	id='$id'";
}else{
	$sql = "INSERT INTO
	produtos_grupo
	(nome, url, ativo, usuario_cadastro)
	VALUES
	('$name', '$url', '$ativo', '1')";
}

mysql_query($sql) or die(mysql_error());
header("Location: ./");
