<?php
include("../config/config.php");
if(isset($_POST['hdTitle'])&&isset($_POST['hdDes'])){
	$title = $_POST['hdTitle'];
	$des = $_POST['hdDes'];
	$id = $_POST['hdID'];
	// $rs = "Nhóm bài viết đã tồn tại!";
	$collections = $db->category;
	// $doc = array("catname" => $title, "des" => $des);
	// $ids = array("catname" => $id);
	// $cols = $collections->findOne($ids);
	// foreach ($cols as $col) {
	// 	$c = array("catname" => $col['catname'], "des" => $col['catname']);
	// 	$collections->update($c, $doc);
	// }
	$collections->update(array("catname" => $id), array("catname" => $title, "des" => $des));
	// 
	echo "OK";
}else{
	echo "Lỗi";
}