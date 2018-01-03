<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="index, follow" />
        <title>Quản trị du lịch mekong</title>

        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">   
        <!-- alert -->
        <link href="../bootstrap_alert/sweet-alert.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="backend.css" type="text/css">

        <script src="../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../bootstrap_alert/sweet-alert.js" type="text/javascript"></script>
        
        
        <script src="../js/libraries.js"></script>
        <script type="text/javascript">
        	$(function(){
        		$('#txtUserName').focus();
        	});
			function login() {
				var u_u = $('#txtUserName');
		        var u_p = $('#txtPassword');
		        var hasError = validateEmptyValue(new Array(u_u, u_p));
		        if(!hasError){
		        	var data = {
		        		hdUserName: u_u.val(),
		                hdPass: u_p.val()
		            };
		            $.ajax({
		                url:'login_xuly.php',
		                type:'POST',
		                data:data,
		                success:function(data){
		                    console.log(data);
		                    if ($.trim(data) == 'OK') {
		                        window.location = "index.php";
		                    } else {
		                        swal("Lỗi", data, "error");
		                    }
		                },
		                error: function (data) {
		                    console.log(data);
		                }
		            });
		        }
				
			}
			jQuery(document).ready(function ()
		    {
		        // sự kiện nhấn nút enter trên bàn phím
		        $(document).keypress(function (event) {
		            var keycode = (event.keyCode ? event.keyCode : event.which);
		            if (keycode == '13') {
		                login();
		            }
		        });

		    });
		</script>
    </head>
    <body class="d_lock_screen">
    	<div class="container">
			<div class="row">
				<div class="d_divide20"></div>
		        <div class="d_divide20"></div>
		        <div class="d_divide20"></div>
		        <div class="d_divide20"></div>
		        <div class="d_divide20"></div>
				<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
					<div class="panel panel-primary" style="background-color: transparent;border-color: #FC883A;">
						<div class="panel-heading" style="background: #FC883A;">
		                    <h3 class="panel-title text-center">Quản trị website</h3>
		                </div>
		                <div class="panel-body">
		                	<form action="" method="POST" role="form" class="form-horizontal">
		                		
		                        <div class="form-group d_relative">
		                            <div class="col-md-712 col-lg-12">
		                                <input type="text" class="form-control" id="txtUserName" name="txtUserName" placeholder="Nhập tên đăng nhập">
		                            </div>
		                            <span id="alertUserName" class="d_error_message d_triangle" style="width: 200px; right: -200px;"></span>                    
		                        </div>

		                        <div class="form-group d_relative">
		                            <div class="col-md-712 col-lg-12">
		                                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Nhập mật khẩu">
		                            </div>  

		                            <span id="alertPassword" class="col-md-6 d_error_message d_triangle" style="right: -200px;"></span>
		                        </div>

		                        <div class="form-group"> 
		                            <div class="col-md-12">
		                                <button style="background: #FC883A;border-color: #FC883A;" type="button" id="btLogin" onclick="login()" class="btn btn-primary pull-right" data-loading-text="Đang xử lý..." autocomplete="off">Đăng nhập</button>
		                            </div>  
		                        </div>
		                	</form>
		                </div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
 

