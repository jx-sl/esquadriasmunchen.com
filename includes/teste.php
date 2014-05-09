<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

if (!($nome) || !($email) || !($telefone)){
	print "Preencha todos os campos!"; exit();
}else{
	print "Nome: ".$nome." Email: ".$email." Fone: ".$telefone;
}

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DATABASE', 'siteMunchen');
$conecta = mysql_connect(HOST, USUARIO, SENHA);
$selecionaDb = mysql_select_db(DATABASE);
$charset = mysql_set_charset('utf8');
if( (!$conecta) || (!$selecionaDb) ){
	echo "Erro na conexão - ".mysql_error();
	exit;
}

//$busca = $_GET['busca'];
$query = mysql_query("SELECT * FROM $nome WHERE ativo=1");

if(!$query){
	echo 'Houve um erro, tente novamente - '. mysql_error();
} elseif(!mysql_num_rows($query)) {
	echo 'Sua busca não retornou nenhum resultado';
} else {
	while($resultado = mysql_fetch_object($query)){
		print "<h1>$resultado->nome</h1><p>$resultado->imagem</p>";
	}
}