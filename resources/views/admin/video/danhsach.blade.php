@extends('admin/layout/index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                              
                                <th>Link Video</th>
                                <th>Hình</th>
                                <th>Thể Loại</th>
                                <th>Loại Tin</th>
                                <th>Lượt Xem</th>
                                <th>Nổi Bật</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($video as $hi)
                            <tr class="odd gradeX" align="center">
                                <td>{{$hi->id}}</td>
                                <td>{{$hi->Ten}}</td>
                                <td>{{$hi->urlVideo}}</td>
                                <td>{{$hi->Hinh}}</td>
                                <td>{{$hi->loaitin->theloai->Ten}}</td>
                                
                                <td>{{$hi->loaitin->Ten}}</td>
                                <td>{{$hi->SoLuotXem}}</td>
                                
                                <th>
                                    @if($hi->NoiBat ==0) {{'Không'}}
                                    @else {{'Có'}}
                                    @endif
                                </th>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/video/xoa/{{$hi->id}}"> Xoá</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/video/sua/{{$hi->id}}">Sửa</a></td>
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

