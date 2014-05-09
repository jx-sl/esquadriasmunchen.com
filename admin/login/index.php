<?php
$error = '';
if( isset($_GET['m'])){
	if($_GET['m']=="er") $error = '<div class="alert alert-error"><strong>Erro ao logar! Tente novamente!</strong></div>';
}
$page_content = '
				<form class="form-horizontal" method="post" action="includes/login.php">
					<fieldset>
					  <legend>Login Esquadrias Munchen</legend>
					  <div class="control-group">
						'.$error.'
					  </div>
					  <div class="control-group">
					    <label class="control-label" for="user">Usuario</label>
					    <div class="controls">
					      <input type="text" required id="user" name="user" placeholder="Usuario">
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label" for="pass">Senha</label>
					    <div class="controls">
					      <input type="password" required id="pass" name="pass" placeholder="Senha">
					    </div>
					  </div>
					  <div class="control-group">
					    <div class="controls">
					      <button type="submit" class="btn btn-primary">Acessar</button>
					    </div>
					  </div>
					</fieldset>
				</form>		
		';
	include_once "../templates/tpl_base.php";