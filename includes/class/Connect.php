<?php
	class Connect{
		function __construct(){
			if(DB_TYPE=="PG"){
				$this->loadPG();
			}else if(DB_TYPE=="MYSQL"){
				$this->loadMySql();
			}else{
				die("Conexao ao banco de dados nao foi definida. Contate o administrador!");
			}
		}
		
		private function loadPG(){
		}
		private function loadMySql(){
		}
				
		public function read($db_table, $db_row){
			$sql = "SELECT * FROM  `".$db_table."` WHERE uri = '".$db_row."'";
			$res = mysql_query($sql);
		}
	}

