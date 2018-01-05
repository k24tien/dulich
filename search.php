<?php include('config/config.php');
if (isset($_POST['txtSearch'])) {
	$txt_search =  $_POST['txtSearch'];
	var_dump($txt_search);
}
?>
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
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
	                    <li class="active"><a href="http://localhost/doan">Trang chủ</a></li>
	                    <?php 
                    	$collections = $db->category;
						$cates = $collections->find();
						foreach ($cates as $cat) {
						?>
						<li><a href="category.php?c=<?php echo $cat['catname'];?>"> <?php echo $cat['catname'];?></a> </li>
						<?php }?>
					    <li>
					        <a href="#">Bản đồ</a>
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
					<!-- <input class="btn-search" type="submit" alt="Search" value="Search" /> -->
				</div>
			</form>
		</div>
	</header>
	<section class="row slider no-margin">
            <div class="banner">
                <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="3000" style="max-height: 400px !important;">
                    <ol class="carousel-indicators">
                        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="images/image1.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            
                        </div>
                        
                        <div class="item">
                            <img src="images/image2.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            
                        </div>
                        <div class="item">
                            <img src="images/image4.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            
                        </div>
                    </div>
                    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    
                    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
            <script src="js/jquery.touchSwipe.min.js"></script>
			<script src="bootstrap-touch-slider/bootstrap-touch-slider.js"></script>
			<script type="text/javascript">
			    $('#bootstrap-touch-slider').bsTouchSlider();
			</script>
    </section>
    <div class="row no-margin">
    	<div class="container">
    		<h2 class="tagline">Kết quả tìm kiếm</h2>
    	</div>
    </div>
	<section class="row no-margin content">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<?php 
            	$collections = $db->post;
				$posts = $collections->find(array('title'=> '/.*'.$txt_search'.*/'));
				foreach ($posts as $post) {
				?>
				<div class="col-md-3 post">
					<div class="thumbnail">
						<a href="post.php?p=<?php echo $post['alias']?>">
						<img style="min-height: 210px !important;" src="data:png;base64,<?php echo base64_encode($post['post_image']->bin);?>" alt="ben ninh kieu">
						</a>
						<div class="caption">
							<a href="post.php?p=<?php echo $post['alias']?>"><h3><?php echo $post['title']?></h3></a>
						</div>
					</div>
				</div>
				<?php }?>
				
			</div>
			
		</div>
	</section>
	<footer class="row no-margin footer">
		<div class="container margin_top45">
			<h4 class="copyright">@Copyright dulichmekong</h4>
		</div>
	</footer>
</div>
</body>
</html>