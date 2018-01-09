<?php
include("../config/config.php");
if(isset($_POST['txtA_Title'])){
$title = $_POST['txtA_Title'];
$alias = $_POST['txtA_Alias'];
// $file = $_POST['hdFile'];
$filename = $_FILES["file"]["tmp_name"];
$category = $_POST['slA_Category'];
$urlmap = $_POST['txtA_Urlmap'];
$address = $_POST['txtA_Address'];
$tinh = $_POST['slA_Tinh'];
$huyen = $_POST['slA_Huyen'];
$des = $_POST['txtA_Des'];
$content = $_POST['txtA_Content'];
$tagList = $_POST['pTag'];
// $collection = $db->posts;
// $doc = array( "title" => $title, "alias"=>$alias,"post_image" => new MongoBinData(file_get_contents($filename)),"category" => $category, "urlmap" => $urlmap,"address" => $address, "tinh" => $tinh,"huyen" => $huyen, "des" => $des, "content" => $content, "view" => 0,"like"=>0,"comment"=>array(), "created_date" => new MongoDate(), "author" => "Administrator");
// $collection->insert($doc);
echo count(json_decode($_POST['pTag']));	
}else{
	echo "Lỗi";
}