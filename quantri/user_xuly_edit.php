<?php
include("../config/config.php");
if(isset($_POST['username']) && isset($_POST['pwd'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$name = $_POST['fullname'];
	$collections = $db->user;
	$var = array('_id' => new MongoId($id));

	$collections->update($var, array("username" => $username, "pwd" => $pwd, "name" => $name));

	echo "OK";

}else{
	echo "Lỗi";
}