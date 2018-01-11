<?php
include("../config/config.php");
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$html = '';
	$users = "";
    $collection = $db->user;
	$users = $collection->findOne(array('_id' => new MongoId($id)));
	
	$html = $html.'<div class="modal-dialog">' 
				 	.'<div class="modal-content">'
						.'<div class="modal-header">'
						.'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
						.'<h4 class="modal-title">Chỉnh sửa người dùng</h4>'
						.'</div>'
						.'<div class="modal-body">'
						.'<form class="form-horizontal" name="phpForm" id="phpForm">'	
						.'<div class="form-group">' 
						.'<label for="txtUsername" class="col-sm-3 control-label">UserName<span class="d_asterisk">*</span></label>'
						.'<div class="col-sm-9">'
						.'<input type="hidden" title="" id="txtID" name="txtID" value="'.$users["_id"].'">' 
						.'<input type="text" class="form-control" title="" id="txtUsername1" name="txtUsername1" placeholder="User Name" value="'.$users["username"].'">'   
						.'</div></div>'                     
				
						.'<div class="form-group">'	
						.'<label for="txtPwd" class="col-sm-3 control-label">Password</label>'		
						.'<div class="col-sm-9">'
						.'<input type="password" class="form-control" title="" id="txtPwd1" name="txtPwd1" placeholder="Password" value="'.$users["pwd"].'">'

						.'</div></div>'

						.'<div class="form-group">'	
						.'<label for="Fullname1" class="col-sm-3 control-label">Fullname</label>'		
									
						.'<div class="col-sm-9">'
						.'<input type="text" class="form-control" title="" id="txtfullname1" name="txtfullname1" placeholder="Fullname" value="'.$users["name"].'">'

						.'</div></div>
						 </div>'
						.'<div class="modal-footer">'
						.'<button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>'
						.'<button type="button" class="btn btn-primary" onclick="saveEdit1();">Lưu</button>'
						.'</div></form>';

	$html = $html.'</div></div>';
	echo $html;
}