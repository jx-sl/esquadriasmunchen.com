<?php

/*
 * 
 * Jx__ Sistema de Administracao de Website
 * Julio Griebeler
 * www.jcreate.com.br
 * (51) 9665 5842
 * julio.fg@live.de
 * 
 */

	require "includes/class/Init.php";
	require "includes/class/Framework.php";
	$PAGES = array( "erro", "home", "empresa", "produtos", "obras", "contato", "admin" ); // setar ERRO sempre na primeira posicao e a index default sempre na segunda	define( "ABSOLUTE_PATH", "http://localhost/siteMunchen/" );
	
	define( "TEMPLATES_BASE", "templates/base/" );
	define( "ADMIN_FOLDER", "admin/" );
	define( "UPLOAD_FOLDER", "uploads/" );
	define( "FILES_FOLDER", "files/" );
	define( "MEDIA_FOLDER", "media/" );	
	define( "SITE_TITLE", "Esquadrias München" );
	define( "DEFAULT_META_DESCRIPTION", "A Esquadrias München produz há mais de 40 anos esquadrias de madeira com qualidade, bom gosto e de acordo com a necessidade do cliente. " );
	define( "DEFAULT_META_KEYWORDS", "esquadriasmunchen.com, munchen, esquadrias, madeira, bom principio, porta, janela, veneziana, esquadria, contrucao, reforma" );
	define( "DEFAULT_META_CONTENT", "http://www.esquadriasmunchen.com" );
	
	# PARAMETROS DE CONFIGURACAO DO BANCO
	define( "DB_TYPE", "MYSQL" ); // PG para POSTGRES || MYSQL para MYSQL
	define( "DEFAULT_TEMPLATE", "default" );
	if($_SERVER["HTTP_HOST"]=="localhost"){
		define( "ABSOLUTE_PATH", "http://localhost/esquadriasmunchen.com/" );
		define( "DB_HOST", "localhost");
		define( "DB_NAME", "siteMunchen");
		define( "DB_USER", "root");
		define( "DB_PASS", "");
	}else{
		if($_SERVER["HTTP_HOST"]=="www.esquadriasmunchen.com"){
			define( "ABSOLUTE_PATH", "http://www.esquadriasmunchen.com/" );
		}else if($_SERVER["HTTP_HOST"]=="www.esquadriasmunchen.com.br"){
			define( "ABSOLUTE_PATH", "http://www.esquadriasmunchen.com.br/" );
		}else if($_SERVER["HTTP_HOST"]=="esquadriasmunchen.com"){
			define( "ABSOLUTE_PATH", "http://www.esquadriasmunchen.com/" );
		}
		define( "DB_HOST", "#");
		define( "DB_NAME", "#");
		define( "DB_USER", "#");
		define( "DB_PASS", "#");
	}
	$LANG = array( "pt", "en", "de", "es" );
	$DEFAULT_CSS = array( "main", "main-ie" );
	$DEFAULT_JS = array( "jquery", "main" );
	new Init();