<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$ids = $_POST['hdArrayID'];
	
	$collections = $db->post;

	$duyet = "1";

	foreach($ids as $id){
		$arr = explode("-", $id, 2);
		$cm_id = $arr[0];
		$post_id = $arr[1];
		

		$result = $collections->update(
			array("_id" => new MongoId($post_id),'comments.array'=> array('comment_id' => new MongoId($cm_id))),
			array('comments.array.duyet' => $duyet)	
		);
		if($result)
			echo $cm_id;
			echo "<br />";
			echo $post_id;
			echo "OK";

	} 
	
}else{
	echo "Lỗi";
}