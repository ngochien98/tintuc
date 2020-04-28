<!--Bat dau phan 1-->
    <div id="phandau">
    	<div class="row">
        	<div class="col-lg-5 panel panel-default">
            	<img src="upload/tintuc/{{$tinmoinhat->Hinh}}" width="100%" class="img-rounded"/>
                <a href="chitiettin/{{$tinmoinhat->id}}"><h3>{{$tinmoinhat->TieuDe}}</h3></a>
                <p>{{$tinmoinhat->TomTat}}</p>
            </div>
            
            <div class="col-lg-3">
            	<div class="panel panel-default">
                	<div class="panel-heading"><h4>Tin Tức Liên Quan</h4></div>
                    @foreach($bontinmoitiep as $hi)
                        @if($hi->id != $tinmoinhat->id )
                            <a href="chitiettin/{{$hi->id}}" class="panel-body">{{$hi->TieuDe}}</a>
                        @endif
                	
                    @endforeach
                	
                     
                </div>
            </div>
            <div class="col-lg-4">
            	<div class="panel panel-default" style="height:500px; overflow:scroll;">
                	<div class="panel-heading">Video Xem Nhiều</div>

                    @foreach($videoxemnhieu as $hi)
                    <div class="panel-body">
                    	<div style=" width:50%;float:left; margin-right: 3%;">
                        	<iframe width="100%" src="{{$hi->urlVideo}}" frameborder="0" 
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                        <div >
                        	<div><h4>{{$hi->Ten}}</h4></div>
                        	
                        	<div>Luot xem: {{$hi->SoLuotXem}}</div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
    <!--Ket thuc phan 1-->