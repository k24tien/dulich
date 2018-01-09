<?php include("header.php");?>
<?php
	$collections = $db->post;
	$cursor = $collections->find();
	$count = 0;
	
?>
<script type="text/javascript">
	var n_cb = 0;
	$(function () {
		$('#txtA_Title').val('');
		$('#txtA_Description').val('');
	});
	function checkAll(n){
		var checked = cbAll.checked;
		var n2 = 0;
		for (var i = 1; i <= n; i++) {
			cb = eval("cb"+i);
	        if (cb) {
	            cb.checked = checked;
	            n2++;
	        }
		}
		if(checked){
			n_cb = n2;
		}else{
			n_cb = 0;
		}
	}
	function isChecked(checked){
		if(checked){
			n_cb++;
		}else{
			n_cb--;
		}
	}

	function save(){
		var cat_title = $('#txtA_Title');
		var cat_des = $('#txtA_Description');
		var hasError = validateEmptyValue(new Array(cat_title));
		if(!hasError){
        	var data = {
        		hdC_Title: cat_title.val(),
                hdC_Des: cat_des.val()
            };
            $.ajax({
                url:'category_xuly_them.php',
                type:'POST',
                data:data,
                success:function(data){
                    console.log(data);
                    if ($.trim(data) == 'OK') {
                        window.location.reload();
                    } else {
                        swal("Lỗi", data, "error");
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
	}

	function deleteComment(ID){
		var confirmText = '';
		if (ID == null) {
			if(n_cb==0){
				swal("Thông báo", 'Vui lòng chọn một đối tượng từ danh sách', "warning");
				return;
			}else{
				confirmText = 'Bạn có chắc chắn muốn xóa những bình luận được chọn không?';
			}
		}else{
			confirmText = 'Bạn có chắc chắn muốn xóa các bình luận này không?';
		}
		swal({
            title: confirmText,
            text: 'Vui lòng nhấn OK để xoá',
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function (isConfirm) {
            if (isConfirm) {
                var arrayID = new Array();
                if (ID == null) {
                	
                    $('input[name="cb[]"]:checked').each(function () {
                        var value = $(this).val();
                        arrayID.push(value);
                    });
                    
                } else {
                    arrayID.push(ID);
                }
                
                var data_save = {
                    hdArrayID: arrayID
                };
                $.ajax({
	                url:'comment_delete.php',
	                type:'POST',
	                data:data_save,
	                success:function(data){
	                    console.log(data);
	                    if ($.trim(data) == 'OK') {
	                    	swal({
		                        title: "Thao tác thành công!",
		                        timer: 500,
		                        type: 'success'
		                    });
	                        window.location.reload();
	                    } else {
	                        swal("Lỗi", data, "error");
	                    }
	                },
	                error: function (data) {
	                    console.log(data);
	                }
	            });
            }
        });
	}

	function duyetComment(ID){
		var confirmText = '';
		if (ID == null) {
			if(n_cb==0){
				swal("Thông báo", 'Vui lòng chọn một đối tượng từ danh sách', "warning");
				return;
			}else{
				confirmText = 'Bạn có chắc chắn muốn đăng những bình luận được chọn không?';
			}
		}else{
			confirmText = 'Bạn có chắc chắn muốn đăng các bình luận này không?';
		}
		swal({
            title: confirmText,
            text: 'Vui lòng nhấn OK để chấp nhận',
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function (isConfirm) {
            if (isConfirm) {
                var arrayID = new Array();
                if (ID == null) {
                	
                    $('input[name="cb[]"]:checked').each(function () {
                        var value = $(this).val();
                        arrayID.push(value);
                    });
                    
                } else {
                    arrayID.push(ID);
                }
                
                var data_save = {
                    hdArrayID: arrayID
                };
                $.ajax({
	                url:'comment_duyet.php',
	                type:'POST',
	                data:data_save,
	                success:function(data){
	                    console.log(data);
	                    if ($.trim(data) == 'OK') {
	                    	swal({
		                        title: "Thao tác thành công!",
		                        timer: 500,
		                        type: 'success'
		                    });
	                        window.location.reload();
	                    } else {
	                        swal("Lỗi", data, "error");
	                    }
	                },
	                error: function (data) {
	                    console.log(data);
	                }
	            });
            }
        });
	}
	

</script>
<div class="d_divide20"></div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">
	<div class="col-sm-6">      
        <div class="icon_40 icon_category pull-left" style="margin-right: 10px"></div>  
        <h4 class="text-left bold pull-left">            
            Quản lý bình luận
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
        <a class="my-btn-primary" style="color: #fff" href="#" onclick="duyetComment()">
            <i class="glyphicon glyphicon-check"></i>
            Duyệt
        </a>
        <a href="#" class="my-btn-danger" style="color: #fff" onclick="deleteComment()">
            <i class="glyphicon glyphicon-remove"></i>
            Xóa
        </a>
    </div>
</div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">	
	<div class="col-sm-12" style="padding: 0px;">
		<div class="table-responsive">
			<table class="table table-hover my-table" cellspacing="1" >
				<thead>
					<tr>
						<th width="1%"> # </th>
						<?php 
						$$val = 0;
						foreach ($cursor as $document1) {
							$i = 0;
                                	if($document1["comments"]!=""){
                                		$comments1 = $document1["comments"]["array"];
                                		foreach ($comments1 as $comment1) {
                                			$i= $i + 1;
                                		}
                                	}
                                $val = $val + $i;	
                            }
					?>
						<th width="1%">
		                    <input name="cbAll" id="cbAll" value="" onclick="checkAll('<?php echo $val;?>');" type="checkbox">
		                </th>
		                <th width="20%">
		                    <a href="#" id="C_Title" onclick="">Nội dung</a>
		                </th>
		                <th width="10%">
		                    Người gửi
		                </th>
		                <th width="10%">
		                    Email
		                </th>
		                <th width="10%">
		                    Ngày gửi
		                </th>
		                <th width="10%">
		    				Bài viết
		                </th>
		                <th width="10%">
		                    Trạng thái
		                </th>   
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				
				<tbody>
					<?php $stt = 0;?>
					<?php 
						foreach ($cursor as $document) {
                                	if($document["comments"]!=""){
                                		$comments = $document["comments"]["array"];
                                		foreach ($comments as $comment) {
                                			$stt = $stt + 1;
                                		

					?>
					<tr>
						<td class="text-center"><?php echo $stt; ?></td>
						<td>
		                    <input id="cb<?php echo $stt; ?>" name="cb[]" value="<?php echo $comment["comment_id"].'-'.$document["_id"]; ?>" onclick="isChecked(this.checked);" type="checkbox">
		                </td>
		                
		                <td style="color: #337ab7;">
		                	<a href="#"><?php echo $comment["comment_content"]; ?></a>
		                </td>
		                <td>
		               		<?php echo $comment["comment_name"]; ?>
		                </td>
		                <td>
		               		<?php echo $comment["comment_email"]; ?>
		                </td>
		                <td>
		               		<?php echo date('d/m/Y', $comment['comment_date']->sec); 

		               		?>
		                </td>
		                <td>
		               		<?php echo $document["title"]; ?>
		                </td>
		                <td>
		               		<?php if($comment["duyet"]==0)
		               					echo "Chờ duyệt";
		               			  else
		               			  		echo "Đã duyệt";		 

		               			?>
		                </td>
		                <td align="center"> 
		                	<a href="#" style="color: #c12e2a;" onclick="deleteComment('<?php echo $comment["comment_id"];?>')">
		                        <i class="glyphicon glyphicon-trash"></i>
		                    </a>
		                </td>
					</tr>
					<?php } ?>
					<?php } ?>
				<?php } ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>


<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm mới chủ đề</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="phpForm" id="phpForm">
                	<div class="form-group"> 
	                    <label for="txtA_Title" class="col-sm-2 control-label">
	                        Tên
	                        <span class="d_asterisk">*</span>                                
	                    </label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
	                    </div>                     
	                </div>
	                <div class="form-group">
	                    <label for="txtA_Description" class="col-sm-2 control-label">
	                        Mô tả 
	                    </label>
	                    <div class="col-sm-10">  
	                        <textarea class="form-control" id="txtA_Description" name="txtA_Description"></textarea> 
	                    </div>
	                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="save();">Lưu</button>
            </div>

        </div>
    </div>
</div>
<div id="editModal" class="modal fade">
    
</div>
<?php include("footer.php");?>