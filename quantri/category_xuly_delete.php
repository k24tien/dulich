<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$titles = $_POST['hdArrayID'];
	$t = "1";
	foreach($titles as $tt){
		$cat = array('catname' => $tt);
		$db->category->remove($cat);
	}
	echo "OK";
}else{
	echo "Lỗi";
}