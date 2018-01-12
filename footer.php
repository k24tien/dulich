<footer class="row no-margin footer">
		<div class="panel-body margin_top15">
			<div class="col-lg-6 pull-left">
				<h4 class="copyright">Bài tập nhóm Phát triển phần mềm nguồn mở</h4>
			</div>
			<div class="col-lg-6 pull-right">
				<h4 class="copyright" style="text-align: right;">Giảng viên hướng dẫn: Đỗ Thanh Nghị</h4>
			</div>
			
		</div>
	</footer>
</div>
<?php 
include('config/config.php');
?>

<div id="adSearchModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form class="form-horizontal" name="phpForm" id="phpForm" action="adsearch.php" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tìm kiếm nâng cao</h4>
            </div>
            <div class="modal-body">
                
                	<div class="form-group"> 
	                    <label for="txtA_Title" class="col-sm-2 control-label">
	                        Tên                              
	                    </label>
	                    <div class="col-sm-10">
	                        <input type="text" class="form-control" title="" id="txtS_Title" name="txtS_Title" placeholder="Tên">
	                    </div>                     
	                </div>
	                <div class="form-group">
	                    <label for="slA_Category" class="col-sm-2 control-label">
	                        Chuyên mục
	                    </label>
	                    <div class="col-sm-10">  
	                        <select  class="form-control" name="sls_Category" id="sls_Category">
		                        <option value="">-- Chọn Chủ đề --</option>
		                        <?php foreach($cates as $cate){?>
		                        <option value="<?php echo $cate['catname'];?>"><?php echo $cate['catname'];?></option>
		                        <?php }?>
		                    </select>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="slA_Tinh" class="col-sm-2 control-label">
	                        Tỉnh/TP
	                    </label>
	                    <div class="col-sm-10">  
	                        <select  class="form-control" name="sls_Tinh" id="sls_Tinh">
		                        <option value="">-- Tỉnh/TP --</option>
		                        <?php foreach($arrTinh as $tinh){?>
		                        <option value="<?php echo $tinh; ?>"><?php echo $tinh; ?></option>
		                        <?php }?>
		                    </select>
	                    </div>
	                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                <button type="submit" class="btn btn-primary" onclick="save();">Tìm kiếm</button>
            </div>
            </form>
        </div>
    </div>
</div>