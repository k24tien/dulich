<?php
$dbname = 'doan';
$m = new MongoClient();
$db = $m->$dbname;
$arrTinh = array("An Giang","Bạc Liêu","Bến Tre","Cà Mau",'Cần Thơ','Đồng Tháp','Hậu Giang','Hồ Chí Mính','Kiên Giang','Long An','Sóc Trăng','Tiền Giang','Trà Vinh','Vĩnh Long');
$arrQuanHuyen = array('An Giang'=>array('Thành phố Long Xuyên','Thành phố Châu Đốc','Huyện An Phú','Thị Xã Tân Châu', 'Huyện Phú Tân'),
	'Bạc Liêu'=>'',
	'Bến Tre'=>array('Thành Phố Bến Tre', 'Huyện Châu Thành'),
	"Cà Mau"=>'',
	'Cần Thơ'=>array('Quận Ninh Kiều','Quận Cái Răng','Quận Bình Thủy','Quận Ô Môn','Quận Thốt Nốt','Huyện Phong Điền','Huyện Thới Lai','Huyện Cờ Đỏ', 'Huyện Vĩnh Thạnh'),
	'Đồng Tháp'=>'',
	'Hậu Giang'=>'',
	'Hồ Chí Mính'=>'',
	'Kiên Giang'=>'',
	'Long An'=>'',
	'Sóc Trăng'=>'',
	'Tiền Giang'=>'',
	'Trà Vinh'=>'',
	'Vĩnh Long'=>'');