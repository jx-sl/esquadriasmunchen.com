<?php
require'../includes/conn.php';
require'../includes/helpers/class.upload/class.upload.php';
$name = ($_POST['name']);
$ativo = ($_POST['ativo']);
$msg_error = "";
$error = false;
$new_img = false;
$img_actual = "";
if(isset($_POST['imagem_atual'])){
	$img_actual = $_POST['imagem_atual'];
}
$id = $sql = $img_name = "";

if(isset($_POST['id'])){
	$id = ($_POST['id']);
}

if(!empty($_FILES['imagem'])){
	$img = ($_FILES['imagem']);
	$img_w="1";
	$img_h="0";

	// SE TIVER IMAGEM FAZ O UPLOAD
	if($img['tmp_name'] != ""){
		$img_size = getimagesize($img["tmp_name"]);
		$img_w = $img_size[0];
		$img_h = $img_size[1];
		$new_img = true;

		$upload_thumb = new Upload($img);
		$upload = new Upload($img);

		if ($upload_thumb->uploaded && $upload->uploaded){
			$upload_thumb->file_new_name_body	= "img";
			$upload->file_new_name_body   		= "img";
			$upload_thumb->allowed = array('image/jpg','image/jpeg','image/png','image/gif');
			$upload->allowed = array('image/jpg','image/jpeg','image/png','image/gif');
			$upload_thumb->image_convert 		= 'jpg';
			$upload->image_convert 				= 'jpg';
			$upload_thumb->jpeg_quality         = 85;
			$upload->jpeg_quality          		= 90;

			$upload_thumb->image_resize  		= true;
			$upload_thumb->image_ratio_crop     = true;
				
			$upload->image_resize         		= true;
				
			if($img_w>$img_h){
				$upload_thumb->image_x          = 220;
				$upload_thumb->image_y          = 150;
				$upload->image_x              	= 900;
				$upload->image_ratio_y       	= true;
			}else{
				$upload_thumb->image_y          = 150;
				$upload_thumb->image_ratio_x    = true;
				$upload->image_x              	= 700;
				$upload->image_ratio_y       	= true;
			}
			$upload->image_watermark       		= 'munchen.png';
			$upload->image_watermark_x     		= 10;
			$upload->image_watermark_y     		= 10;
			$upload_thumb->Process('../../uploads/thumbs/');
			$upload->Process('../../uploads/');
		}else{
			$msg_error = $upload_thumb->error;
			$error=true;
		}

		if($upload->processed && $upload_thumb->processed){
			$img_name = $upload->file_dst_name;
			$upload_thumb-> Clean();
			$upload-> Clean();
		}else{
			echo 'error : ' . $upload_thumb->error . '<br />';
			echo 'error : ' . $upload->error;
		}
	}else{
		$new_img=false;
	}
}

if($id!=''){
	if($new_img){
		$sql = "UPDATE
		obras
		SET
		nome='$name',
		imagem='$img_name',
		ativo='$ativo',
		usuario_modificacao='1'
		WHERE
		id='$id'";
		if($img_actual!=""){
			unlink("../../uploads/thumbs/".$img_actual);
			unlink("../../uploads/".$img_actual);
		}
	}else{
		$sql = "UPDATE
		obras
		SET
		nome='$name',
		ativo='$ativo',
		usuario_modificacao='1'
		WHERE
		id='$id'";
	}
}else{
	$sql = "INSERT INTO
	obras
	(nome, imagem, ativo, usuario_cadastro)
	VALUES
	('$name', '$img_name', '$ativo', '1')";
}


if($error){
	echo "Erros: ".$msg_error;
}else{
	mysql_query($sql) or die(mysql_error());
}
header("Location: ./");
