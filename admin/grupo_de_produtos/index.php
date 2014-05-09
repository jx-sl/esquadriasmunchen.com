<?php
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$page_title = 'Cadastro de Grupo de Produtos';
include_once '../includes/conn.php';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <a href="adm">Painel Administrativo</a> > <strong>Listagem de Grupo de Produtos</strong>';
$page_content_items = '';
$sql = "SELECT * FROM produtos_grupo ORDER BY nome";
$res = mysql_query($sql) or die(mysql_error());
if($res){
	$num = mysql_num_rows($res);
	if($num>0){
		for($i=0; $i<$num; $i++) {
			$id = mysql_result($res, $i, 'id');
			$nome = mysql_result($res, $i, 'nome');
			$url = mysql_result($res, $i, 'url');
			$ativo = mysql_result($res, $i, 'ativo');
			$status="active";
			if($ativo=="0")$status="inactive";
			
			$page_content_items .= '<tr>'
								. '		<td align="center">'.$nome.'</td>'
								. '		<td align="center">'.$url.'</td>'
								. '		<td align="center">'
								. '			<span class="adm-btn '.$status.'" title="'.$status.'">'.$status.'</span>'
								. '		</td>'
								. '		<td align="center"><a class="adm-btn edita" href="grupo_de_produtos/update.php?id='.$id.'" name="Editar"> Editar </a></td>'
								. '		<td align="center"><a class="adm-btn exclui" href="grupo_de_produtos/delete.php?id='.$id.'" name="Excluir"> Excluir </a></td>'
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
$page_content =  '<a href="grupo_de_produtos/update.php" class="btn btn-primary" title="Adicionar Grupo de Produtos">Adicionar Grupo de Produtos</a><br>'
		. '<table border="1" class="table">'
		. '	<tr>'
		. '		<th>Nome</th>'
		. '		<th>URL</th>'
		. '		<th>Ativo</th>'
		. '		<th align="center">Editar</th>'
		. '		<th align="center">Excluir</th>'
		. '	</tr>'
		.	$page_content_items
		. '</table>'
		.$ret_msg;
include_once "../templates/tpl_base.php";
