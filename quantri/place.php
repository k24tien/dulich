<?php include("header.php");?>
<?php
	$collections = $db->nhom4_place;
	$places = $collections->find();
	$countCates = 0;
	foreach ($places as $cate) {
		$countCates++;
	}
	foreach ($places as $key => $value) {
        $ncate = $value;
    }

?>
<script type="text/javascript">
	var n_cb = 0;
	var arrayTags = new Array();
	var quanhuyens = <?php echo json_encode($ncate['huyen']); ?>;
	//console.log(quanhuyens);
	var arrayQuanhuyens = new Array();
    arrayQuanhuyens = JSON.parse(quanhuyens);
	$(function () {
		$('#txtA_Title').val('');
		$('#txtA_Description').val('');
	});
	function removeTag(key) {
        // div contain key, name and value of property
        var keySpan = $(key).parent();
        // gỡ bỏ từ danh sách hiển thị
        keySpan.remove();
        // key and value
        var keyValue = keySpan.attr('id');
        // position of property to remove
        var index = arrayTags.indexOf(keyValue);
        // if exitst property in array then remove
        if (index > -1) {
            arrayTags.splice(index, 1);
        }
    }
    function addTags(){
        var nameTag = $("#txtA_Tag").val();
        if($.inArray(nameTag, arrayTags) == -1){
            arrayTags.push(nameTag);
            var key =  $('<div style="margin-left:5px; margin-bottom:5px" class="pull-left btn btn-xs btn-warning" id="' + nameTag + '">' + nameTag + '<i style="cursor: pointer;margin-left:5px" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i></div>');
            key.appendTo('#tagList');
        }
        console.log(nameTag);
    }
    function editQuan(){
        var nameTag = $("#txtA_Quanhuyen").val();
        if($.inArray(nameTag, arrayQuanhuyens) == -1){
            arrayQuanhuyens.push(nameTag);
            var key =  $('<div style="margin-left:5px; margin-bottom:5px" class="pull-left btn btn-xs btn-warning" id="' + nameTag + '">' + nameTag + '<i style="cursor: pointer;margin-left:5px" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i></div>');
            key.appendTo('#quanhuyenList');
        }
        //console.log(nameTag);
        //console.log(arrayQuanhuyens);
    }
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
		var tinh = $('#txtA_Tinh');
		//var huyen = $('#pTag');
		var tagList = JSON.stringify(arrayTags);
        $('#pTag').val(tagList);
        var huyen = $('#pTag');
		var hasError = validateEmptyValue(new Array(tinh));
		if(!hasError){
        	var data = {
        		hdC_Tinh: tinh.val(),
                hdC_Huyen: huyen.val()
            };
            $.ajax({
                url:'place_xuly_them.php',
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

	function deletePlace(ID){
		var confirmText = '';
		if (ID == null) {
			if(n_cb==0){
				swal("Thông báo", 'Vui lòng chọn một đối tượng từ danh sách', "warning");
				return;
			}else{
				confirmText = 'Bạn có chắc chắn muốn xóa địa điểm này không?';
			}
		}else{
			confirmText = 'Bạn có chắc chắn muốn xóa những địa điểm này không?';
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
	                url:'place_xuly_delete.php',
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

	function openEditForm(id){
		var data = {
            idPlace: id
        };
        $.ajax({
            url:'place_xuly_loadedit.php',
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
		var idTinh = $('#txtE_Id');
		
		var tinh = $('#txtE_Tinh');
		//console.log(arrayQuanhuyens);
		var qhList = JSON.stringify(arrayQuanhuyens);
		console.log(qhList);
        $('#quanhuyenList').val(qhList);
        var huyen = $('#quanhuyenList');
		var hasError = validateEmptyValue(new Array(tinh));
		if(!hasError){
			var data = {
				id_Tinh: idTinh.val(),
	            n_tinh: tinh.val(),
	            n_huyen: huyen.val()
	        };

	        $.ajax({
                url:'place_xuly_edit.php',
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
            Quản lý Địa điểm
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
		                <th width="15%">
		                    <a href="#" id="C_Title" onclick="">Tỉnh TP</a>
		                </th>
		                <th width="40%">
		                    Quận Huyện
		                </th>  
		                <th align="center" width="3%">Sửa</th>
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 1;?>
					<?php foreach($places as $cate){?>
					<tr>
						<td class="text-center"><?php echo $stt; ?></td>
						<td>
		                    <input id="cb<?php echo $stt; ?>" name="cb[]" value="<?php echo $cate['_id']?>" onclick="isChecked(this.checked);" type="checkbox">
		                </td>
		                
		                <td style="color: #337ab7;">
		                	<a href="#" onclick="openEditForm('<?php echo $cate['tinh']?>');"><?php echo $cate['tinh']?></a>
		                </td>
		                <td>
		               		<?php echo implode(", ",$cate['huyen']);?>
		                </td>
		                
		                <td align="center"> 
		                	<a href="#" class="" onclick="openEditForm('<?php echo $cate['_id']?>');">
		                        <i class="glyphicon glyphicon-edit"></i>
		                    </a>
		                </td>
		                <td align="center"> 
		                	<a href="#" style="color: #c12e2a;" onclick="deletePlace('<?php echo $cate['_id']?>')">
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
                <h4 class="modal-title">Thêm mới Địa điểm</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="phpForm" id="phpForm">
                	<div class="form-group"> 
	                    <label for="txtA_Tinh" class="col-sm-2 control-label">
	                        Tỉnh thành phố
	                        <span class="d_asterisk">*</span>                                
	                    </label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" title="" id="txtA_Tinh" name="txtA_Tinh" placeholder="Tên">
	                    </div>                     
	                </div>
	                <div class="form-group col-md-12 col-sm-12">
		                <label for="txtA_Tag" class="col-sm-2 control-label">
		                    Quận huyện                 
		                </label>
		                <div class="col-sm-10">
		                    <div class="inside">
		                        <input type="text" name="txtA_Tag" value="" id="txtA_Tag" placeholder="Từ khóa" class="input-tag">
		                        <a class="my-btn-primary" style="color: #fff" href="#" onclick="addTags();">
		                            <i class="glyphicon glyphicon-plus"></i>
		                            Thêm
		                        </a>
		                        
		                        <div class="tagList" id="tagList">
		                            
		                        </div>
		                        <input type="hidden" name="pTag" id="pTag" value="">
		                    </div>
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