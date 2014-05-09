<?php

class Framework{
	public function load(){
		$this->validaUrl();
	}
	public function validaUrl(){
		// valida se foi inserido valor na url
		if(isset($_REQUEST["pg"])){
			$parts = explode("/", $_REQUEST["pg"]);
			if(!in_array($parts[0], $GLOBALS['PAGES'])) {
				$this->getPage( $GLOBALS['PAGES'][0] );
			}else{
				if(file_exists( PAGES_FOLDER.$parts[0].".php" )){
					isset($parts[0]) ? $urlPart1=$parts[0] : $urlPart1=null;
					isset($parts[1]) ? $urlPart2=$parts[1] : $urlPart2=null;
					isset($parts[2]) ? $urlPart3=$parts[2] : $urlPart3=null;
					isset($parts[3]) ? $urlPart4=$parts[3] : $urlPart4=null;
					return $this->getPage($urlPart1, $urlPart2, $urlPart3);
				}
			}
		}else{
			return $this->getPage( $GLOBALS['PAGES'][1] );
		}
	}

	public function getPage($page, $tabDynamic=null, $pageDynamic=null){
		$actualPage=null;
		$pagination=1;
		if($tabDynamic!=null){
			$actualPage=$tabDynamic;
		}
		if($pageDynamic!=null){
			$pagination=$pageDynamic;
		}
		include PAGES_FOLDER.$page.".php";
		if(isset($page_template)){
			include TEMPLATES_FOLDER.$page_template.".php";
		}else{
			include TEMPLATES_FOLDER.DEFAULT_TEMPLATE.".php";
		}
	}
	
	public function getDefaultCss(){
		$css = "";
		for($i=0; $i<count($GLOBALS["DEFAULT_CSS"]); $i++)
			$css += "<link rel=\"stylesheet\" type=\"text/css\" href=\"".MEDIA_FOLDER."css/".$GLOBALS["DEFAULT_CSS"][$i].".css\" />\n";
		return $css;
	}
	
	public function getPageCss($file){
		$css_array = array( $file );
		for($i=0; $i<count($css_array); $i++)
			$css += "<link rel=\"stylesheet\" type=\"text/css\" href=\"".MEDIA_FOLDER."css/".$css_array[$i].".css\" />\n";
		return $css;
	}
}