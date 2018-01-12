<?php
include("../config/config.php");
if (isset($_POST['idPlace'])) {
	$id = $_POST['idPlace'];
	$html = '';
	$query = "";
	$collection = $db->nhom4_place;
	$res = $collection->findOne(array('_id' => new MongoId($id)));
	
	$html = $html.'<div class="modal-dialog">' 
				 	.'<div class="modal-content">'
						.'<div class="modal-header">'
						.'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
						.'<h4 class="modal-title">Chỉnh sửa Địa điểm</h4>'
						.'</div>'
						.'<div class="modal-body">'
						.'<form class="form-horizontal" name="phpForm" id="phpForm">'	
						.'<div class="form-group">' 
						.'<label for="txtE_Title" class="col-sm-2 control-label">Tên<span class="d_asterisk">*</span></label>'
						.'<div class="col-sm-10">'
						.'<input type="hidden" title="" id="txtE_Id" name="txtE_Id" value="'.$res["_id"].'">' 
						.'<input type="text" class="form-control" title="" id="txtE_Tinh" name="txtE_Tinh" placeholder="Tỉnh TP" value="'.$res["tinh"].'">'   
						.'</div></div>'                     
				
						.'<div class="form-group">'	
						.'<label for="txtA_Description" class="col-sm-2 control-label">Quận huyện </label>'		
									
						.'<div class="col-sm-10">'
						.'<input type="text" name="txtA_Quanhuyen" value="" id="txtA_Quanhuyen" placeholder="Từ khóa" class="input-tag">'
                        .'<a class="my-btn-primary" style="color: #fff" href="#" onclick="editQuan();">
                            <i class="glyphicon glyphicon-plus"></i>
                            Thêm
                        </a>'
						.'<div class="tagList" id="quanhuyenList">';
					foreach ($res['huyen'] as $huyen) {
						$html = $html.
						'<div style="margin-left:5px; margin-bottom:5px" class="pull-left btn btn-xs btn-warning" id="'.$huyen.'">'.$huyen.'<i style="cursor: pointer;margin-left:5px" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i></div>';
                     }
    $html = $html.'</div>
    					<input type="hidden" name="pTag" id="pTag" value="">'
    					.'</div></div></form></div>'
						.'<div class="modal-footer">'
						.'<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>'
						.'<button type="button" class="btn btn-primary" onclick="saveEdit();">Lưu</button>'
						.'</div>';

	$html = $html.'</div></div>';
	echo $html;
}