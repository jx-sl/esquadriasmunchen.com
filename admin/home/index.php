<?php
$require_login = true;
$extra_style = '
	<style>
		a.span3{
			text-align:center;
			border:2px solid #DDD;
			border-radius:5px;
			height:230px;
			padding:10px;
		}
		a.span3 span{color:#111;font-size:20px;}
		a.span3:hover{opacity:0.8;background:#EEE;}
	</style>
';
$breadcrumbs = '<strong>Menu Inicial</strong>';
$page_content = ''
	.'	<h3 style="margin:20px 0 5px 20px">Bem Vindo!</h3>'
	.'	<h4 style="margin-left:20px">Selecione a opção desejada:</h4>'
	.'	<a href="lista_produtos" class="span3">'
	.'		<span>Para visualizar a galeria de fotos clique AQUI.</span><br>'
	.'		<img src="media/img/img_camera.png">'
	.'	</a>'
	.'	<a href="adm" class="span3">'
	.'		<span>Para gerenciar o conteudo do site clique AQUI.</span><br>'
	.'		<img src="media/img/img_people.png">'
	.'	</a>';
include_once "../templates/tpl_base.php";