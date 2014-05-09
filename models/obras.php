<?php
include "includes/class/Database.php";
class ObrasPage{
	private $db;
	private $conn;
	function __construct(){
		$this->db=new Database();
		$this->conn=$this->db->connect();
	}
	
	function montaMainContent($urlGroup=null, $urlTab=null){		
		//die($urlGroup);
		require_once 'includes/class/Database.php';
		$db = new Database();
		$db->connect();
		$urlGroupOut = 'realizadas';		
		
		$pageContent = $urlGroupOut = $pageTitle = $erro = $urlTabSelect = $paginationBtns = "" ;
		// conta o numero de itens a retornar		
		$queryCountItens = "SELECT id FROM obras WHERE ativo=1";
		$resultCount = mysql_query($queryCountItens);
		$countResult = mysql_num_rows($resultCount);
		if($countResult>=9){
			$numItensPagination = (int)(($countResult / 9)+1);
			$paginationBtns .= "<ul class='pagination'><li><a href='obras/realizadas/1'>&laquo;</a></li>";
			for ($i = 1; $i <= $numItensPagination; $i++) {
				$paginationBtns .= "<li><a href='obras/realizadas/".$i."'>".$i."</a></li>";
			}
			$paginationBtns .= "<li><a href='obras/realizadas/".$numItensPagination."'>&raquo;</a></li></ul>";
		}
		
		
		if($urlTab==null){
			$urlTabSelect = 1;
		}else{
			$urlTabSelect = ($urlTab-1)*9;
		}
		
		
		$query = "SELECT nome, imagem FROM obras WHERE ativo=1 LIMIT ".$urlTabSelect.", 9";
		//die($query);
		$result = mysql_query($query);
		if(!$result)
			return $erro=mysql_error();	
		
		while (list ($nome, $imagem) = mysql_fetch_row ($result)) {
			$pageContent.="<li>
							<a title='".$nome."' class='thumbnail fancybox' rel='obras' href='uploads/".$imagem."'>
								<img src='uploads/thumbs/".$imagem."' alt='".$nome."'>
							</a>
						</li>";
		}
		if($erro!=""){
			return "<h3>Erro:".$erro."</h3>";
		}
		$contentScreen = "<ul class='tab'>".$pageContent."</ul>";
		$contentScreen .= "<span class='clear'></span>".$paginationBtns;
		return $contentScreen;
	}
	
}