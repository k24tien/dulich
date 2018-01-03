<?php include("header.php");?>
<?php
	$collections = $db->category;
	$cates = $collections->find();
	$countCates = 0;
	foreach ($cates as $cat) {
		$countCates++;
	}
	var_dump($countCates);
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

	function deleteCategory(ID){
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
	                url:'category_xuly_delete.php',
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

	function openEditForm(tt){
		var data = {
            hdTitle: tt
        };
        $.ajax({
            url:'category_xuly_loadedit.php',
            type:'POST',
            data:data,
            success:function(data){
                console.log(data);
                $("#editModal").html(data);
                $("#editModal").modal();
            },
            error: function (data) {
                console.log(data);
            }
        });
	}
	function saveEdit(){
		var title = $('#txtE_Title');
		var des = $('#txtE_Description').val();
		var id = $('#txtE_Title1');
		var hasError = validateEmptyValue(new Array(title));
		if(!hasError){
			var data = {
				hdID: id.val(),
	            hdTitle: title.val(),
	            hdDes: des
	        };

	        $.ajax({
                url:'category_xuly_edit.php',
                type:'POST',
                data:data,
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
		
	}

</script>
<div class="d_divide20"></div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">
	<div class="col-sm-6">      
        <div class="icon_40 icon_category pull-left" style="margin-right: 10px"></div>  
        <h4 class="text-left bold pull-left">            
            Quản lý Chủ đề
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
        <a class="my-btn-primary" style="color: #fff" href="#addModal" role="button" data-toggle="modal">
            <i class="glyphicon glyphicon-plus"></i>
            Thêm mới
        </a>
        <a href="#" class="my-btn-danger" style="color: #fff" onclick="deleteCategory()">
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
		                    <input name="cbAll" id="cbAll" value="" onclick="checkAll('<?php echo $countCates;?>');" type="checkbox">
		                </th>
		                <th width="26%">
		                    <a href="#" id="C_Title" onclick="">Tên</a>
		                </th>
		                <th width="12%">
		                    Mô tả
		                </th>  
		                <th align="center" width="3%">Sửa</th>
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 1;?>
					<?php foreach($cates as $cate){?>
					<tr>
						<td class="text-center">1</td>
						<td>
		                    <input id="cb<?php echo $stt; ?>" name="cb[]" value="<?php echo $cate['catname']?>" onclick="isChecked(this.checked);" type="checkbox">
		                </td>
		                
		                <td style="color: #337ab7;">
		                	<a href="#" onclick="openEditForm('<?php echo $cate['catname']?>');"><?php echo $cate['catname']?></a>
		                </td>
		                <td>
		               		<?php echo $cate['des']?>
		                </td>
		                
		                <td align="center"> 
		                	<a href="#" class="" onclick="openEditForm('<?php echo $cate['catname']?>');">
		                        <i class="glyphicon glyphicon-edit"></i>
		                    </a>
		                </td>
		                <td align="center"> 
		                	<a href="#" style="color: #c12e2a;" onclick="deleteCategory('<?php echo $cate['catname']?>')">
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