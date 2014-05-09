<?php
$filtro=$query="";
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$page_title = 'Cadastro de Produtos';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <a href="adm">Painel Administrativo</a> > <strong>Listagem de Produtos</strong>';
include_once '../includes/conn.php';
$extra_style='<link type="text/css" rel="stylesheet" href="media/css/jquery.fancybox.css">';
$extra_script='<script src="media/js/jquery.fancybox.js">\n</script><script>$(function(){ $("a.fancybox").fancybox(); });</script>';
$page_content_items = '';
$sql_query="";
if(isset($_GET['q'])){
	$sql_query= "SELECT * FROM produtos WHERE produtos_grupo=".$_GET['q'];
	//die($sql_query);
}else{
	$sql_query = "SELECT * FROM produtos";
}
$res = mysql_query($sql_query) or die(mysql_error());
if($res){
	$num = mysql_num_rows($res);
	if($num>0){
		for($i=0; $i<$num; $i++) {
			$id = mysql_result($res, $i, 'id');
			$nome = mysql_result($res, $i, 'nome');
			$imagem = mysql_result($res, $i, 'imagem');
			$ativo = mysql_result($res, $i, 'ativo');
			$id_grupo = mysql_result($res, $i, 'produtos_grupo');
			$sql_grupo = mysql_query("SELECT nome FROM produtos_grupo WHERE id='$id_grupo'");
			$nome_grupo = mysql_result($sql_grupo, 0, 'nome');
			$status="active";
			if($ativo=="0")$status="inactive";
			
			$page_content_items .= '<tr>'
								. '		<td align="center">'.$nome.'</td>'
								. '		<td align="center"><a href="../uploads/'.$imagem.'" rel="obras-admin" class="fancybox">'
								. '			<img class="thumbnail" src="../uploads/thumbs/'.$imagem.'"></a>'
								. '		</td>'
								. '		<td align="center">'.$nome_grupo.'</td>'
								. '		<td align="center">'
								. '			<span class="adm-btn '.$status.'">'.$status.'</span>'
								. '		</td>'
								. '		<td align="center"><a class="adm-btn edita" href="produtos/update.php?id='.$id.'" name="Editar"> Editar </a></td>'
								. '		<td align="center"><a class="adm-btn exclui" href="produtos/delete.php?id='.$id.'" name="Excluir"> Excluir </a></td>'
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

$res_select = mysql_query("SELECT * FROM produtos_grupo");
if($res_select){
	$num_select = mysql_num_rows($res_select);
	if($num_select>1){
		for($j=0; $j<$num_select; $j++) {
			$id_select = mysql_result($res_select, $j, 'id');
			$nome_select = mysql_result($res_select, $j, 'nome');
			$filtro.="<option value='produtos/?q=".$id_select."'>".$nome_select."</option>";
		}
	}	
}
$page_content =   '<div class="row">'
				. '		<div class="span2">'
				. '			<a href="produtos/update.php" class="btn btn-primary" title="Adicionar Produto">Adicionar Produto</a>'
				. '		</div>'
				. '		<div class="span4 offset6">'
				. '			<strong>Filtrar por </strong>'
				. '			<select onchange="window.location = this.options[this.selectedIndex].value;"><option>Selecione o Grupo...</option>'.$filtro.'</select>'
				. '		</div>'
				. '</div>'
				. '<table border="1" class="table">'
				. '	<tr>'
				. '		<th>Nome</th>'
				. '		<th>Imagem</th>'
				. '		<th>Grupo</th>'
				. '		<th>Ativo</th>'
				. '		<th align="center">Editar</th>'
				. '		<th align="center">Excluir</th>'
				. '	</tr>'
				.	$page_content_items
				. '</table>'
				. '<hr>'
				. '<div class="row">'
				. '		<div class="span2">'
				. '			<a href="produtos/update.php" class="btn btn-primary" title="Adicionar Produto">Adicionar Produto</a>'
				. '		</div>'
				. '		<div class="span4 offset6">'
				. '			<strong>Filtrar por </strong>'
				. '			<select onchange="window.location = this.options[this.selectedIndex].value;"><option>Selecione o Grupo...</option>'.$filtro.'</select>'
				. '		</div>'
				. '</div>'
				.$ret_msg;
include_once "../templates/tpl_base.php";