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
						                    <input type="text" class="form-control" title="" id="txtA_Email" name="txtA_Title" placeholder="Email">
						                </div>
						            </div>
						            <div class="form-group col-md-12 col-sm-12">
						                <label for="txtA_Title" class="col-sm-2 control-label">
						                    Nội dung
						                    <span class="d_asterisk">*</span>                                
						                </label>
						                <div class="col-sm-10">
						                    <textarea id="txtA_Content" class="comment-input animated" placeholder="Ý kiến của bạn?" style=""></textarea>
						                </div>
						            </div>
						            <input type="hidden" class="form-control" id="txtA_postid" name="txtA_postId" value="<?php echo $_GET["id"]; ?>">
						             <div class="form-group col-md-12 col-sm-12">
							            <div class="col-sm-12 text-right">
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
							