<!--Bat dau phan sau slider-->
    <div id="danhmucmenu">
    	<div class="row">
            @foreach($theloai_menu as $hi)
            @if(count($hi->loaitin ) >0)
        	<div class="col-lg-2">
            	<a href="theloai/{{$hi->id}}"><h4>{{$hi->Ten}}</h4></a>
               @foreach($hi->loaitin as $tt)
                <a href="loaitin/{{$tt->id}}"><p>{{$tt->Ten}}</p></a>
                 @endforeach
                
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <!--Ket thuc phan sau slider-->