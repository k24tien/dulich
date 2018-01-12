<?php
include("../config/config.php");
if(isset($_POST['hdC_Tinh'])&&isset($_POST['hdC_Huyen'])){
	$tinh = $_POST['hdC_Tinh'];
	$huyen = json_decode($_POST['hdC_Huyen']);
	
	$collections = $db->nhom4_place;
	$doc = array( "tinh" => $tinh, "huyen" => $huyen);
	$collections->insert($doc);
	echo "OK";
}else{
	echo "Lỗi";
}