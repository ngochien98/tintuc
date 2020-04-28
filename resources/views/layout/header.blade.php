
<div id="logo">
    	<a href="index.php"><img src="source_front/manse.jpg" width="100"/></a>
    </div>
    <div class="clearfix"></div>
    
    <div style="padding-bottom:40px;">
    	
            <div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                    <li><a href="trangchu">Trang Chủ</a></li>
                    @foreach($theloai_menu as $hi)
                      @if(count($hi->loaitin) >0)

                      <li><a href="#">{{$hi->Ten}}</a>
                      <ul>
                         @foreach($hi->loaitin as $lt)
                      <li><a href="loaitin/{{$lt->id}}">{{$lt->Ten}}</a></li>
                      
                          @endforeach
                      </ul>
                    </li>
                    @endif
                    @endforeach
                   
                    
              			</ul>
            		
            
		</div>

    </div>
  
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    
    <div id="behindmenu">
    	<div class=" row">
        	<div class="col-lg-4"></div>
        	<div class="col-lg-3 ">
            	<p class="pull-left">Chủ Nhật,4/8/2019</p>
            </div>
            <div class="col-lg-3">
            	<form method="get" action="timkiem">

                	<input type="text" name="khoa" id="txttk" />
                	<input type="submit"  id="bttk" value="Tìm Kiếm" class="btn-info"/>
                	
                 </form>
            </div>
            <div class="col-lg-2">
                 @if(Auth::check())
                     <a href="#">
                    <input type="submit" value="Chào: {{Auth::user()->name}}" class="btn-info pull-right"/></a>
            	    <a href="dangxuat">
                    <input type="submit" value="Đăng Xuất" class="btn-info pull-right"/></a>
                  @else  
                   <a href="dangky">
                    <input type="submit" value="Đăng Ký" class="btn-info pull-right"/></a>
                    <a href="dangnhap">
                	<input type="submit"  value="Đăng Nhập" class="btn-info pull-right"/></a>
                    
                    @endif
            </div>
        </div>
    </div>
    <div class="clearfix"></div>