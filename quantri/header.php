<?php
session_start();


if(!isset($_SESSION["username"])){
    header('Location: login.php');
}
?>
<?php include("../config/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
	<title>Quản trị hệ thống</title>
	<!-- Bootstrap CSS -->
	
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">        
    <!-- alert -->
    <link href="../bootstrap_alert/sweet-alert.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="backend.css" type="text/css">
    <link rel="stylesheet" href="../css/admin_menu.css" type="text/css">
    <link rel="stylesheet" href="../css/admin_bar.css" type="text/css">
    <link rel="stylesheet" href="../css/summernote.css" type="text/css">
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap_alert/sweet-alert.js" type="text/javascript"></script>
    <script src="../js/summernote.js"></script>
    <script src="../js/libraries.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
    	function openNav() {
            if($("#wrap").hasClass("folded")){
                $("#wrap").removeClass("folded");
                $("#icon_collapse").removeClass("glyphicon-circle-arrow-left");
                $("#icon_collapse").addClass("glyphicon-circle-arrow-right");
            }else{
                $("#wrap").addClass("folded");
                
                $("#icon_collapse").removeClass("glyphicon-circle-arrow-right");
                $("#icon_collapse").addClass("glyphicon-circle-arrow-left");
            }
        }
    </script>
</head>
<body>
	<div id="wrap" class="openMenu">
		<div id="adminmenumain">
			<div id="adminmenuback"></div>
			<div id="adminmenuwrap">
				<ul id="adminmenu">
					<li id="collapse-menu">
                        <button id="collapse-button" type="button" onclick="openNav()">
                            <span id="icon_collapse" class="glyphicon glyphicon-circle-arrow-left"></span>
                        </button>
                    </li>
                    <li class="active menu-top">
                        <a href="../" target="_blank">
                            <span class="icon">
                                <i class="glyphicon glyphicon-th-large"></i>
                            </span>
                            <span class="text_menu">Trang chủ</span>
                        </a>
                    </li>
                    <li class="menu-top">
                        <a href="post.php">
                            <span class="icon"><i class="glyphicon glyphicon-pushpin"></i></span>
                            <span class="text_menu">Quản lý bài viết</span>
                        </a>
                    </li>
                    <li class="menu-top">
                        <a href="category.php">
                            <span class="icon"><i class="glyphicon glyphicon-pushpin"></i></span>
                            <span class="text_menu">Quản lý chủ đề</span>
                        </a>
                    </li>

                    <li class="menu-top">
                        <a href="comments.php">
                            <span class="icon"><i class="glyphicon glyphicon-pushpin"></i></span>
                            <span class="text_menu">Quản lý bình luận</span>
                        </a>
                    </li>
                    <li class="menu-top">
                        <a href="user.php">
                            <span class="icon"><i class="glyphicon glyphicon-pushpin"></i></span>
                            <span class="text_menu">Quản lý user</span>
                        </a>
                    </li>
				</ul>
			</div>
		</div>
		<div id="content">
			<div id="adminbar" class="">
                <div id="toolbar" class="quicklinks">
                    <ul id="admin-bar-root-default" class="ab-top-menu">
                        <li id="admin-bar-menu-toggle">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                        </li>
                    </ul>
                    <ul id="admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
                        <li id="admin-bar-my-account" class="menupop with-avatar">
                            <a class="ab-item" href="#">
                                <span class="display-name"><?php echo $_SESSION["username"];?></span>
                                <img class="avatar" src="../images/icons/acount.png">
                            </a>
                        </li>
                        <li id="admin-bar-my-account" class="menupop with-avatar">
                            <a class="ab-item" href="logout.php">
                                <span class="display-name">Thoát</span>
                                
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div id="body">
            	<div id="body-content">