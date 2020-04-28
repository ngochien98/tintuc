@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
                        @if(count($errors) >0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $hi)
                            {{$hi}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">
                        <h3>{{Session('thanhcong')}}</h3>
                        </div>
                        @endif
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="Ten" placeholder="Nhập tên slide" />
                            </div>
                             <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="Hinh" placeholder="Nhập tên slide" />
                            </div>
                             <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control ckeditor" name="NoiDung" id="demo" rows="5">
                                    
                                </textarea>
                            </div>
                              <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="Link" placeholder="Nhập tên slide" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection 