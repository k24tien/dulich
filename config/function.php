<?php
include("config.php");

function checkLogin($user, $pass){
	$check = false;
	$collections = $db->user;
	$users = $collections->find(array('username'=>$user));
	// $storedUser = "";
	// $storedPass = "";
	// foreach ($users as $u) {
	// 	$storedUser = $u["username"];
	// 	$storedPass = $u["pwd"];
	// }
	// if($user == $storedUser && $pass==$storedPass){
	// 	$check = true;
	// }
	return $user;
}