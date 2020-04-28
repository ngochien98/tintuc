<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <meta name="author" content="">

    <title>Tin Tức</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="source/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="source/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="source/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="source/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nhập Thông Tin</h3>
                    </div>
                    <div class="panel-body">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $hi)
                                {{$hi}}
                            @endforeach
                        </div>
                        @endif
                        @if(Session::has('thongbao'))
                        <div class="alert alert-danger">
                            {{Session('thongbao')}}
                        </div>
                        @endif
                        <form role="form" action="dangky" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset>
                                <div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
                                <br>	
							<div>
								
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng Ký</button>
                            </fieldset>
                        </form>
                    </div>
                    <br>
                    <div>
                    	<a href="trangchu"> <button type="submit" class="btn btn-lg btn-success btn-block">Quay về trang chủ</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="source/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="source/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="source/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="source/dist/js/sb-admin-2.js"></script>

</body>

</html>
