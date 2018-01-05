<?php include("header.php");?>
<?php 
    $collections = $db->category;
    $cates = $collections->find();
?>
<script type="text/javascript">
    var arrayTags = new Array();
    $(function () {
        $("#txtA_Title").focus();
        $("#txtA_Title").keyup(function(){
            assignTitleToAlias();
        });
        
        $("#slA_Tinh").change(function(){
            $("#slA_Huyen").removeAttr('disabled');
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
    function addPost(redirectPage){
        var txtA_Title = $('txtA_Title');
        var txtA_Alias = $('txtA_Alias');
        var file = $('#txtA_Image')[0].files[0];
        var slA_Category = $('#slA_Category');
        var txtA_Urlmap = $("#txtA_Urlmap");
        var txtA_Address = $('#txtA_Address');
        var slA_Tinh = $('#slA_Tinh');
        var slA_Huyen = $('#slA_Huyen');
        var txtA_Des = $('#txtA_Des');
        var txtA_Content = CKEDITOR.instances['txtA_Content'].getData();
        var hasError = validateEmptyValue(new Array(txtA_Title,txtA_Alias,slA_Category));
        var reader = new FileReader();
        var data = reader.readAsArrayBuffer(file);
        alert(data);
        if(!hasError){

        }
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
        if($.inArray(nameTag, arrayTags) == -1){
            arrayTags.push(nameTag);
            var key =  $('<div style="margin-left:5px; margin-bottom:5px" class="pull-left btn btn-xs btn-warning" id="' + nameTag + '">' + nameTag + '<i style="cursor: pointer;margin-left:5px" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i></div>');
            key.appendTo('#tagList');
        }
    }

</script>
<div class="d_divide20"></div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">
	<div class="col-sm-6">      
        <div class="icon_40 icon_category pull-left" style="margin-right: 10px"></div>  
        <h4 class="text-left bold pull-left">            
            Thêm mới bài viết
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
        <a class="my-btn-primary" style="color: #fff" href="#" onclick="addPost(true)">
            <i class="glyphicon glyphicon-floppy-open"></i>
            Lưu và thoát
        </a>
        <a class="my-btn-primary" style="color: #fff" href="#" onclick="addPost()">
            <i class="glyphicon glyphicon-floppy-open"></i>
            Lưu
        </a>
        <a href="post.php" class="my-btn-danger" style="color: #fff">
            <i class="glyphicon glyphicon-arrow-left"></i>
            Trở về
        </a>
    </div>
</div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">  
    <div class="col-sm-12" style="padding: 0px;">
        <form class="form-horizontal" name="phpForm" id="phpForm">
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Title" class="col-sm-2 control-label">
                    Tên
                    <span class="d_asterisk">*</span>                                
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Alias" class="col-sm-2 control-label">
                    Định danh                           
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Alias" name="txtA_Alias" placeholder="Định danh">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Image" class="col-sm-2 control-label">
                    Ảnh                           
                </label>
                <div class="col-sm-10">
                    <input type="file" id="txtA_Image" name="txtA_Image" >
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="slA_Category" class="col-sm-2 control-label">
                    Nhóm bài viết                         
                </label>
                <div class="col-sm-10">
                    <select  class="form-control" name="slA_Category" id="slA_Category">
                        <option value="">-- Chọn Chủ đề --</option>
                        <?php foreach($cates as $cate){?>
                        <option value="<?php echo $cate['catname'];?>"><?php echo $cate['catname'];?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Urlmap" class="col-sm-2 control-label">
                    Link google map                        
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Urlmap" name="txtA_Urlmap" placeholder="Đường dẫn vị trí trên google map">
                </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <label for="txtA_Address" class="col-sm-2 control-label">
                    Địa chỉ                         
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" title="" id="txtA_Address" name="txtA_Address" placeholder="Địa chỉ">
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
        </form>
    </div>
</div>
<?php include("footer.php");?>