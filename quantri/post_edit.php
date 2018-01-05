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
                        <option value="<?php echo $tinh; ?>"><?php echo $tinh; ?></option>
                        <?php }?>
                    </select>
                </div>
                <label for="txtA_Huyen" class="col-sm-2 control-label">
                    Quận huyện                      
                </label>
                <div class="col-sm-4">
                    <select  class="form-control" name="slA_Huyen" id="slA_Huyen" disabled>
                        <option value="">-- Quận huyện --</option>

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
                    <textarea class="form-control" id="txtA_Des" name="txtA_Des"></textarea> 
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Content" class="col-sm-2 control-label">
                    Nội dung                         
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control ckeditor" id="txtA_Content" name="txtA_Content"></textarea> 
                </div>
            </div>
        
    </div>
</div>
</form>
<?php include("footer.php");?>