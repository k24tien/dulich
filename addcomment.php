<?php
include("config/config.php");
if(isset($_POST['cm_Title'])&&isset($_POST['cm_Email'])&&isset($_POST['cm_Content'])){
	$post_Id = $_POST['post_id'];
	$cm_title = $_POST['cm_Title'];
	$cm_email = $_POST['cm_Email'];
	$cm_content = $_POST['cm_Content'];
	$cm_id = new MongoId();
	//$rs = "Nhóm bài viết đã tồn tại!";
	$collections = $db->post;

	$query1 = array('_id' => new MongoId($post_Id));
	//$query2 = array('$push' => array("comments" =>array("comment_id" => $cm_id, "comment_name" => $cm_title, "comment_email" => $cm_email, "comment_content" => $cm_content, "comment_date" => new MongoDate(), "duyet" => "0")));


	$result = $collections->update(
		$query1,array('$push' => array('comments.array'=>
			array (
			      "comment_id" => $cm_id, 
			      "comment_name" => $cm_title, 
			      "comment_email" => $cm_email, 
			      "comment_content" => $cm_content, 
			      "comment_date" => new MongoDate(), 
			      "duyet" => "0"
			    )
				)
			)
	);
	if($result){
		echo "OK";
	}
	else
		echo "Co loi xay ra";
	
	//}
}else{
	echo "Lỗi";
}