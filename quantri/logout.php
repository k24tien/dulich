<?php
  unset($_SESSION["username"]);
  session_destroy();
  include("login.php");
?>