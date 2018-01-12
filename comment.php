<div class="col-md-12  padding15 comment" style="background: #f7f7f7;border-radius: 2px;">
	<?php if($post['comments']!=""){

		?>
	<h4><strong>Bình luận</strong></h4>
	<div class="media">
		<div class="media-body">
			<?php foreach($post['comments'] as $comment){ 
					if($comment['duyet']==1){
				?>
			<div class="media-content">
				<h6> <span class="comment-author"><i class="glyphicon glyphicon-user"></i><strong><?php echo $comment['comment_name'];?> </strong></span>
				<span class="comment-date"><i class="glyphicon glyphicon-calendar"></i><?php echo date('d/m/Y', $comment['comment_date']->sec); ?></span></h6>
				<p>
					<?php echo $comment['comment_content'];?>
				</p>
			</div>
			<?php } //end if?>
			<?php } //end foreach ?>
			
		</div>
	</div>
	<?php } //end if post["comment"] ?>
	<h4><strong>Gửi ý kiến bình luận</strong></h4>
	<form class="form-horizontal" name="phpForm" action="" id="phpForm">
		<div class="form-group col-md-12 col-sm-12">
            <label for="txtA_Title">
                Tên
                <span class="d_asterisk">*</span>                                
            </label>
            <div>
                <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <label for="txtA_Title">
                Email
                <span class="d_asterisk">*</span>                                
            </label>
            <div>
                <input type="text" class="form-control" title="" id="txtA_Email" name="txtA_Title" placeholder="Email">
            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <label for="txtA_Title">
                Nội dung
                <span class="d_asterisk">*</span>                                
            </label>
            <div>
                <textarea id="txtA_Content" class="comment-input animated" placeholder="Ý kiến của bạn?" style="width:100%;" rows="5"></textarea>
            </div>
        </div>
        <input type="hidden" class="form-control" id="txtA_postid" name="txtA_postId" value="<?php echo $_GET["id"]; ?>">
         <div class="form-group col-md-12 col-sm-12">
            <div class="text-left">
            	<button type="button" class="btn btn-primary" onclick="save();">Gửi bình luận</button>
            </div>
    	</div>
	</form>
</div>
<div class="col-md-12  padding15">							
	<div id="message">
		

	</div>
</div>	
								
								<script type="text/javascript">

									function save(){

										var post_id = $('#txtA_postid');
										var comment_title = $('#txtA_Title');
										var comment_email = $('#txtA_Email');
										var comment_content = $('#txtA_Content');
										var hasError = validateEmptyValue(new Array(comment_title,comment_email,comment_content));
										if(!hasError){
								        	var data = {
								        		post_id: post_id.val(),
								        		cm_Title: comment_title.val(),
								                cm_Email: comment_email.val(),
								                cm_Content: comment_content.val()
								            };
								            $.ajax({
								                url:'addcomment.php',
								                type:'POST',
								                data:data,
								                success:function(data){
								                    console.log(data);
								                    
								                    if ($.trim(data) == 'OK') {
								                    	$('#message').empty();
								                    	$('#txtA_Title').val("");
								                    	$('#txtA_Email').val("");
								                    	$('#txtA_Content').val("");

								                        $('#message').append("<div class='alert alert-success' >Gửi bình luận thành công! <strong>Xin lưu ý: </strong>Chúng tôi sẽ xét duyệt bình luận trước khi đăng!</div>");
								                        
								                        
								                    } else {
								                        $('#message').append("<div class='alert alert-danger' >Có lỗi xảy ra! <strong>Vui lòng thử lại </strong></div>");
								                        window.location.reload();
								                    } 

								                },
								                error: function (data) {
								                    console.log(data);
								                }
								            });
								        }
									}
								</script>
							