@extends('admin/layout/index')
@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Nội Dung</th>
                                <th>Link</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $hi)
                            <tr class="odd gradeX" align="center">
                                <td>{{$hi->id}}</td>
                                <td>{{$hi->Ten}}</td>
                                <td>
                                    <img src="upload/slide/{{$hi->Hinh}}" width="300px">
                                </td>
                                <td>{{$hi->NoiDung}}</td>
                                <td>{{$hi->Link}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$hi->id}}"> Xoá</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$hi->id}}">Sửa</a></td>
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