		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Administração Site München</title>
		<?php
			if($_SERVER['HTTP_HOST']=="localhost"){
				echo "<base href=\"http://localhost/esquadriasmunchen.com/admin/\">";		
			}else{
				echo "<base href=\"http://www.esquadriasmunchen.com/admin/\">";	
			}
		?>
		<link type="text/css" rel="stylesheet" href="media/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="media/css/bootstrap-responsive.min.css">
		<link type="text/css" rel="stylesheet" href="media/css/base.css">
		
		<?php if(isset($extra_style)) print $extra_style; ?>
		
		<script src="media/js/jquery.js"></script>
		<script src="media/js/bootstrap/min.js"></script>
		<script src="media/js/main.js"></script>
		
		<?php if(isset($extra_script)) print $extra_script; ?>		
				
		<!--[if lt IE 9]>
			<link href="media/css/no-html5.css" rel="stylesheet" type="text/css">
			<script src="media/js/html5.js"></script>
			<script>
				document.createElement("header");
				document.createElement("section");
				document.createElement("nav");
				document.createElement("article");
				document.createElement("figure");
				document.createElement("footer");
			</script>
		<![endif]-->