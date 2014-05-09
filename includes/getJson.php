<?php

	header('Content-type: application/json; charset=utf-8');	
	require 'class/Database.php';
	$db = new Database();
	$db->connect();
	
	$res = mysql_query("SELECT * FROM ".$table." WHERE ativo=1") or die(mysql_error());
	$ret = array();
	while ($line = mysql_fetch_array($res, MYSQL_ASSOC)) {
		if(!is_object($line))
			$ret[] = $line;
	}
	$ret_json[$table] = $ret;
	echo json_encode($ret_json);
