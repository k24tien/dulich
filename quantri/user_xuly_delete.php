<?php
include("../config/config.php");

if(isset($_POST['hdArrayID'])){
	$titles = $_POST['hdArrayID'];
	$t = "1";
	foreach($titles as $tt){
		$username = array('username' => $tt);
		$db->user->remove($username);
	}
	echo "OK";
}else{
	echo "Lỗi";
}