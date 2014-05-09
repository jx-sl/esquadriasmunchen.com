<?php
$id = $nome = $imagem = $ativo = $img_out = "";
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$page_title = 'Cadastro de Obras';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <a href="adm">Painel Administrativo</a> > <a href="obras">Listagem de Obras</a> > <strong>Edição de Obra</strong>';
include_once '../includes/conn.php';
$extra_style='<link type="text/css" rel="stylesheet" href="media/css/jquery.fancybox.css">';
$extra_script='<script src="media/js/jquery.fancybox.js">\n</script><script>$(function(){ $("a.fancybox").fancybox(); });</script>';
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM obras WHERE id=$id";
	$res = mysql_query($sql) or die(mysql_error());
	if($res){
		$num = mysql_num_rows($res);
		if($num>0){
			$id = mysql_result($res, 0, 'id');
			$nome = mysql_result($res, 0, 'nome');
			$imagem = mysql_result($res, 0, 'imagem');
			$ativo = mysql_result($res, 0, 'ativo');
		}else{
			echo '<p>N&atilde;o foram encontrados dados a serem exibidos.</p>';
		}
	}
}
if($imagem!="") $img_out = '<a href="../uploads/'.$imagem.'" class="fancybox"><img class="thumbnail" alt="'.$nome.'" src="../uploads/thumbs/'.$imagem.'"></a>';

$opt1 = $opt0 = "";
if($ativo=="1")
	$opt1 = "selected=\"selected\""; 
else
	$opt0 = "selected=\"selected\""; 

$page_content = ''
				.'<form name="form_edita" id="form_edita" action="obras/save.php" enctype="multipart/form-data" method="post">'
				.'	<fieldset>'
				.'		<input type="hidden" name="id" value="'.$id.'" >'
				.'			<div class="control-group">'
				.'				<label class="control-label" for="name">Nome</label>'
				.'				<div class="controls">'
				.'					<input type="text" id="name" required placeholder="Nome da Obra" name="name" value="'.$nome.'" >'
				.'				</div>'
				.'			</div>'
				.'			<div class="control-group">'
				.'				<label class="control-label" for="imagem">Imagem</label><br>'
				.'				<div class="controls">'
				.'					<input type="file" id="imagem" name="imagem">'
				.'					<input type="hidden" value="'.$imagem.'" id="imagem_atual" name="imagem_atual"><br>'
				.'					'.$img_out
				.'				</div>'
				.'			</div>'
				.'			<div class="control-group select">'
				.'				<label class="control-label" for="ativo">Status</label><br>'
				.'				<div class="controls">'
				.'					<select id="ativo" name="ativo">'
				.'						<option value="1" '.$opt1.'>Ativo</option>'
				.'						<option value="0" '.$opt0.'>Inativo</option>'
				.'					</select>'
				.'				</div>'
				.'			</div>'
				.'			<div class="control-group">'
				.'				<div class="controls">'
				.'					<button type="submit" class="btn btn-primary">Salvar</button>'
				.'				</div>'
				.'			</div>'
				.'		</fieldset>'
				.'	</form>'
				.'	<div class="control-group">'
				.'		<a class="btn btn-warning" href="obras">Voltar para a Listagem</a>'
				.'	</div>';
include_once "../templates/tpl_base.php";