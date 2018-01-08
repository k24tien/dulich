<?php
include("../config/config.php");
if(isset($_POST['txtA_Title'])){
	$title = $_POST['txtA_Title'];


	//$collections = $db->category;
	//$cates = $collections->find(array('catname' => $title));
	//if(count($cates)>0){
		//echo $rs;
	//}else{
		//$doc = array( "catname" => $title, "des" => $des);
		//$collections->insert($doc);
		echo $title;
	//}
}else{
	echo "Lỗi";
}