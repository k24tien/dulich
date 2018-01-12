<?php
include("../config/config.php");
if(isset($_POST['id_Tinh'])){
	$id = $_POST['id_Tinh'];
	$tinh = $_POST['n_tinh'];
	$huyen = json_decode($_POST['n_huyen']);
	//$collections = $db->category;
	//$collections->update(array("catname" => $id), array("catname" => $title, "des" => $des));
	echo "OK";
	echo $tinh;
	print_r($huyen);
}else{
	echo "Lỗi";
}