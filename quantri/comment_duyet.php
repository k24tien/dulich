<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$ids = $_POST['hdArrayID'];
	
	$collections = $db->post;

	$res = 0;

	foreach($ids as $id){
		$arr = explode("-", $id, 2);
		$cm_id = $arr[0];
		$post_id = $arr[1];
		

		$result = $collections->update(
			array('_id'=> new MongoId($post_id),"comments.comment_id"=> new MongoId($cm_id)),
			array('$set' => array("comments.$.duyet" => "1"))
		);
		if($result){
			$res = 1;
		}
	}
	if($res == 1){
		echo "OK";
	} 
	
}else{
	echo "Lỗi";
}