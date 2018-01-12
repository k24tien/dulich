<?php
include('config/config.php');
if(isset($_POST['hdID'])){
	$id = $_POST['hdID'];
	$collections = $db->post;
	$post = null;
	$query = array('_id' => new MongoId($id));
	$post = $collections->findOne($query);
	// foreach ($posts as $key => $value) {
	// 	$post = $value;
	// }
	$numlike = 0;
	if($post!= null){
		$numlike = $post['like'] + 1;
		$collections->update(
			array('_id'=> new MongoId($id)),
			array('$set' => array("like" => $numlike))
		);
		echo $numlike;
	}
	
}