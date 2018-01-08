<?php include('config/config.php');
$post = null;
$la = 0;
$ln = 0;

if(isset($_GET["p"])){
	$p = $_GET["p"];
	$collections = $db->post;
	$posts = $collections->find(array('alias'=>$p));
	foreach ($posts as $key => $value) {
		$post = $value;
	}
}
if($post!=null && $post['urlmap']!=""){
	$url = strstr($post['urlmap'],'@');
	$la = substr($url, 1,strpos($url, ',' )-1);
	$url1 = str_replace('@'.$la.',' , "", $url);
	$ln = substr($url1, 0,strpos($url1, ',' )-1);
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
<<<<<<< HEAD
	                    <<li class="active"><a href="http://localhost/doan">Trang chủ</a></li>
=======
	                    <li class="active"><a href="index.php">Trang chủ</a></li>
>>>>>>> 0e64ca66cbfa1f16960ee5b45c9aff13a73577a0
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
                <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="3000" >
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
    <div class="d_divide5"></div>
	<section class="row no-margin">
		<div class="col-md-9">
			<div class="panel panel-default no-background">
				<div class="block-center">
					<div class="panel-heading">
						<p class="breadcrumb"><?php echo '<a href="category.php?c='.$post['category'].'">'. $post['category'].'</a>'?> >> <?php echo $post['title']?></p>
					</div>
					<div class="panel-body">
						<div class="row no-margin">
							<div class="col-md-12  padding15">
								<h3 class="title-post"><?php echo $post['title']?></h3>
								<p style="width: 100% ! important;"><?php echo $post['content']?></p>
							</div>
							<div class="col-md-12  padding15">
								<button class="my_btn" type="button" id="btnAccount" onclick="shoFormLogin()" style="background-color: #1b95e0;font-size: 15px; padding: 0px 10px; margin-bottom: 5px;">
                                        <i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i>
                                        <span style="font-size: 12px;">Thích <?php if($post['like']>0) echo $post['like'];?></span>
                                    </button>
							</div>
							<div class="col-md-12  padding15 comment" style="background: #f7f7f7;border-radius: 2px;">
								<form class="form-horizontal" name="phpForm" action="" id="phpForm">
									<div class="form-group col-md-12 col-sm-12">
						                <label for="txtA_Title" class="col-sm-2 control-label">
						                    Tên
						                    <span class="d_asterisk">*</span>                                
						                </label>
						                <div class="col-sm-10">
						                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
						                </div>
						            </div>
						            <div class="form-group col-md-12 col-sm-12">
						                <label for="txtA_Title" class="col-sm-2 control-label">
						                    Email
						                    <span class="d_asterisk">*</span>                                
						                </label>
						                <div class="col-sm-10">
<<<<<<< HEAD
						                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
=======
						                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Email">
>>>>>>> 0e64ca66cbfa1f16960ee5b45c9aff13a73577a0
						                </div>
						            </div>
						            <div class="form-group col-md-12 col-sm-12">
						                <label for="txtA_Title" class="col-sm-2 control-label">
						                    Điện thoại
						                    <span class="d_asterisk">*</span>                                
						                </label>
						                <div class="col-sm-10">
<<<<<<< HEAD
						                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
=======
						                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Điện thoại">
>>>>>>> 0e64ca66cbfa1f16960ee5b45c9aff13a73577a0
						                </div>
						            </div>
						            <div class="form-group col-md-12 col-sm-12">
						                <label for="txtA_Title" class="col-sm-2 control-label">
						                    Nội dung
						                    <span class="d_asterisk">*</span>                                
						                </label>
						                <div class="col-sm-10">
						                    <textarea id="comment-input" class="comment-input animated" placeholder="Ý kiến của bạn?" style=""></textarea>
						                </div>
						            </div>
						             <div class="form-group col-md-12 col-sm-12">
							            <div class="col-sm-12 text-right">
							            	<a class="btn btn-primary" style="color: #fff;border: none!important;"  href="">
									            <i class="glyphicon glyphicon-circle-arrow-right"></i>
									            Gửi bình luận
									        </a>
							            </div>
						        	</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default no-background">
					<div class="block-right">
						<div class="panel-heading">
							<h3>Bản đồ</h3>
						</div>
						<div class="panel-body">
						   <div id="map">
						   </div>
						</div>
					</div>
				</div>
				<div class="d_divide10"></div>
				<div class="panel panel-default">
					<div class="block-right">
						<div class="panel-heading">
							<h3>Xem nhiều</h3>
						</div>
						<div class="panel-body padding10">
							<ul>
								<?php 
								$collections = $db->post;
								$p_xemnhieu = $collections->find()->sort(array('view'=>1))->limit(5);
								foreach ($p_xemnhieu as $p) {
								?>
								<li><a href="post.php?p=<?php echo $p['alias'];?>"><?php echo $p['title'];?></a></li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="d_divide10"></div>
		</div>
	</section>
	<footer class="row no-margin footer">
		<div class="container margin_top45">
			<h4 class="copyright">@Copyright dulichmekong</h4>
		</div>
	</footer>
</div>
<script>

      function initMap() {
      	

      	
        var uluru = {lat: <?php echo $la; ?>, lng: <?php echo $ln; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
<<<<<<< HEAD
          url:'<?php echo $post['urlmap']?>'
=======
          url:'<?php echo $post['urlmap'];?>'
>>>>>>> 0e64ca66cbfa1f16960ee5b45c9aff13a73577a0
        });
        var infowindow = new google.maps.InfoWindow({
		    content: "Some text"
		});

        marker.addListener('click', function() {
        	 window.open(this.url, '_blank');
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxD0sIt-IW_Baqv2GF9PmDWdkwUWlwuaw&callback=initMap">
    </script>
</body>
</html>
<!-- https://www.google.com/maps/place/Allmed+Can+Tho/@10.039814,105.747644,17z/data=!4m13!1m7!3m6!1s0x31a0886ed14f790d:0xd7b97b7f60bb0628!2zVW5uYW1lZCBSb2FkLCBBbiBLaMOhbmgsIE5pbmggS2nhu4F1LCBD4bqnbiBUaMah!3b1!8m2!3d10.039814!4d105.7498327!3m4!1s0x31a0886bc4312731:0x880c1d488ade154e!8m2!3d10.0391951!4d105.7499964?hl=vi -->