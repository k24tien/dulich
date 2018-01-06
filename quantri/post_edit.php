<?php include("header.php");?>
<?php
$post = null;
if(isset($_GET['tt'])){
    $alias = $_GET['tt'];
    $collection = $db->post;
    $posts = $collection->find(array('alias'=>$alias));
    foreach ($posts as $key => $value) {
        $post = $value;
    }
}
?>
<script>
    var tags = <?php echo json_encode($post['tags'])?>;
    var arrayTags = new Array();
    arrayTags = JSON.parse(tags);
    $(function () {
        $("#txtA_Title").focus();
        $("#txtA_Title").keyup(function(){
            assignTitleToAlias();
        });
        
        $("#slA_Tinh").change(function(){
            var data = {
                hdTinh: $("#slA_Tinh").val()
            };
            $.ajax({
                url:'chon_tinh_ajax.php',
                type:'POST',
                data:data,
                success:function(data){
                    console.log(data);
                    $("#slA_Huyen").html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
    function checkError(){
        var txtA_Title = $('#txtA_Title');
        var txtA_Alias = $('#txtA_Alias');
        var slA_Category = $('#slA_Category');
        var tagList = JSON.stringify(arrayTags);
        $('#pTag').val(tagList);
        var hasError = validateEmptyValue(new Array(txtA_Title, txtA_Alias, slA_Category));
        if(hasError){
            swal("Lỗi", "Vui long nhap day du thong tin", "error");
            return false;
        }

    }
    function setRedirect(){
        $('#redirectPage').val(1);
    }
    function assignTitleToAlias(){
        var title = $.trim($("#txtA_Title").val());
        title = removeSigns(title);
        $("#txtA_Alias").val(title);
    }
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
        alert(tags);
        if($.inArray(nameTag, arrayTags) == -1){
            arrayTags.push(nameTag);
            var key =  $('<div style="margin-left:5px; margin-bottom:5px" class="pull-left btn btn-xs btn-warning" id="' + nameTag + '">' + nameTag + '<i style="cursor: pointer;margin-left:5px" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i></div>');
            key.appendTo('#tagList');
        }
    }
</script>
<div class="d_divide20"></div>
<div class="d_divide20"></div>
<form class="form-horizontal" name="phpForm" method="POST" action="" id="phpForm" enctype="multipart/form-data" onsubmit="return checkError()">
<div class="row" style="margin: 0px;">
    <div class="col-sm-6">      
        <div class="icon_40 icon_category pull-left" style="margin-right: 10px"></div>  
        <h4 class="text-left bold pull-left">            
            Chỉnh sửa bài viết
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
        <button class="my-btn-primary" style="color: #fff;border: none!important;" type="submit" onclick="setRedirect();">
            <i class="glyphicon glyphicon-floppy-open"></i>
            <input type="hidden" name="redirectPage" value="0" id="redirectPage">
            Lưu và thoát
        </button>
        <button class="my-btn-primary no-border" style="color: #fff; border: none!important;" type="submit" onclick="checkError();">
            <i class="glyphicon glyphicon-floppy-open"></i>
            Lưu
        </button>
        <a href="post.php" class="my-btn-danger" style="color: #fff">
            <i class="glyphicon glyphicon-arrow-left"></i>
            Trở về
        </a>
    </div>
</div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">  
    <div class="col-sm-12" style="padding: 0px;">
        
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Title" class="col-sm-2 control-label">
                    Tên
                    <span class="d_asterisk">*</span>                                
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên" value="<?php echo $post['title'];?>">
                    <input type="hidden" title="" id="txtE_Title1" name="txtE_Title1" value="<?php echo $post['title'];?>">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Alias" class="col-sm-2 control-label">
                    Định danh                           
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Alias" name="txtA_Alias" placeholder="Định danh" value="<?php echo $post['alias'];?>">

                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Image" class="col-sm-2 control-label">
                    Ảnh                           
                </label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file" >
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="slA_Category" class="col-sm-2 control-label">
                    Nhóm bài viết                         
                </label>
                <div class="col-sm-10">
                    <select  class="form-control" name="slA_Category" id="slA_Category">
                        <option value="">-- Chọn Chủ đề --</option>
                        <?php
                            $collection = $db->category;
                            $cates = $collection->find();
                            foreach($cates as $cate){
                            if($cate['catname']== $post['category']){
                        ?>
                            <option selected value="<?php echo $cate['catname'];?>" ><?php echo $cate['catname'];?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $cate['catname'];?>"><?php echo $cate['catname'];?></option>
                            <?php }?>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Urlmap" class="col-sm-2 control-label">
                    Link google map                        
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Urlmap" name="txtA_Urlmap" placeholder="Đường dẫn vị trí trên google map" value="<?php echo $post['urlmap'];?>">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Address" class="col-sm-2 control-label">
                    Địa chỉ                         
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Address" name="txtA_Address" placeholder="Địa chỉ" value="<?php echo $post['address'];?>">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Tinh" class="col-sm-2 control-label">
                    Tỉnh/TP                      
                </label>
                <div class="col-sm-4">
                    <select  class="form-control" name="slA_Tinh" id="slA_Tinh">
                        <option value="">-- Tỉnh/TP --</option>
                        <?php foreach($arrTinh as $tinh){?>
                        <?php if($post['tinh']==$tinh){?>
                        <option selected value="<?php echo $tinh; ?>"><?php echo $tinh; ?></option>
                        <?php }else{?>
                        <option value="<?php echo $tinh; ?>"><?php echo $tinh; ?></option>
                        <?php }?>
                        <?php }?>
                    </select>
                </div>
                <label for="txtA_Huyen" class="col-sm-2 control-label">
                    Quận huyện                      
                </label>
                <div class="col-sm-4">
                    <select  class="form-control" name="slA_Huyen" id="slA_Huyen">

                        <option value="">-- Quận huyện --</option>
                        <?php $huyens = $arrQuanHuyen[$post['tinh']]?>
                        <?php foreach($huyens as $huyen){?>
                        <?php if($post['huyen']==$huyen){?>
                        <option selected value="<?php echo $huyen; ?>"><?php echo $huyen; ?></option>
                        <?php }else{?>
                        <option value="<?php echo $huyen; ?>"><?php echo $huyen; ?></option>
                        <?php }?>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Tag" class="col-sm-2 control-label">
                    Từ khóa                  
                </label>
                <div class="col-sm-10">
                    <div class="inside">
                        <input type="text" name="txtA_Tag" value="" id="txtA_Tag" placeholder="Từ khóa" class="input-tag">
                        <a class="my-btn-primary" style="color: #fff" href="#" onclick="addTags();">
                            <i class="glyphicon glyphicon-plus"></i>
                            Thêm
                        </a>
                        
                        <div class="tagList" id="tagList">
                            <?php foreach ($post['tags'] as $key => $value) {?>
                               <div style="margin-left:5px; margin-bottom:5px" class="pull-left btn btn-xs btn-warning" id="<?php echo $value; ?>"><?php echo $value; ?><i style="cursor: pointer;margin-left:5px" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i></div>
                            <?php }?>
                        </div>
                        <input type="hidden" name="pTag" id="pTag" value="">
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Des" class="col-sm-2 control-label">
                    Mô tả                          
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="txtA_Des" name="txtA_Des"><?php echo $post['des']?></textarea> 
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Content" class="col-sm-2 control-label">
                    Nội dung                         
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control ckeditor" id="txtA_Content" name="txtA_Content"><?php echo $post['content']?></textarea> 
                </div>
            </div>
        
    </div>
</div>
</form>
<?php include("footer.php");?>
<?php 
    if(isset($_POST['txtA_Title'])){
        $id = $_POST['txtE_Title1'];
        $redirectPage = $_POST['redirectPage'];
        $title = $_POST['txtA_Title'];
        $alias = $_POST['txtA_Alias'];
        $filename = $_FILES["file"]["tmp_name"];
        $category = $_POST['slA_Category'];
        $urlmap = $_POST['txtA_Urlmap'];
        $address = $_POST['txtA_Address'];
        $tinh = $_POST['slA_Tinh'];
        $huyen = $_POST['slA_Huyen'];
        $des = $_POST['txtA_Des'];
        $content = $_POST['txtA_Content'];
        $tagList = json_decode($_POST['pTag']);
        $collection = $db->post;
        if($filename!=""){
            $doc = array( "title" => $title, "alias"=>$alias,"post_image" => new MongoBinData(file_get_contents($filename)),"category" => $category, "urlmap" => $urlmap,"address" => $address, "tinh" => $tinh,"huyen" => $huyen, "des" => $des, "content" => $content, "tags"=>$tagList, "view" => 0,"like"=>0,"comment"=>array(), "created_date" => new MongoDate(), "author" => "Administrator");
        }else{
            $doc = array( "title" => $title, "alias"=>$alias,"category" => $category, "urlmap" => $urlmap,"address" => $address, "tinh" => $tinh,"huyen" => $huyen, "des" => $des, "content" => $content, "tags"=>$tagList, "view" => 0,"like"=>0,"comment"=>array(), "created_date" => new MongoDate(), "author" => "Administrator");
        }
        
        $collection->update(array("title" => $id),$doc);
        if($redirectPage==1){
            echo "<script>
            swal({
                title: 'Thao tác thành công!',
                timer: 10000,
                type: 'success'
            });
            window.location.replace('http://localhost/doan/quantri/post.php');
            </script>";  
        }else{
            echo "<script>
            swal({
                title: 'Thao tác thành công!',
                timer: 10000,
                type: 'success'
            });
            window.location.replace('http://localhost/doan/quantri/addNewPost.php');
            </script>";  
        }
    }
?>