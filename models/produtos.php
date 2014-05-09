<?php
include "includes/class/Database.php";
class ProdutosPage{
	private $db;
	private $conn;
	function __construct(){
		$this->db=new Database();
		$this->conn=$this->db->connect();
	}
	
	function montaSidebar(){
		require_once 'includes/class/Database.php';
		$db = new Database();
		$db->connect();
		$result = mysql_query ("SELECT * FROM produtos_grupo WHERE ativo=1");
		if(!$result)
			$erro=mysql_error();
		$out = "<div>";		
		while (list ($id, $nome, $url) = mysql_fetch_row ($result)) {
			$out.="<h4><a class='".$url."' href='produtos/".$url."'> > ".htmlentities($nome)."</a></h4>";
		}
		return $out."</div>";
	}
	
	function montaMainContent($urlGroup=null, $urlTab=null){
		require_once 'includes/class/Database.php';
		$db = new Database();
		$db->connect();		
		$pageContent = $urlGroupOut = $pageTitle = $erro = $urlTabSelect = $paginationBtns = "" ;
				
		if($urlGroup==null){
			$queryGroup = "SELECT MIN(pg.id), pg.nome, pg.url FROM produtos_grupo pg WHERE pg.ativo=1";
			$resultGroup = mysql_query ($queryGroup);
			$group = mysql_fetch_array($resultGroup);
			$urlGroupOut = $group['url'];
			$pageTitle = $group['nome'];
		}else{
			$urlGroupOut = $urlGroup;
		}
		// conta o numero de itens a retornar		
		$queryCountItens = "SELECT p.id FROM produtos p, produtos_grupo pg WHERE pg.url='".$urlGroupOut."' AND pg.id=p.produtos_grupo AND p.ativo=1 AND pg.ativo=1";
		$resultCount = mysql_query($queryCountItens);
		$countResult = mysql_num_rows($resultCount);
		if($countResult>=9){
			$numItensPagination = (int)(($countResult / 9)+1);
			$paginationBtns .= "<ul class='pagination'><li><a href='produtos/".$urlGroupOut."/1'>&laquo;</a></li>";
			for ($i = 1; $i <= $numItensPagination; $i++) {
				$paginationBtns .= "<li><a href='produtos/".$urlGroupOut."/".$i."'>".$i."</a></li>";
			}
			$paginationBtns .= "<li><a href='produtos/".$urlGroupOut."/".$numItensPagination."'>&raquo;</a></li></ul>";
		}
		
		
		if($urlTab==null){
			$urlTabSelect = 1;
		}else{
			$urlTabSelect = ($urlTab-1)*9;
		}
		
		
		$query = "SELECT pg.url, p.nome, p.imagem, pg.nome FROM produtos p, produtos_grupo pg WHERE pg.url='".$urlGroupOut."' AND pg.id=p.produtos_grupo AND p.ativo=1 AND pg.ativo=1 LIMIT ".$urlTabSelect.", 9";
		//die($query);
		$result = mysql_query($query);
		if(!$result)
			$erro=mysql_error();	
		
		while (list ($urlGroupScreen, $nameProduct, $imgProduct, $nameGroup) = mysql_fetch_row ($result)) {
			if($pageTitle=="") $pageTitle=$nameGroup;
			if($urlGroupOut=="") $urlGroupOut=$urlGroupScreen; 
			$pageContent.="<li>
							<a title='".$nameProduct."' class='thumbnail fancybox' rel='".$urlGroupScreen."' href='uploads/".$imgProduct."'>
								<img src='uploads/thumbs/".$imgProduct."' alt='".$nameProduct."'>
							</a>
						</li>";
		}
		if($erro!=""){
			return "<h3>Erro:".$erro."</h3>";
		}
		$contentScreen = "<h3>".htmlentities($pageTitle)."</h3>";
		$contentScreen .= "<ul class='tab'>".$pageContent."</ul>";
		if($urlGroupOut=='portas'){
			$contentScreen .= "<span class='clear'></span><a title='".$nameProduct."' class='fancybox' rel='acabamento' href='media/img/acabamento_portas.jpg'>
								Confirma os acabamentos especiais para portas que trabalhamos clicando AQUI.
							</a>";
		}
		$contentScreen .= "<span class='clear'></span>".$paginationBtns;
		$contentScreen .= "<script>$(function(){ $('a.".$urlGroupOut."').addClass('active'); })</script>";
		return $contentScreen;
	}
	
}