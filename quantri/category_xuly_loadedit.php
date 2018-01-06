<?php
include("../config/config.php");
if (isset($_POST['hdTitle'])) {
	$name = $_POST['hdTitle'];
	$html = '';
	$cat = "";
	$collection = $db->category;
	$cat = $collection->findOne(array('catname' => $name));

	$html = $html.'<div class="modal-dialog">' 
				 	.'<div class="modal-content">'
						.'<div class="modal-header">'
						.'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
						.'<h4 class="modal-title">Chỉnh sửa chủ đề</h4>'
						.'</div>'
						.'<div class="modal-body">'
						.'<form class="form-horizontal" name="phpForm" id="phpForm">'	
						.'<div class="form-group">' 
						.'<label for="txtE_Title" class="col-sm-2 control-label">Tên<span class="d_asterisk">*</span></label>'
						.'<div class="col-sm-10">'
						.'<input type="hidden" title="" id="txtE_Title1" name="txtE_Title1" value="'.$cat["catname"].'">' 
						.'<input type="text" class="form-control" title="" id="txtE_Title" name="txtE_Title" placeholder="Tên" value="'.$cat["catname"].'">'   
						.'</div></div>'                     
				
						.'<div class="form-group">'	
						.'<label for="txtA_Description" class="col-sm-2 control-label">Mô tả </label>'		
									
						.'<div class="col-sm-10">'
						.'<textarea class="form-control" id="txtE_Description" name="txtE_Description">'.$cat["des"].'</textarea> '
						.'</div></div></form></div>'
						.'<div class="modal-footer">'
						.'<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>'
						.'<button type="button" class="btn btn-primary" onclick="saveEdit();">Lưu</button>'
						.'</div>';

	$html = $html.'</div></div>';
	echo $html;
}