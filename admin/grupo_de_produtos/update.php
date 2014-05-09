<?php
$id = $nome = $url = $ativo = "";
$require_login = true;
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$page_title = 'Cadastro de Grupo de Produtos';
$breadcrumbs = '<a href="home">Menu Inicial</a> > <a href="adm">Painel Administrativo</a> > <a href="grupo_de_produtos">Listagem de Grupo de Produtos</a> > <strong>Edição de Grupo de Produtos</strong>';
include_once '../includes/conn.php';
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM produtos_grupo WHERE id=".$_GET['id'];
	$res = mysql_query($sql) or die(mysql_error());
	if($res){
		$num = mysql_num_rows($res);
		if($num>0){
			$id = mysql_result($res, 0, 'id');
			$nome = mysql_result($res, 0, 'nome');
			$url = mysql_result($res, 0, 'url');
			$ativo = mysql_result($res, 0, 'ativo');
		}else{
			echo '<p>N&atilde;o foram encontrados dados a serem exibidos.</p>';
		}
	}
}

$opt1 = $opt0 = "";
if($ativo=="1")
	$opt1 = "selected=\"selected\"";
else
	$opt0 = "selected=\"selected\"";

$page_content = ''
		.'<form name="form_edita" id="form_edita" action="grupo_de_produtos/save.php" enctype="multipart/form-data" method="post">'
		.'	<fieldset>'
		.'		<input type="hidden" name="id" value="'.$id.'" />'
		.'		<input type="hidden" name="url" value="'.$url.'" />'
		.'			<div class="control-group">'
		.'				<label class="control-label" for="name">Nome</label>'
		.'				<div class="controls">'
		.'					<input type="text" id="name" required placeholder="Nome do Grupo" name="name" value="'.$nome.'" >'
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