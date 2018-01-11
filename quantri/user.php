<?php include("header.php");?>
<?php
	$collections = $db->user;
	$dsuser = $collections->find();
	$countUser = 0;
	foreach ($dsuser as $user) {
		$countUser++;
	}
?>
<script type="text/javascript">

var n_cb = 0;

	$(function () {
		$('#txtUsername').val('');
		$('#txtPwd').val('');
		$('#txtfullname').val('');
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
		var username = $('#txtUsername');
		var pwd = $('#txtPwd');
		var name = $('#txtfullname');
        var hasError = validateEmptyValue(new Array(username));
		if(!hasError){
        	var data = {
				username: username.val(),
	            pwd: pwd.val(),
	            name: name.val()
	        };
            $.ajax({
                url:'user_xuly_them.php',
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


	function openEditForm(id_user){
		var data = {
            id: id_user
        };
        $.ajax({
            url:'user_xuly_loadedit.php',
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
	function saveEdit1(){
		var username = $('#txtUsername1');
		var pwd = $('#txtPwd1');
		var fullname = $('#txtfullname1');
		var id = $('#txtID');
		var hasError = validateEmptyValue(new Array(username));
		if(!hasError){
			var data = {
				id: id.val(),
	            username: username.val(),
	            pwd: pwd.val(),
	            fullname:fullname.val()
	        };

	        $.ajax({
                url:'user_xuly_edit.php',
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

	function deleteUser(ID){
		var confirmText = '';
		if (ID == null) {
			if(n_cb==0){
				swal("Thông báo", 'Vui lòng chọn một đối tượng từ danh sách', "warning");
				return;
			}else{
				confirmText = 'Bạn có chắc chắn muốn xóa được chọn không?';
			}
		}else{
			confirmText = 'Bạn có chắc chắn muốn xóa này không?';
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
	                url:'user_xuly_delete.php',
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
            Quản lý Người dùng
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
         <a class="my-btn-primary" style="color: #fff" href="#addModal" role="button" data-toggle="modal">
            <i class="glyphicon glyphicon-plus"></i>
            Thêm mới
        </a>
        <a href="#" class="my-btn-danger" style="color: #fff" onclick="deleteUser()">
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
		                    <input name="cbAll" id="cbAll" value="" onclick="checkAll('');" type="checkbox">
		                </th>
		                <th width="26%">
		                    <a href="#" id="C_Title" onclick="">Họ tên</a>
		                </th>
		                <th width="15%">UserName</th>
		                <th width="12%">Password</th>  
		                <th align="center" width="3%">Sửa</th>
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 1;?>
					<?php foreach($dsuser as $user){?>
					<tr>
						<td class="text-center"><?php echo $stt; ?></td>
						<td>
		                    <input id="cb<?php echo $stt; ?>" name="cb[]" value="<?php echo $user['username']?>" onclick="isChecked(this.checked);" type="checkbox">
		                </td>
		                
		                <td style="color: #337ab7;">
		                	<a href="#" onclick="openEditForm('<?php echo $user['username']?>');"><?php echo $user['name']?></a>
		                </td>
		                <td><?php echo $user['username']?></td>
		                <td><?php echo $user['pwd']?></td>
		                <td align="center"> 
		                	<a href="#" class="" onclick="openEditForm('<?php echo $user['_id']?>');">
		                        <i class="glyphicon glyphicon-edit"></i>
		                    </a>
		                </td>
		                <td align="center"> 
		                	<a href="#" style="color: #c12e2a;" onclick="deleteUser('<?php echo $user['username']?>')">
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
                <h4 class="modal-title">Thêm mới user</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="phpForm" id="phpForm">
                	<div class="form-group"> 
	                    <label for="txtUsername" class="col-sm-3 control-label">
	                        Tên đăng nhập
	                        <span class="d_asterisk">*</span>                                
	                    </label>
	                    <div class="col-sm-9">
	                        <input type="text" class="form-control" title="" id="txtUsername" name="txtUsername" placeholder="Tên đăng nhập">
	                    </div>                     
	                </div>
	                <div class="form-group">
	                    <label for="txtPwd" class="col-sm-3 control-label">
	                        Mật khẩu
	                    </label>
	                    <div class="col-sm-9">  
	                          <input type="password" class="form-control" title="" id="txtPwd" name="txtPwd" placeholder="Mật khẩu">
	                    </div>
	                </div>
	                <div class="form-group"> 
	                    <label for="txtfullname" class="col-sm-3 control-label">
	                        Họ tên
	                        <span class="d_asterisk">*</span>                                
	                    </label>
	                    <div class="col-sm-9">
	                        <input type="text" class="form-control" title="" id="txtfullname" name="txtfullname" placeholder="Họ tên">
	                    </div>                     
	                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="save();">Lưu</button>
            </div>
		</form>
        </div>
    </div>
</div>
<div id="editModal" class="modal fade">
    
</div>
<?php include("footer.php");?>