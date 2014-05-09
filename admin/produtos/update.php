<?php
$id = $nome = $imagem = $ativo = $img_out = $id_grupo_atual = $nome_grupo_atual = "";
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$page_title = 'Cadastro de Produtos';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <a href="adm">Painel Administrativo</a> > <a href="produtos">Listagem de Produtos</a> > <strong>Edição de Produto</strong>';
include_once '../includes/conn.php';
$extra_style='<link type="text/css" rel="stylesheet" href="media/css/jquery.fancybox.css">';
$extra_script='<script src="media/js/jquery.fancybox.js">\n</script><script>$(function(){ $("a.fancybox").fancybox(); });</script>';
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM produtos WHERE id=$id";
	$res = mysql_query($sql) or die(mysql_error());
	if($res){
		$num = mysql_num_rows($res);
		if($num>0){
			$id = mysql_result($res, 0, 'id');
			$nome = mysql_result($res, 0, 'nome');
			$imagem = mysql_result($res, 0, 'imagem');
			$ativo = mysql_result($res, 0, 'ativo');
			$id_grupo_atual = mysql_result($res, 0, 'produtos_grupo');
			$sql_grupo = mysql_query("SELECT nome FROM produtos_grupo WHERE id='$id_grupo_atual'");
			$nome_grupo_atual = mysql_result($sql_grupo, 0, 'nome');
		}else{
			echo '<p>Nao foram encontrados dados a serem exibidos.</p>';
		}
	}
}
if($imagem!="") $img_out = '<a href="../uploads/'.$imagem.'" class="fancybox"><img class="thumbnail" alt="'.$nome.'" src="../uploads/thumbs/'.$imagem.'"></a>';

$opt1 = $opt0 = "";
if($ativo=="1")
	$opt1 = "selected=\"selected\""; 
else
	$opt0 = "selected=\"selected\""; 


$optGrupo="";
$sql_grupos = mysql_query("SELECT id, nome FROM produtos_grupo");
$num = mysql_num_rows($sql_grupos);
for($k=0; $k<$num; $k++){
	$id_grupo = mysql_result($sql_grupos, $k, 'id');
	$nome_grupo = mysql_result($sql_grupos, $k, 'nome');
	$optGrupo.= "	<option value=$id_grupo";
	if($nome_grupo==$nome_grupo_atual){
		$optGrupo.= " selected='selected' ";
	}
	$optGrupo.= " />$nome_grupo</option>";
}


$page_content = ''
				.'<form name="form_edita" id="form_edita" action="produtos/save.php" enctype="multipart/form-data" method="post">'
				.'	<fieldset>'
				.'		<input type="hidden" name="id" value="'.$id.'" >'
				.'			<div class="control-group">'
				.'				<label class="control-label" for="name">Nome</label>'
				.'				<div class="controls">'
				.'					<input type="text" id="name" required placeholder="Nome do Produto" name="name" value="'.$nome.'" >'
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
				.'				<label class="control-label" for="grupo_produtos">Grupo</label><br>'
				.'				<div class="controls">'
				.'					<select id="grupo_produtos" name="grupo_produtos">'
				.'						'.$optGrupo
				.'					</select>'
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