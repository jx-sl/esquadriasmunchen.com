<?php
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras', 'usuarios');
$page_title = 'Cadastro de Usuarios';
include_once '../includes/conn.php';
$page_content_items = '';
$sql = "SELECT * FROM usuarios ORDER BY nome";
$num_ativo=
$res = mysql_query($sql) or die(mysql_error());
if($res){
	$num = mysql_num_rows($res);
	if($num>0){
		for($i=0; $i<$num; $i++) {
			$id = mysql_result($res, $i, 'id');
			$nome = mysql_result($res, $i, 'nome');
			$login = mysql_result($res, $i, 'login');
			$ativo = mysql_result($res, $i, 'ativo');
			$status="active";
			if($ativo=="0")$status="inactive";
			$canDelete='		<td align="center"><a class="adm-btn exclui" href="usuarios/delete.php?id='.$id.'" name="Excluir"> Excluir </a></td>';
			if($num==1)	$canDelete='<td>O ultimo usuario nao pode ser excluido!</td>';
			
			$page_content_items .= '<tr>'
								. '		<td align="center">'.$nome.'</td>'
								. '		<td align="center">'.$login.'</td>'
								. '		<td align="center"><a class="adm-btn edita" href="usuarios/update.php?id='.$id.'" name="Editar"> Editar </a></td>'
								. '		'.$canDelete
								. '</tr>';
		}
	}else{
		$page_content_items = "<tr><td colspan=\"5\">Nenhum item cadastrado!</td></tr>";
		//die("Morreu 1");
	}
}else{
	$page_content_items = "<tr><td colspan=\"5\">Nenhum item cadastrado!</td></tr>";
	//die("Morreu 2");
}
$ret_msg="";
if(isset($_GET['m'])){
	if($_GET['m']=="ok") $ret_msg='<div class="alert alert-success"><strong>Funcionalidade executada com Sucesso!</strong></div>';
	if($_GET['m']=="er") $ret_msg='<div class="alert alert-error"><strong>Erro ao executar funcionalidade! Tente novamente!</strong></div>';
}
$page_content =  '<a href="usuarios/update.php" class="btn btn-primary" title="Adicionar Usuario">Adicionar Usuario</a><br>'
		. '<table border="1" class="table">'
		. '	<tr>'
		. '		<th>Nome</th>'
		. '		<th>Login</th>'
		. '		<th align="center">Editar</th>'
		. '		<th align="center">Excluir</th>'
		. '	</tr>'
		.	$page_content_items
		. '</table>'
		.$ret_msg;
include_once "../templates/tpl_base.php";
