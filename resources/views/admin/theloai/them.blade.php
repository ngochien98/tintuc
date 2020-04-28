@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                            @foreach($errors->all() as $hi)
                            <div class="alert alert-danger">
                                {{$hi}}
                            </div>
                            @endforeach
                    @endif
                    
                    @if(Session::has('thanhcong'))
                    <div class="alert alert-success">
                        <h2>{{Session('thanhcong')}}</h2>
                    </div>
                    @endif
                        <form action="admin/theloai/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control" name="TenTL" placeholder="Nhập tên thể loại" />
                            </div>
                            
                            
                            <button type="submit" class="btn btn-default">Thêm Thể Loai</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection 