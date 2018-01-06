<?php include("header.php");?>
<?php
	$collections = $db->post;
	$posts = $collections->find();
	$countPost = 0;
	foreach ($posts as $post) {
		$countPost++;
	}
?>
<script>
	var n_cb = 0;
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
	function deletePost(ID) {
		var confirmText = '';
		if (ID == null) {
			if(n_cb==0){
				swal("Thông báo", 'Vui lòng chọn một đối tượng từ danh sách', "warning");
				return;
			}else{
				confirmText = 'Bạn có chắc chắn muốn xóa những nhóm bài viết được chọn không?';
			}
		}else{
			confirmText = 'Bạn có chắc chắn muốn xóa nhóm bài viết này không?';
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
	                url:'post_xuly_delete.php',
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
            Quản lý bài viết
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
        <a class="my-btn-primary" style="color: #fff" href="addNewPost.php">
            <i class="glyphicon glyphicon-plus"></i>
            Thêm mới
        </a>
        <a href="#" class="my-btn-danger" style="color: #fff" onclick="deletePost()">
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
						<th width="1%">
		                    <input name="cbAll" id="cbAll" value="" onclick="checkAll(<?php echo $countPost;?>)" type="checkbox">
		                </th>
		                <th width="3%" align="center">Ảnh</th>
		                <th width="26%">
		                    <a href="#" id="C_Title" onclick="">Tên</a>
		                </th>
		                <th width="15%">
		                    Chủ đề
		                </th>
		                <th width="12%">
		                    Mô tả
		                </th>  
		                <th width="6%">
		                    Lượt xem
		                </th>  
		                <th width="5%">
		                    Lượt like
		                </th>  
		                <th align="center" width="3%">Sửa</th>
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 1;?>
					<?php foreach($posts as $post){?>
					<tr>
						<td class="text-center"><?php echo $stt; ?></td>
						<td>
		                    <input id="cb<?php echo $stt;?>" name="cb[]" value="<?php echo $post['title']; ?>" onclick="isChecked(this.checked);" type="checkbox">
		                </td>
		                <td>
		                    <img src="data:png;base64,<?php echo base64_encode($post['post_image']->bin);?>" style="width: 30px; height: 30px" title="Ảnh sai đường dẫn"/>
		                </td>
		                <td style="color: #337ab7;">
		                	<a href=""><?php echo $post['title']?></a>
		                </td>
		                <td>
		                	<?php echo $post['category']?>
		                </td>
		                <td>
		               		<?php echo $post['des']?>
		                </td>
		                <td>
		                	<?php echo $post['view']?>
		                </td>
		                <td>
		               		<?php echo $post['like']?>
		                </td>
		                <td align="center"> 
		                	<a href="post_edit.php?tt=<?php echo  $post['alias']?>">
		                        <i class="glyphicon glyphicon-edit"></i>
		                    </a>
		                </td>
		                <td align="center"> 
		                	<a href="#" style="color: #c12e2a;" onclick="deletePost('<?php echo $post['title'];?>')">
		                        <i class="glyphicon glyphicon-trash"></i>
		                    </a>
		                </td>
					</tr>
					<?php $stt++;?>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>
<?php include("footer.php");?>
