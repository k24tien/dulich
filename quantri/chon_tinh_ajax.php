<?php
include("../config/config.php");
if(isset($_POST['hdTinh'])){
	$tinh = $_POST['hdTinh'];
	$huyen = $arrQuanHuyen[$tinh];
	$out = '<option value="">-- Quận huyện --</option>';
	foreach ($huyen as $key => $value) {
		$out = $out.'<option value="'.$value.'">'.$value.'</option>';	
	}
	echo $out;
}