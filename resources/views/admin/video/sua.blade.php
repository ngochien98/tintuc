@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Video
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
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
                        <form action="admin/video/sua/{{$video->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên Video</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tên video" value="{{$video->Ten}}" />
                            </div>
                             <div class="form-group">
                                <label>Link Video</label>
                                <input class="form-control" name="Link" placeholder="Nhập link video" value="{{$video->urlVideo}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình Đại Diện</label>
                                <img src="upload/video/{{$video->Hinh}}" height="250px">
                                <input type="file" name="Hinh" class="form-control" value="{{$video->Hinh}}" />
                            </div>
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select name="TheLoai" class="form-control" id="idTheLoai">
                                    @foreach($theloai as $hi)
                                    <option
                                    @if($hi->id == $video->loaitin->idTheLoai)
                                    selected=""
                                    @endif

                                     value="{{$hi->id}}">{{$hi->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Loại Tin</label>
                                <select name="LoaiTin" class="form-control" id="idLoaiTin">
                                    @foreach($loaitin as $hi)
                                    <option 
                                    @if($hi->id == $video->idLoaiTin)
                                    selected=""
                                    @endif
                                     value="{{$hi->id}}">{{$hi->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Không Nổi Bật
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Nổi Bật
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection 

@section('scrip')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#idTheLoai").change(function(){
                var id=$(this).val();
                $.get('admin/ajax/ajaxloaitin/'+id,function(data){
                    $("#idLoaiTin").html(data);
                });
            });
        });

    </script>
@endsection