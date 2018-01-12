<?php
include("../config/config.php");
if(isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['name'])){
	$username = $_POST['username'];
	$pwd = md5($_POST['pwd']);
	$name = $_POST['name'];
	$rs = "User đã tồn tại!";
	
	$collections = $db->user;
	$doc = array( "username" => $username, "pwd" => $pwd, "name" => $name);
	$collections->insert($doc);
	echo "OK";
	
}else{
	echo "Lỗi";
}