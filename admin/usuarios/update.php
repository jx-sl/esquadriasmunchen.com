<?php
$id = $nome = $login = $ativo = $senha = "";
$require_login = true;
$extra_script = '<script>function confirmRetype(){ if( $("#pass").val() != $("#retype_pass").val() ){ alert("As senhas não conferem.\nTente novamente!"); return false;}else{return true;} }</script>';
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras', 'usuarios');
$page_title = 'Cadastro de Usuarios';
include_once '../includes/conn.php';
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM usuarios WHERE id=".$_GET['id'];
	$res = mysql_query($sql) or die(mysql_error());
	if($res){
		$num = mysql_num_rows($res);
		if($num>0){
			$id = mysql_result($res, 0, 'id');
			$nome = mysql_result($res, 0, 'nome');
			$login = mysql_result($res, 0, 'login');
			$senha = mysql_result($res, 0, 'senha');
			$ativo = mysql_result($res, 0, 'ativo');
		}else{
			echo '<p>N&atilde;o foram encontrados dados a serem exibidos.</p>';
		}
	}
}
$page_content = "PAGINA EM CONSTRUCAO. AGUARDE!";
$page_content897 = ''
		.'<form name="form_edita" id="form_edita" type="post" action="usuarios/save.php" onsubmit="return confirmRetype()">'
		.'	<fieldset>'
		.'		<input type="hidden" name="id" value="'.$id.'" />'
		.'			<div class="control-group">'
		.'				<label class="control-label" for="name">Nome</label>'
		.'				<div class="controls">'
		.'					<input type="text" id="name" required placeholder="Nome do Usuario" name="name" value="'.$nome.'" >'
		.'				</div>'
		.'			</div>'
		.'			<div class="control-group">'
		.'				<label class="control-label" for="login">Login</label>'
		.'				<div class="controls">'
		.'					<input type="text" id="login" required placeholder="Login do Usuario" name="login" value="'.$login.'" >'
		.'				</div>'
		.'			</div>'
		.'			<div class="control-group">'
		.'				<label class="control-label" for="pass">Senha</label>'
		.'				<div class="controls">'
		.'					<input type="password" id="pass" required name="pass" value="" >'
		.'				</div>'
		.'			</div>'
		.'			<div class="control-group">'
		.'				<label class="control-label" for="retype_pass">Confirmação de Senha</label>'
		.'				<div class="controls">'
		.'					<input type="password" id="retype_pass" required name="retype_pass" value="" >'
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