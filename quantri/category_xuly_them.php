<?php
include("../config/config.php");
if(isset($_POST['hdC_Title'])&&isset($_POST['hdC_Des'])){
	$title = $_POST['hdC_Title'];
	$des = $_POST['hdC_Des'];
	$rs = "Nhóm bài viết đã tồn tại!";
	$collections = $db->category;
	//$cates = $collections->find(array('catname' => $title));
	//if(count($cates)>0){
		//echo $rs;
	//}else{
		$doc = array( "catname" => $title, "des" => $des);
		$collections->insert($doc);
		echo "OK";
	//}
}else{
	echo "Lỗi";
}