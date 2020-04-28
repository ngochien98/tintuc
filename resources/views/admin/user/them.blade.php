@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) >0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $hi)
                            {{$hi}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">
                        <h2>{{Session('thanhcong')}}</h2>
                        </div>
                        @endif
                        <form action="admin/user/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                           
                            <div class="form-group">
                                <label>Tên User</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="Email" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="password" class="form-control" name="Password" placeholder="Nhập password" />
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu Xác Nhận</label>
                                <input type="password" class="form-control" name="Password_re" placeholder="Nhập password xác nhận" />
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <label class="radio-inline">
                                    <input name="Quyen" value="0" checked="" type="radio">Người Dùng
                                </label>
                                <label class="radio-inline">
                                    <input name="Quyen" value="1" type="radio">Quản Trị
                                </label>
                            </div>
                           
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection 