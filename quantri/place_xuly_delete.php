<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$ids = $_POST['hdArrayID'];
	foreach($ids as $id){
		$query = array('_id' => new MongoId($id));
		$db->nhom4_place->remove($query);
	}
	echo "OK";
}else{
	echo "Lỗi";
}