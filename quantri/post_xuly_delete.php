<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$ids = $_POST['hdArrayID'];
	foreach($ids as $id){
		$cat = array('title' => $id);
		$db->post->remove($cat);
	}
	echo "OK";
}else{
	echo "Lỗi";
}