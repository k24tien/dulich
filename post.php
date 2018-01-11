<?php include('config/config.php');
$post = null;
$la = 0;
$ln = 0;

if(isset($_GET["id"])){
	$id = $_GET["id"];
	$collections = $db->post;

	$query = array('_id' => new MongoId($id));
	$post = $collections->findOne($query);
	$view = $post['view']+1;
	$collections->update(
		array("_id" => new MongoId($post['_id'])),
		array('$set' => array("view" => $view))

	);
	/*foreach ($posts as $key => $value) {
		$post = $value;
	}*/
}
if($post!=null && $post['urlmap']!=""){
	$url = strstr($post['urlmap'],'@');
	$la = substr($url, 1,strpos($url, ',' )-1);
	$url1 = str_replace('@'.$la.',' , "", $url);
	$ln = substr($url1, 0,strpos($url1, ',' )-1);
}
?>

<?php include 'header.php'; ?>
<?php include 'featured.php'; ?>
	
    <div class="d_divide5"></div>
	<section class="row no-margin">
		<div class="col-md-9">
			<div class="panel panel-default no-background">
				<div class="block-center">
					<?php include 'breadcrumb.php'; ?>
					<div class="panel-body">
						<div class="row no-margin">
							<div class="col-md-12  padding15">
								<h3 class="title-post"><?php echo $post['title']?></h3>
								<div class="top-article">
									

									<ul class="meta-post">
									<li><i class="glyphicon glyphicon-calendar"></i><a href="#"> <?php echo date('d/m/Y', $post['created_date']->sec); ?></a></li>
									<li><i class="glyphicon glyphicon-user"></i><a href="#"><?php echo $post['author']; ?> </a></li>
									<li><i class="glyphicon glyphicon-folder-open"></i><a href="#"><?php echo $post['category'];?></a></li>
									<li><i class="glyphicon glyphicon-comment"></i><a href="#">
										<?php
											$count = 0;
											if($post['comments']!=""){
												foreach($post['comments'] as $cm){
													if($cm['duyet']==1)
														$count = $count + 1;
												}
											}
											echo $count." bình luận";

										?>


									</a></li>
									<!--<li><i class="fa fa-tags"></i><a href="#">Design</a>, <a href="#">Blog</a></li> -->
								</ul>
							</div>

							<p style="width: 100% ! important;"><strong><?php echo $post['des'];?></strong></p>
							<div class="pimage">
								<img style="min-height: 210px !important;" src="data:png;base64,<?php echo base64_encode($post['post_image']->bin);?> " >
							</div>
							<div class="post-content">
								<p style="width: 100% ! important;"><?php echo $post['content']; ?></p>
							</div>
							
							<!--<div class="col-md-12  padding15">
								<button class="my_btn" type="button" id="btnAccount" onclick="shoFormLogin()" style="background-color: #1b95e0;font-size: 15px; padding: 0px 10px; margin-bottom: 5px;">
                                        <i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i>
                                        <span style="font-size: 12px;">Thích <?php //if($post['like']>0) echo $post['like'];?></span>
                                    </button>
							</div>-->
							<div class="bottom-article">
									<span><i class="glyphicon glyphicon-tags"></i> Từ khóa: 
										<?php
										$tags = $post['tags'];
										$count = count($tags);
										$i = 1; 
										foreach($tags as $tag){
											echo "<a href='tag.php?tag=".$tag."'>".$tag. "</a>";
											if($i < $count)
												echo " , ";
											$i++;
										}

										?>
									</span>
							</div>
						</div>	

							<?php include 'comment.php'; ?>

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
<?php include 'footer.php';?>	
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
          url:'<?php echo $post['urlmap'];?>'
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