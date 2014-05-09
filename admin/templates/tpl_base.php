<!DOCTYPE html>
<html lang="pt-br">
<head>	
<?php
if(isset($require_login)){
	session_start();
	if(!isset($_SESSION['jx-user']) && !isset($_SESSION['jx-pass'])){
		header("location: http://www.esquadriasmunchen.com/admin/login/");
	}
}
	include_once '../templates/tpl_head.php';
?>	
</head>	
<body>
	<header class="header navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
        	<div class="container">
        		<?php include_once "../templates/tpl_header.php"; ?>
        	</div>
        </div>
    </header>

    <section class="container page-main-content">
    	<?php
	    	if(isset($breadcrumbs)){
	    		print '<section class="breadcrumbs" style="background:#DDD; padding:5px;">'.$breadcrumbs.'</section>';	
	    	}
    	?>
    
    	<section class="page-title">
    		<?php if(isset($page_title)) echo "<h2>". $page_title ."</h2>"; ?>
    	</section>
    	
    	<?php if(isset($page_content)) echo $page_content; else print "O conteudo desta pagina nao foi encontrado!"; ?>
		
    </section> <!-- /container -->
    
    <footer class="footer">
    	<?php include_once "../templates/tpl_footer.php"; ?>
    </footer>
</body>
</html>