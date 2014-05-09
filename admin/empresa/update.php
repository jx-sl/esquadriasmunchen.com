
<!DOCTYPE html>
<html>

<head>
<?php
session_start();
if(!isset($_SESSION['jx-user']) && !isset($_SESSION['jx-pass'])){
	header("location: ../login.php");
}
include '../includes/conn.php';
include "../templates/head.php";
?>
</head>

<body>

	<section id="page">

		<section id="page-content">

			<header>
				<?php include "../templates/header.php"; ?>
			</header>
			<!-- header -->
			<br class="clear">

			<section id="content">
				<h2>Cadastro de Obras Realizadas</h2>

				<?php
				$id = $nome = $imagem = $ativo = "";
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
								echo '<p>Nao foram encontrados dados a serem exibidos.</p>';
							}
						}
				}
				?>

				<form name="form_edita" id="form_edita" action="obras/save.php"
					enctype="multipart/form-data" method="post">
					<fieldset>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<p>
							<label for="name">Nome</label><br> <input type="text" id="name"
								name="name" value="<?php echo $nome; ?>">
						</p>
						<p>
							<label for="imagem">Imagem</label><br> <input type="file"
								id="imagem" name="imagem">
							<?php if($imagem!=""){
								echo '<input type="hidden" value="'.$imagem.'" id="imagem_atual" name="imagem_atual"><br>'
		.'<img alt="'.$nome.'" src="../uploads/thumbs/'.$imagem.'">';
							}
							?>
						</p>
						<p class="select">
							<label for="ativo">Ativo</label><br> <select id="ativo"
								name="ativo">
								<option value="1"
								<?php if($ativo!="0") echo "selected=\"selected\""; ?>>Ativo</option>
								<option value="0"
								<?php if($ativo=="0") echo "selected=\"selected\""; ?>>Inativo</option>
							</select>
						</p>
						<p>
							<input class="send" type="submit" value="salvar">
						</p>
					</fieldset>
				</form>
				<p>
					<a class="btn back" href="obras">Voltar para a Listagem</a>
				</p>

			</section>
			<!-- content -->
			<br class="clear">

		</section>
		<!-- page-content -->
		<br class="clear">

		<footer>
			<?php include "../templates/footer.php"; ?>
		</footer>
		<!-- footer -->
		<br class="clear">

	</section>
	<!-- page -->
</body>
</html>
