<?php include("header.php");?>
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
        <a href="#" class="my-btn-danger" style="color: #fff" onclick="deleteDiadiem()">
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
		                    <input name="cbAll" id="cbAll" value="" onclick="checkAll('<?php //echo $countDiadiems;?>');" type="checkbox">
		                </th>
		                <th width="26%">
		                    Tỉnh/Thành phố
		                </th>
		                <th width="12%">
		                    Quận huyện
		                </th>  
		                <th align="center" width="3%">Sửa</th>
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					
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
	                    <label for="txtTinh" class="col-sm-2 control-label">
	                        Tỉnh/TP
	                        <span class="d_asterisk">*</span>                                
	                    </label>
	                    <div class="col-sm-10">
	                        <select  class="form-control" name="slTinh" id="slTinh">
	                            <option value="">-- Chọn Tỉnh/TP --</option>
	                        </select>
	                    </div>                     
	                </div>
	                <div class="form-group">
	                    <label for="txtA_Description" class="col-sm-2 control-label">
	                        Quận huyện
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
<?php include("footer.php");?>