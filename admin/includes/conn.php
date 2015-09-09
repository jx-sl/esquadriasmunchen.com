<?php
if($_SERVER['HTTP_HOST']=="localhost"){
	$connect = mysql_connect("#", "#", "#");
	if(!$connect)
		die("Erro ao conectar banco de dados!");

	$query = mysql_select_db("db_esquadriasmunchen");
	if(!$query)
		die("Erro ao selecionar banco de dados!");
	mysql_set_charset('utf8', $connect);
}else{
	$connect = mysql_connect("#", "#", "#");
	if(!$connect)
		die("Erro ao conectar banco de dados!");

	$query = mysql_select_db("db_esquadriasmunchen");
	if(!$query)
		die("Erro ao selecionar banco de dados!");
	mysql_set_charset('utf8', $connect);
}
