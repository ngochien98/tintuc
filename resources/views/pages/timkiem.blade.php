@extends('layout.index')
@section('noidung')

 <div class="col-lg-6">
                 <div class="form-group">
                                <label>Thể Loại</label>
                                <select name="TheLoai" class="form-control" id="idTheLoai">
                                    @foreach($theloai as $hi)
                                    <option value="{{$hi->id}}">{{$hi->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Loại Tin</label>
                                <select name="LoaiTin" class="form-control" id="idLoaiTin">
                                    @foreach($loaitin as $hi)
                                    <option value="{{$hi->id}}">{{$hi->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
 				<div>
 					<h3>Kết quả tìm kiếm: </h3>
 				</div>
 				@foreach($timkiem as $hi)
            	<div class="row-item row">
                        <div class="col-md-3">

                            <a href="chitiettin/{{$hi->id}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$hi->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$hi->TieuDe}}</h3>
                            <p>{{$hi->TomTat}}</p>
                            <a class="btn btn-primary" href="chitiettin/{{$hi->id}}">Chi Tiết</a>
                        </div>
                        <div class="break"></div>
                    </div>

                @endforeach
 					<div class="row-item row"> {{$timkiem->links()}}</div>             
</div>

@endsection

@section('scrip')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#idTheLoai").change(function(){
                var idd=$(this).val();
                $.get('timkiemajax/'+idd,function(data){
                    $("#idLoaiTin").html(data);
                });
            });
        });

    </script>
@endsection