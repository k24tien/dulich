<?php
session_start();

if(isset($_SESSION["username"])){
	include("admin.php");
}else{
	include("login.php");
}
?>