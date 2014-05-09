<?php
$filtro=$query=$grupo_ativo="";
$require_login = true;
$page_title = 'Galeria de Fotos';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <strong>Galeria de Produtos</strong>';
include_once '../includes/conn.php';
$extra_style = '<link type="text/css" rel="stylesheet" href="media/css/jquery.fancybox.css">';
$extra_script = '<script src="media/js/jquery.fancybox.js"></script>'
				.'<script>'
				.'	$(function(){'
				.'		$("a.fancybox").fancybox();'
				.'	});'
				.'</script>';
$extra_style .= '
					<style>
						ul li {
							background: #FFF;
							float: left;
							border: 1px solid #666;
							border-radius: 4px;
							margin: 0 5px 5px 0;
							padding: 3px;
							height: 150px;
						}
					</style>';
$content_itens="";
$sql_query="";
if(isset($_GET['q'])){
	$sql_query= "SELECT * FROM produtos WHERE produtos_grupo=".$_GET['q'];
	$grupo_ativo="ex";
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
			$sql_grupo = mysql_query("SELECT nome FROM produtos_grupo");
			$nome_grupo = mysql_result($sql_grupo, 0, 'nome');
			if($grupo_ativo!=""){
				$grupo_ativo=" > ".$nome_grupo;
			}
			
			$content_itens.= '	<li>'
							.'		<a class="fancybox" rel="lista_produtos" href="../uploads/'.$imagem.'" title="'.$nome.'">'
							.'			<img src="../uploads/thumbs/'.$imagem.'">'
							.'		</a>'
							.'	</li>';
		}
	}else{
		$content_itens = "<li><p>Nenhum item cadastrado!</p></li>";
	}
}
$res_select = mysql_query("SELECT * FROM produtos_grupo");
if($res_select){
	$num_select = mysql_num_rows($res_select);
	if($num_select>1){
		for($j=0; $j<$num_select; $j++) {
			$id_select = mysql_result($res_select, $j, 'id');
			$nome_select = mysql_result($res_select, $j, 'nome');
			$filtro.="<option value='lista_produtos/?q=".$id_select."'>".$nome_select."</option>";
		}
	}
}
//$page_title = 'Galeria de Fotos'.$grupo_ativo;
$page_content =   '<div class="row">'
				. '		<div style="float:right;margin-right:34px">'
				. '			<strong>Filtrar por </strong>'
				. '			<select onchange="window.location = this.options[this.selectedIndex].value;"><option>Selecione o Grupo...</option>'.$filtro.'</select>'
				. '		</div>'
				. '</div>'
				. '<hr>'
				. '<div class="row">'
				. '		<ul>'.$content_itens.'</ul>'
				. '</div>'
				. '<hr>'
				. '<div class="row">'
				. '		<div style="float:right;margin-right:34px">'
				. '			<strong>Filtrar por </strong>'
				. '			<select onchange="window.location = this.options[this.selectedIndex].value;"><option>Selecione o Grupo...</option>'.$filtro.'</select>'
				. '		</div>'
				. '</div>';
	include_once "../templates/tpl_base.php";