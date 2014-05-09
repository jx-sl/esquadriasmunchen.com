<?php

class Auth{
	var $name, $user, $pass;
	
	function getUsername(){
		return $this->name;
	}
	
	function Auth($user, $pass){
		$this->user  = $user;
		$this->pass = md5($pass);
	}
	
	function login() {
		$user  = $this->user;
		$pass = $this->pass;
		$query = "SELECT nome, login, senha FROM usuarios WHERE login=$user AND senha=$pass AND ativo=1";
		$res = mysql_query($query) or die(mysql_error());
		
		if(mysql_num_rows($res)>0){
			$this->initSession($this);
			return true;
		}else{
			return false;
		}
	}
	
	function initSession($user) {
		session_start();
		$_SESSION['jx_user'] = md5($user);
	}
}