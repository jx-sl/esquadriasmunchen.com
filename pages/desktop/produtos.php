<?php

require_once 'models/produtos.php';
$p = new ProdutosPage();

if(isset($tabUrl))
	$pgId=$tabUrl;
$content_sidebar = "<h4>Produzimos todos tipos de esquadrias de madeira, adequando o que for necessario para atender e manter o padrão da sua obra.</h4>";
$content_sidebar .= $p->montaSidebar();


$actualPage=null;
$pagination=0;

if($tabDynamic!=null){
	$actualPage=$tabDynamic;
}

if($pageDynamic!=null){
	$pagination=$pageDynamic;
}
$content_main = $p->montaMainContent($actualPage, $pagination);


$page_title = 'Produtos';
$page_id = 'produtos';
$extra_css = '<link href="media/css/jquery.fancybox.css" rel="stylesheet" type="text/css">';
$extra_js = '<script src="media/js/jquery.fancybox.js"></script>';
$extra_js .= '<script src="media/js/produtos.js"></script>';
//$body_onload = true;
