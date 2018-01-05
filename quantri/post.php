<?php include("header.php");?>
<?php
	$collections = $db->post;
	$posts = $collections->find();
	$countPost = 0;
	foreach ($posts as $post) {
		$countPost++;
	}
?>
<div class="d_divide20"></div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">
	<div class="col-sm-6">      
        <div class="icon_40 icon_category pull-left" style="margin-right: 10px"></div>  
        <h4 class="text-left bold pull-left">            
            Quản lý bài viết
        </h4>     
    </div>
    <div class="col-sm-6 text-right">
        <a class="my-btn-primary" style="color: #fff" href="addNewPost.php">
            <i class="glyphicon glyphicon-plus"></i>
            Thêm mới
        </a>
        <a href="#" class="my-btn-danger" style="color: #fff" onclick="deleteCategory()">
            <i class="glyphicon glyphicon-remove"></i>
            Xóa
        </a>
    </div>
</div>
<div class="d_divide20"></div>
<div class="row" style="margin: 0px;">	
	<div class="col-sm-12" style="padding: 0px;">
		<div class="table-responsive">
			<table class="table table-hover my-table" cellspacing="1" >
				<thead>
					<tr>
						<th width="1%"> # </th>
						<th width="1%">
		                    <input name="cbAll" id="cbAll" value="" onclick="checkAll('');" type="checkbox">
		                </th>
		                <th width="3%" align="center">Ảnh</th>
		                <th width="26%">
		                    <a href="#" id="C_Title" onclick="">Tên</a>
		                </th>
		                <th width="15%">
		                    Định danh
		                </th>
		                <th width="12%">
		                    Mô tả
		                </th>  

		                <th align="center" width="3%">Sửa</th>
		                <th align="center" width="3%">Xoá</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 1;?>
					<?php foreach($posts as $post){?>
					<tr>
						<td class="text-center"><?php echo $stt; ?></td>
						<td>
		                    <input id="cb<?php echo $stt;?>" name="cb[]" value="" onclick="isChecked(this.checked);" type="checkbox">
		                </td>
		                <td>
		                    <img src="" style="width: 30px; height: 30px" title="Ảnh sai đường dẫn"/>
		                </td>
		                <td style="color: #337ab7;">
		                	<a href=""><?php echo $post['title']?></a>
		                </td>
		                <td>
		                
		                </td>
		                <td>
		               		
		                </td>
		                
		                <td align="center"> 
		                	<a href="" class="">
		                        <i class="glyphicon glyphicon-edit"></i>
		                    </a>
		                </td>
		                <td align="center"> 
		                	<a href="#" style="color: #c12e2a;" onclick="deleteCategory()">
		                        <i class="glyphicon glyphicon-trash"></i>
		                    </a>
		                </td>
					</tr>
					<?php $stt++;?>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>
<?php include("footer.php");?>
