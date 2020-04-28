@extends('layout.index')
@section('noidung')


    
    
            <!--Bat dau P2-->
            <div class="col-lg-6">
                @foreach($theloai as $tl)
                  @if(count($tl->video) >0)
                  <?php
                  $data=$tl->video->where('NoiBat',1)->sortByDesc('created_at')->take(4);
                  ?>
            	<div class="panel panel-default">
                	<div class="panel-heading"><a href="#">{{$tl->Ten}}</a></div>
                    @foreach($data as $hi)
                	<div class="panel-body" style="width:50%; float:left;">
                    	<iframe width="100%"  src="{{$hi->urlVideo}}" frameborder="0" 
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        <a href="#"><h4>{{$hi->Ten}}</h4></a>
                    </div>
                    @endforeach
                    
                </div>
                <div class="clearfix"></div>
                  @endif
                @endforeach
               
            </div>
            <!--End P2-->
            <!--bat dau p3-->
         
        
    <!--Ket thuc phan 2-->
   

@endsection
