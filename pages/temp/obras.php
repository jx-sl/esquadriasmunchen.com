<?php

require_once 'models/obras.php';
$o = new ObrasPage();

$actualPage=null;
$pagination=0;

if($tabDynamic!=null){
	$actualPage=$tabDynamic;
}

if($pageDynamic!=null){
	$pagination=$pageDynamic;
}
$content_main = "ADGdg".$p->montaMainContent($actualPage, $pagination);


$page_title = "Obras Realizadas";
$page_id = "obras";
$extra_css = '<link href="media/css/jquery.fancybox.css" rel="stylesheet" type="text/css">';
$extra_js = '<script src="media/js/jquery.fancybox.js"></script>';
$extra_js .= '<script src="media/js/obras.js"></script>';
//$body_onload = true;

$content_sidebar = '<h4>Aqui você pode conferir algumas obras com esquadrias produzidas pela München.</h4>
					<button class="btn" name="produtos">Ver Produtos</button>';


