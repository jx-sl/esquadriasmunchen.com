<?php
	require'../includes/conn.php';
	$id = $_GET['id'];
	$res = mysql_query("SELECT imagem FROM obras WHERE id='$id'") or die(mysql_error());
	if($res){
		$num = mysql_num_rows($res);
		if($num>0){
			$imagem = mysql_result($res, 0, 'imagem');
			unlink("../../uploads/thumbs/".$imagem);
			unlink("../../uploads/".$imagem);
			$sql = "DELETE FROM obras WHERE id='$id'";
			mysql_query($sql) or die(mysql_error());
			header("Location: ./?m=ok");
		}else{
			header("Location: ./?m=er");
		}
	}