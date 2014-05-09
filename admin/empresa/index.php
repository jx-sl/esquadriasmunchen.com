
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

<body id="home">

	<section id="page">

		<section id="page-content">

			<header>
				<?php include "../templates/header.php"; ?>
			</header>
			<!-- header -->
			<br class="clear">

			<section id="content">
				<h2>Cadastro Página Empresa</h2>

				<a href="empresa/update.php" class="insert btn" title="inserir">Inserir</a>
				<table border="1" class="table_query">
					<tr>
						<th>Nome</th>
						<th>Imagem</th>
						<th>Ativo</th>
						<th align="center">Editar</th>
						<th align="center">Excluir</th>
					</tr>
					<tr>
						<?php
						$res = mysql_query("SELECT * FROM empresa") or die(mysql_error());
						if($res){
							$num = mysql_num_rows($res);
							if($num>0){
								for($i=0; $i<$num; $i++) {
									$nome = mysql_result($res, $i, 'texto');
									$imagem = mysql_result($res, $i, 'imagem');
									$ativo = mysql_result($res, $i, 'ativo');
									?>
						<td align="center"><?php echo $nome; ?></td>
						<td align="center"><?php echo "<img src=\"../uploads/thumbs/$imagem\">"; ?>
						</td>
						<td align="center"><span
							class="btn <?php if($ativo=="1") echo "active"; else echo "inactive"; ?>"><?php if($ativo=="1") echo "Ativo"; else echo "Inativo"; ?>
						</span></td>
						<td align="center"><a class='btn edita'
							href='empresa/update.php?id=<?php echo $id; ?>' name='Editar'>
								Editar </a></td>
						<td align="center"><a class='btn exclui'
							href='empresa/delete.php?id=<?php echo $id; ?>' name='Excluir'>
								Excluir </a></td>
					</tr>
					<?php
								}
                         	}else{
								echo "<td colspan=\"5\">Nenhum item cadastrado!</td>";
						 	}
						 }
						 ?>
				</table>

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
