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
	</style>';
$itens_menu = array('grupo_de_produtos', 'produtos', 'obras');
$breadcrumbs = '<a href="home">Menu Inicial</a> > <strong>Painel Administrativo</strong>';

$page_content = ''
.'	<h3 style="margin:20px 0 5px 20px">Bem Vindo!</h3>'
.'	<h4 style="margin-left:20px">Selecione a opção desejada:</h4>'
.'	<a href="grupo_de_produtos" class="span3">'
.'		<span>Para adicionar ou editar GRUPO DE PRODUTOS clique AQUI.</span><br>'
.'		<img src="media/img/img_grupo.png">'
.'	</a>'
.'	<a href="produtos" class="span3">'
.'		<span>Para adicionar ou editar PRODUTOS clique AQUI.</span><br>'
.'		<img src="media/img/img_produtos.png">'
.'	</a>'
.'	<a href="obras" class="span3">'
.'		<span>Para adicionar ou editar OBRAS clique AQUI.</span><br>'
.'		<img src="media/img/img_obras.png">'
.'	</a>';
include_once "../templates/tpl_base.php";