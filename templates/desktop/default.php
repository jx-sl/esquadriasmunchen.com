<!DOCTYPE html>
<html>
<head>	
	<?php include TEMPLATES_BASE."head.php"; ?>		
</head>	
<body<?php if(isset($page_id)) echo " id=\"$page_id\""; ?>>
	<header class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner bg-blue">
        	<div class="container">
        		<?php include TEMPLATES_BASE."/header.php"; ?>
        	</div>
        </div>
    </header>

    <section class="container page-main-content">
    
    	<section class="page-title">
    		<h2><?php if(isset($page_title)) echo $page_title; ?></h2>
    	</section>
    
		<section class="row">					
			<section class="span3 content-sidebar">	
				<?php if(isset($content_sidebar)) echo $content_sidebar; ?>
			</section><!-- content-sidebar -->
			
			<section class="span9 content-main">
				<?php if(isset($content_main)) echo $content_main; ?>
			</section><!-- content-main -->
		</section><!-- content -->

    </section> <!-- /container -->
    <section class="container">
		<div class="addthis_toolbox addthis_default_style ">
		<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		<a class="addthis_button_tweet"></a>
		<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
		<a class="addthis_counter addthis_pill_style"></a>
		</div>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-52b253fd0ded0e3b"></script>
	</section>
    <footer class="footer"><!--navbar-fixed-bottom">-->
    	<div class="navbar-inner bg-blue">
    		<div class="container">
    			<?php include TEMPLATES_BASE."footer.php"; ?>
    		</div>
    	</div>
    </footer>
</body>
</html>