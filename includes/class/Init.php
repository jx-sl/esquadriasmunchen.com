<?php

require "MobileDetect.php";
class Init{

	function __construct(){
		$FRAMEWORK = new Framework();
		$lang = $static_page = $dynamic_page = "";

		/* VALIDA O TIPO DE DISPOSITIVO */
		$browser_type = new Browser();
		/*
		if($browser_type->isMobile())
			define( "BROWSER_TYPE", "mobile" );
		else
			define( "BROWSER_TYPE", "desktop" );
		*/
		
		define( "BROWSER_TYPE", "desktop" );
		define( "PAGES_FOLDER", "pages/".BROWSER_TYPE."/" );
		define( "TEMPLATES_FOLDER", "templates/".BROWSER_TYPE."/" );
		$FRAMEWORK->load();
	}
}
