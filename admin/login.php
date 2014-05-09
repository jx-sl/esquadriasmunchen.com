<!DOCTYPE html>
<html>

<head>
<?php include "templates/head.php"; ?>
<script src="media/js/admin.js"></script>
</head>

<body id="login">

	<section id="page">

		<section id="page-content">

			<header>
				<?php include "templates/header.php"; ?>
			</header>
			<!-- header -->
			<br class="clear">

			<section id="content">

				<form method="post" action="includes/login.php">
					<fieldset class="corner">
						<legend>Login Esquadrias Munchen</legend>
						<p>
							<label for="user">Login</label> <input type="text" id="user"
								name="user">
						</p>
						<p>
							<label for="pass">Senha</label> <input type="password" id="pass"
								name="pass">
						</p>
						<p class="send">
							<input type="submit" id="send_login" name="send" value="acessar">
						</p>
						<p id="info">
							<?php if(isset($_GET['m'])) echo "Erro ao logar! Tente novamente! "; ?>
						</p>
					</fieldset>
				</form>

			</section>
			<!-- content -->
			<br class="clear">

		</section>
		<!-- page-content -->
		<br class="clear">

		<footer>
			<?php include "templates/footer.php"; ?>
		</footer>
		<!-- footer -->
		<br class="clear">

	</section>
	<!-- page -->
</body>
</html>
