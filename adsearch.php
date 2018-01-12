<?php 
	include('config/config.php');
	$title = $_POST['txtS_Title'];
	$category = $_POST['sls_Category'];
	$tinh = $_POST['sls_Tinh'];

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
            	$collections = $db->post;
				$title_search = new MongoRegex('/'.$title.'/i');
				$category_search = new MongoRegex('/'.$category.'/i');
				$tinh_search = new MongoRegex('/'.$tinh.'/i');
                $posts = $collections->find(array('title'=>$title_search, 'category'=>$category_search,'tinh'=>$tinh_search));
				foreach ($posts as $post) {
				?>
				<div class="col-md-3 post">
					<div class="thumbnail">
						<a href="post.php?id=<?php echo $post['_id']?>">
						<img style="min-height: 210px !important;" src="data:png;base64,<?php echo base64_encode($post['post_image']->bin);?>" alt="ben ninh kieu">
						</a>
						<div class="caption">
							<a href="post.php?id=<?php echo $post['_id']?>"><h3><?php echo $post['title']?></h3></a>
						</div>
					</div>
				</div>
				<?php }?>
				
			</div>
			
		</div>
	</section>
	<?php include('footer.php');?>
</body>
</html>