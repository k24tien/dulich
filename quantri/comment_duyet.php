<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$ids = $_POST['hdArrayID'];
	$collections = $db->post;
	
	foreach($ids as $id){
		$arr = explode("-", $id, 2);
		$cm_id = $arr[0];
		$post_id = $arr[1];
		//$query1 = array('comment_id' => new MongoId($id));
		


		$result = $collections->update(
			array("_id" => new MongoId($post_id)),
			array('$pull' => 
				array('comments.array'=> 
					array('comment_id' => new MongoId($cm_id))
					)
				)
		);
	}
	echo "OK";
	
}else{
	echo "Lỗi";
Ư