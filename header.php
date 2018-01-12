<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Du lich dong bang song cuu long</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet"  type="text/css" href="style.css"/>
	<link rel="stylesheet"  type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/animate.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-touch-slider/bootstrap-touch-slider.css" type="text/css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script src="js/libraries.js"></script>
	<link href="css/animate.min.css" rel="stylesheet" media="all">
	<style type="text/css">
		/*.bs-slider{
			max-height: 300px;
		}*/
	</style>
</head>
<body>
<div id="wrapper">
	<header class="row bg-header no-margin">
		<nav class="navbar navbar-right bg-nav no-margin" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				</div>
				<div class="collapse navbar-collapse" id="nav-menu">
					<ul class="nav navbar-nav my-nav">
	                    <li class="active"><a href="index.php">Trang chủ</a></li>
	                    <?php 
                    	$collections = $db->category;
						$cates = $collections->find();
						foreach ($cates as $cat) {
						?>
						<li><a href="category.php?c=<?php echo $cat['catname'];?>"> <?php echo $cat['catname'];?></a> </li>
						<?php }?>
					    <li>
					    	<?php if(isset($_SESSION["username"])){?>
					    	<a href="quantri/"><?php echo $_SESSION["username"];?></a>
					    	<?php }else{?>
					        <a href="quantri/">Đăng nhập</a>
					        <?php } ?>
					    </li>
	                </ul>
				</div>
			</div>
		</nav>
		<div class="col-md-12 no-margin  box-search">
			<form id="search-form" class="form-inline" role="search" action="search.php" method="post">
				<div class="form-group search-form margin-right-10 pull-right">
					<input class="form-control txt-search" type="search" name="txtSearch" id="txtSearch">
					<button type="submit" class="btn btn-danger">Tìm kiếm</button>
					<a  class="btn btn-danger" href="#adSearchModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-chevron-down"></i></a>
					<!-- <input class="btn-search" type="button" alt="adSearch"/> -->
				</div>
			</form>
		</div>
	</header>