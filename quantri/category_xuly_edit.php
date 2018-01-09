<?php
include("../config/config.php");
if(isset($_POST['hdTitle'])&&isset($_POST['hdDes'])){
	$title = $_POST['hdTitle'];
	$des = $_POST['hdDes'];
	$id = $_POST['hdID'];
	$collections = $db->category;
	$collections->update(array("catname" => $id), array("catname" => $title, "des" => $des));
	echo "OK";
}else{
	echo "Lỗi";
}