<?php
session_start();
include("../config/config.php");
if(isset($_POST['hdUserName'])&&isset($_POST['hdPass'])){
	$user = $_POST['hdUserName'];
	$pass = $_POST['hdPass'];
	$storedUser = "";
	$storedPass = "";
	$rs = "Tài khoản không đúng!";
	$collections = $db->user;
	$users = $collections->find(array('username' => $user));
	// var_dump($users);
	// $a = "1";
	foreach($users as $u){
		$storedUser = $u["username"];
		$storedPass = $u["pwd"];
	}
	if($user == $storedUser && $pass==$storedPass){
		$_SESSION["username"] = $storedUser;
		$rs = "OK";
	}
	echo $rs ;
}else{
	echo "Lỗi";
}