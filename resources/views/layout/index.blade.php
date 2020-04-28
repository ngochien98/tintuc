<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" content="width=device-width,initial-scale=1"/>
<base href="{{asset('')}}">
<link rel="stylesheet" type="text/css" href="source_front/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="source_front/css/dinhdang.css"/>
<link rel="stylesheet" type="text/css" href="source_front/css/slider.css"/>

<title>Web Am Thanh</title>
 
	
    <script type="text/javascript" src="source_front/js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (39KB) or jssor.sliderc.mini.js (31KB, with caption, no slideshow) or jssor.sliders.mini.js (26KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.core.js + jssor.utils.js + jssor.slider.js) -->
    <script type="text/javascript" src="source_front/js/jssor.core.js"></script>
    <script type="text/javascript" src="source_front/js/jssor.utils.js"></script>
    <script type="text/javascript" src="source_front/js/jssor.slider.js"></script>
    
    <!--MENU-->
    <link rel="stylesheet" type="text/css" href="source_front/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="source_front/ddsmoothmenu-v.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="source_front/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Please keep this notice intact
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	method: 'toggle', // set to 'hover' (default) or 'toggle'
	arrowswap: true, // enable rollover effect on menu arrow images?
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
<!--END menu-->
    
</head>

<body>
<div class="container">
	@include('layout.header')
    
    @include('layout.phandau')

    <!--Bat dau phan 2-->
    <div id="Phan2">
    	<div class="row">
        	<!--P1-->
            <div class="col-lg-3 panel panel-default">
            	
                <div class="panel-heading"><h4>Tin Xem Nhiều</h4></div>
                @foreach($tinxemnhieu as $hi)
                <div class="panel-body">
                <img src="upload/tintuc/{{$hi->Hinh}}" width="100%"/>
                <a href="chitiettin/{{$hi->id}}"><h4>{{$hi->TieuDe}}</h4></a>
               	</div>
                @endforeach
                               
            </div>
            <!--End P1-->
    @yield('noidung')

     <div class="col-lg-3">
                @foreach($theloai_share as $tl)
                <!---->
                <div class="panel panel-default">
                    <div class="panel-heading">{{$tl->Ten}}</div>
                    <?php
                    $data=$tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                    $tin1=$data->shift();
                    ?>
                    <div>
                        <img src="upload/tintuc/{{$tin1['Hinh']}}" width="100%" />
                        <a href="#"><h4>{{$tin1['TieuDe']}}</h4>
                        <p>{{$tin1['TomTat']}}</p>
                        </a>
                        
                    </div>
                    <div id="phan2p3">
                        @foreach($data as $hi)
                        <a href="chitiettin/{{$hi->id}}" title="{{$hi->TieuDe}}"><h5>{{$hi->TieuDe}}</h5></a>
                        @endforeach
                    </div>
                </div>
                <!--end-->
                @endforeach
               
            </div>
            <!--End p3-->
        </div>
    </div>
   

    @include('layout.footer')
    

    @yield('scrip')
</div>
</body>
</html>
