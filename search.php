<?php include('config/config.php');
if (isset($_POST['txtSearch'])) {
	$txt_search =  $_POST['txtSearch'];
}
?>
<?php include('config/config.php');?>
<?php include 'header.php'; ?>
<?php include 'featured.php'; ?>
   
    <div class="row no-margin">
    	<div class="container">
    		<h2 class="tagline">Kết quả tìm kiếm</h2>
    	</div>
    </div>
	<section class="row no-margin content">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<?php 
            	//$collections = $db->post;
				//$posts = $collections->find(array('title'=> '/.*'.$txt_search'.*/'));
				//foreach ($posts as $post) {
				?>
				<div class="col-md-3 post">
					<div class="thumbnail">
						<a href="post.php?p=<?php //echo $post['alias']?>">
						<img style="min-height: 210px !important;" src="data:png;base64,<?php //echo base64_encode($post['post_image']->bin);?>" alt="ben ninh kieu">
						</a>
						<div class="caption">
							<a href="post.php?p=<?php //cho $post['alias']?>"><h3><?php //echo $post['title']?></h3></a>
						</div>
					</div>
				</div>
				<?php //}?>
				
			</div>
			
		</div>
	</section>
	<?php include 'footer.php';?>
</body>
</html>