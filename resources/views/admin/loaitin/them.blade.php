@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Tin
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
                        <form action="admin/loaitin/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                           
                            <div class="form-group">
                                <label>Tên Loại Tin</label>
                                <input class="form-control" name="TenLT" placeholder="Nhập tên loại tin" />
                            </div>
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select name="TheLoai" class="form-control">
                                    @foreach($theloai as $hi)
                                    <option value="{{$hi->id}}">{{$hi->Ten}}</option>
                                    @endforeach
                                </select>
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