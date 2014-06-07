<?php

class Database{
	public function connect(){
		if($_SERVER['HTTP_HOST']=="localhost"){
			$connect = mysql_connect("localhost", "root", "");		
			if(!$connect)
				die("Erro ao conectar banco de dados!");
			
			$query = mysql_select_db("db_esquadriasmunchen");
			if(!$query)
				die("Erro ao selecionar banco de dados!");
		}else{
			$connect = mysql_connect("localhost", "munchen", "ebagu3e4e");		
			if(!$connect)
				die("Erro ao conectar banco de dados!");
			
			$query = mysql_select_db("zadmin_esquadriasmunchen");
			if(!$query)
				die("Erro ao selecionar banco de dados!");		
		}
	}
	
	private function disconnect(){
		mysql_close(null);
	}
	
	public function get_item($table, $keys, $where=null){
		$conn = $this->connect();
		if($where!=null){
			$query = "SELECT * FROM ".$table." WHERE ativo = 1 AND ".$where;
		}else{
			$query = "SELECT * FROM ".$table." WHERE ativo = 1";
		}
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
}