<?php

function getUrl($urlIn) {
	$urlLower = strtolower($urlIn);

	$remove = array(' ', ',', '.', '  ', '?', '@', '!', '%', '+', '(', ')', '<', '>' );
	$removeA = array('á', 'ä', 'à', 'ã', 'â');
	$removeE = array('é', 'ï', 'è', 'ê', );
	$removeI = array('í', 'ì', 'ï', 'î');
	$removeO = array('ó', 'ò', 'õ', 'ô');
	$removeU = array('ú', 'ù', 'û', 'ü');
	$removeC = array('©', 'ç');

	$urlA = str_replace($removeA,'a',$urlLower);
	$urlE = str_replace($removeE,'e',$urlA);
	$urlI = str_replace($removeI,'i',$urlE);
	$urlO = str_replace($removeO,'o',$urlI);
	$urlU = str_replace($removeU,'u',$urlO);
	$urlC = str_replace($removeC,'c',$urlU);

	$urlOut = str_replace($remove,'-',$urlC);

	return $urlOut;
}