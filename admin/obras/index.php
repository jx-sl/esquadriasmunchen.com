<?php
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$page_title = 'Cadastro de Obras';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <a href="adm">Painel Administrativo</a> > <strong>Listagem de Obras</strong>';
include_once '../includes/conn.php';
$extra_style='<link type="text/css" rel="stylesheet" href="media/css/jquery.fancybox.css">';
$extra_script='<script src="media/js/jquery.fancybox.js">\n</script><script>$(function(){ $("a.fancybox").fancybox(); });</script>';
$page_content_items = '';
$res = mysql_query("SELECT * FROM obras") or die(mysql_error());
if($res){
	$num = mysql_num_rows($res);
	if($num>0){
		for($i=0; $i<$num; $i++) {
			$id = mysql_result($res, $i, "id");
			$nome = mysql_result($res, $i, "nome");
			$imagem = mysql_result($res, $i, "imagem");
			$ativo = mysql_result($res, $i, "ativo");
			$status="active";
			if($ativo=="0")$status="inactive";
			
			$page_content_items .= '<tr>'
								. '		<td align="center">'.$nome.'</td>'
								. '		<td align="center"><a href="../uploads/'.$imagem.'" rel="obras-admin" class="fancybox"><img style="max-width:150px; display:inline" class="thumbnail" src="../uploads/thumbs/'.$imagem.'"></a></td>'
								. '		<td align="center">'
								. '			<span class="adm-btn '.$status.'">'.$status.'</span>'
								. '		</td>'
								. '		<td align="center"><a class="adm-btn edita" href="obras/update.php?id='.$id.'" name="Editar"> Editar </a></td>'
								. '		<td align="center"><a class="adm-btn exclui" href="obras/delete.php?id='.$id.'" name="Excluir"> Excluir </a></td>'
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
$page_content =  '<a href="obras/update.php" class="btn btn-primary" title="Adicionar Obra">Adicionar Obra</a><br>'		
		. '<table border="1" class="table">'
		. '	<tr>'
		. '		<th>Nome</th>'
		. '		<th>Imagem</th>'
		. '		<th>Ativo</th>'
		. '		<th align="center">Editar</th>'
		. '		<th align="center">Excluir</th>'
		. '	</tr>'
		.	$page_content_items
		. '</table>'
		.$ret_msg;
include_once "../templates/tpl_base.php";