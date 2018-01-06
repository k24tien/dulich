<?php
$dbname = 'doan';
$m = new MongoClient();
$db = $m->$dbname;
$arrTinh = array("An Giang","Bạc Liêu","Bến Tre","Cà Mau",'Cần Thơ','Đồng Tháp','Hậu Giang','Hồ Chí Mính','Kiên Giang','Long An','Sóc Trăng','Tiền Giang','Trà Vinh','Vĩnh Long');
$arrQuanHuyen = array('An Giang'=>array('Huyện An Phú','Thành phố Châu Đốc','Huyện Châu Phú','Huyện Châu Thành','Huyện Chợ Mới','Thành phố Long Xuyên','Huyện Phú Tân','Thị Xã Tân Châu', 'Huyện Thoại Sơn','Huyện Tịnh Biên', 'Huyện Tri Tôn'),
	'Bạc Liêu'=>array('Thành Phố Bạc Liêu', 'Huyện Đông Hải', 'Thị Xã Giá Rai','Huyện Hoà Bình','Huyện Hồng Dân','Huyện Phước Long','Huyện Vĩnh Lợi'),
	'Bến Tre'=>array('Huyện Ba Tri','Thành Phố Bến Tre', 'Huyện Bình Đại','Huyện Châu Thành','Huyện Chợ Lách', 'Huyện Giồng Trôm','Huyện Mỏ Cày Bắc','Huyện Mỏ Cày Nam', 'Huyện Thạnh Phú'),
	"Cà Mau"=>array('Thành Phố Cà Mau', 'Huyện Cái Nước', 'Huyện Đầm Dơi','Huyện Năm Căn','Huyện Ngọc Hiển','Huyện Phú Tân','Huyện Thới Bình','Huyện Trần Văn Thời','Huyện U Minh'),
	'Cần Thơ'=>array('Quận Ninh Kiều','Quận Cái Răng','Quận Bình Thủy','Quận Ô Môn','Quận Thốt Nốt','Huyện Phong Điền','Huyện Thới Lai','Huyện Cờ Đỏ', 'Huyện Vĩnh Thạnh'),
	'Đồng Tháp'=>array('Thành Phố Cao Lãnh', 'Huyện Cao Lãnh', 'Huyện Châu Thành','Thị Xã Hồng Ngự','Huyện Hồng Ngự','Huyện Lai Vung','Huyện Lấp Vò','Thành Phố Sa Đéc', 'Huyện Tam Nông','Huyện Tân Hồng','Huyện Thanh Bình','Huyện Tháp Mười'),
	'Hậu Giang'=>array('Thành Phố Vị Thanh', 'Huyện Châu Thành', 'Huyện Châu Thành A','Thị Xã Long Mỹ','Huyện Long Mỹ','Thị Xã Ngã Bảy','Huyện Phụng Hiệp','Huyện Vị Thủy'),
	'Kiên Giang'=>array('Thành Phố Rạch Giá', 'Thị Xã Hà Tiên', 'Huyện An Biên','Huyện An Minh','Huyện Giang Thành','Huyện Châu Thành','Huyện Giồng Riềng','Huyện Gò Quao','Huyện Hòn Đất','Huyện Kiên Hải','Huyện Kiên Lương','Huyện Phú Quốc','Huyện Tân Hiệp','Huyện U Minh Thượng','Huyện Vĩnh Thuận'),
	'Long An'=>array('Thành Phố Tân An', 'Thị Xã Kiến Tường', 'Huyện Bến Lức','Huyện Cần Đước','Huyện Cần Giuộc','Huyện Châu Thành','Huyện Đức Hòa','Huyện Đức Huệ','Huyện Mộc Hóa','Huyện Tân Hưng','Huyện Tân Thạnh','Huyện Tân Trụ','Huyện Thạnh Hóa','Huyện Thủ Thừa','Huyện Vĩnh Hưng'),
	'Sóc Trăng'=>array('Thành Phố Sóc Trăng', 'Thị Xã Ngã Năm', 'Huyện Châu Thành','Huyện Cù Lao Dung','Huyện Kế Sách','Huyện Long Phú','Huyện Mỹ Tú','Huyện Mỹ Xuyên','Huyện Thạnh Trị','Huyện Trần Đề','Huyện Vĩnh Châu'),
	'Tiền Giang'=>array('Thành Phố Mỹ Tho', 'Thị Xã Cai Lậy', 'Huyện Cai Lậy','Huyện Cái Bè','Huyện Châu Thành','Huyện Chợ Gạo','Thị Xã Gò Công','Huyện Gò Công Đông','Huyện Gò Công Tây','Huyện Tân Phú Đông','Huyện Tân Phước'),
	'Trà Vinh'=>array('Thành Phố Trà Vinh', 'Thị Xã Duyên Hải', 'Huyện Duyên Hải','Huyện Càng Long','Huyện Cầu Kè','Huyện Cầu Ngang','Huyện Châu Thành','Huyện Tiểu Cần','Huyện Trà Cú'),
	'Vĩnh Long'=>array('Thành Phố Vĩnh Long', 'Thị Xã Bình Minh', 'Huyện Bình Tân','Huyện Long Hồ','Huyện Mang Thít','Huyện Tam Bình','Huyện Trà Ôn','Huyện Vũng Liêm'));