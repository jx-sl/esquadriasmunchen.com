<?php
require'../includes/conn.php';
$id = $_GET['id'];
$res = mysql_query("SELECT * FROM produtos WHERE produtos_grupo='$id'") or die(mysql_error());

if($res){
	$num = mysql_num_rows($res);
	if($num>0){
		header("Location: ./?m=er");
	}else{
		$sql = "DELETE FROM produtos_grupo WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		header("Location: ./?m=ok");
	}
}

?>