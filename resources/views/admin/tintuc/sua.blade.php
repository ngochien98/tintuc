@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Sửa: {{$tintuc->TieuDe}}</small>
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
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tiêu Đề Tin Tức</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề tin tức" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea class="form-control ckeditor" name="TomTat" id="demo" rows="3">
                                    {{$tintuc->TomTat}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control ckeditor" name="NoiDung" id="demo" rows="5">
                                     {{$tintuc->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Đại Diện</label>
                                <p><img src="upload/tintuc/{{$tintuc->Hinh}}" height="300px"></p>
                                <input type="file" name="Hinh" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select name="TheLoai" class="form-control" id="idTheLoai">
                                    @foreach($theloai as $hi)
                                    <option 
                                     @if($tintuc->loaitin->theloai->id == $hi->id)
                                    {{"selected"}}
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
                                    @if($tintuc->loaitin->id == $hi->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$hi->id}}">{{$hi->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                    @if(($tintuc->NoiBat) ==0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">Không Nổi Bật
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                    @if(($tintuc->NoiBat) ==1)
                                        {{"checked"}}
                                    @endif
                                    type="radio">Nổi Bật
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách Comment</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người Dùng</th>
                                <th>Nội Dung</th>
                                <th>Ngày Đăng</th>
                                
                                <th>Xóa</th>
                               
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($comment as $hi)
                            <tr class="odd gradeX" align="center">
                                <td>{{$hi->id}}</td>
                                <td>{{$hi->user->name}}</td>
                                <td>{{$hi->NoiDung}}</td>
                                <td>{{$hi->created_at}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a  href="admin/tintuc/xoaComment/{{$hi->id}}"> Xoá</a></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
