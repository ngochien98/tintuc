@extends('layout.index')
@section('noidung')

 <div class="col-lg-6">
 				
 				@foreach($tintuc as $hi)
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
 					<div class="row-item row"> {{$tintuc->links()}}</div>             
</div>

@endsection