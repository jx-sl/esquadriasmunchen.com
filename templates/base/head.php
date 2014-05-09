
		<title><?php echo SITE_TITLE; if(isset($page_title)) echo " - ".$page_title; ?></title>
		<base href="<?php echo ABSOLUTE_PATH; ?>">
		<meta charset="UTF-8">
		<meta property="og:image" content="http://esquadriasmunchen.com/media/img/logo_munchen.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="<?php echo DEFAULT_META_KEYWORDS; ?>">
		<meta name="description" content="<?php echo DEFAULT_META_DESCRIPTION; ?>">
		<meta name="url" content="<?php echo DEFAULT_META_CONTENT; ?>">
		<meta name="author" content="Jx Solucoes - Julio Francisco Griebeler">
		<meta name="copyright" content="Jx Solucoes || Munchen Esquadrias">
		<meta name="robots" content="index, follow">
		<meta name="language" content="Portuguese">
		<meta name="language" content="pt-br">
		<meta name="country" content="Brazil">
		<meta name="state" content="Rio Grande do Sul">
		<meta name="cache-control" content="no-cache">
		
		<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="media/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
		<link href="media/css/base.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="favicon.ico"> 
		<link rel="made" href="mailto:julio.fg@live.de">
		
		<?php if(isset($extra_css)) echo $extra_css; ?>
		
		<script src="media/js/jquery.js"></script>
		<script src="media/js/bootstrap.min.js"></script>
		<script src="media/js/jquery.corner.js"></script>
		<script src="media/js/jquery.cycle.js"></script>
		<script src="media/js/bootstrap.min.js"></script>
		
		<?php if(isset($extra_js)) echo $extra_js; ?>
		
		<script src="media/js/main.js"></script>
		
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
		
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-20685181-4']);
			_gaq.push(['_setDomainName', 'esquadriasmunchen.com']);
			_gaq.push(['_trackPageview']);
		
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>