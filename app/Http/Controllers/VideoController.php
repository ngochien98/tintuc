<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Tintuc;
use App\Loaitin;
use App\Comment;
use App\Video;
class VideoController extends Controller
{
    public function getDanhsach(){
    	$video=Video::orderBy('id','desc')->get();
    	return view('admin.video.danhsach',compact('video'));
    }
    public function getXoa($id){
    	$video=Video::find($id);
    	$video->delete();
    	

    	return redirect()->back();
    }
     public function getThem(){
     	$theloai=Theloai::all();
     	$loaitin=Loaitin::all();
    	return view('admin/video/them',compact('theloai','loaitin'));
    }
    public function getAjaxloaitin($idTheLoai){
    	$loaitin = Loaitin::where('idTheLoai',$idTheLoai)->get();
    	foreach($loaitin as $hi){
            echo "<option value='".$hi->id."'>$hi->Ten</option>";
    	}
        
    }
    public function postThem(Request $re){
    	$this->validate($re,[
    		'TieuDe'=>'required|min:2|unique:video,Ten',
    		'LoaiTin'=>'required',
    		'Link'=>'required',
    		'Hinh'=>'required'
    		
    		
    	],[
    		'TieuDe.required'=>'Nhập tên tiêu đề',
    		'TieuDe.min'=>'Hãy nhập 2 kí tự trở lên',
    		'TieuDe.unique'=>'Tên này đã tồn tại',
    		'LoaiTin.required'=>'Hãy chọn loại tin',
    		'Link.required'=>'Nhập link',
    		'Hinh.required'=>'Chọn Hình'
    		
    	]);
    	$video=new Video();
    	$video->Ten = $re->TieuDe;
    	$video->Ten_KhongDau= changeTitle($re->Ten);
    	$video->urlVideo=$re->Link;
    	
    	
    	$video->idLoaiTin=$re->LoaiTin;
    	$video->NoiBat=$re->NoiBat;
    	if($re->hasFile('Hinh')){
    		$file= $re->file('Hinh');
    		$name= $file->getClientOriginalName();
    		$Hinh=str_random(4)."_".$name;
    		while(file_exists('upload/video/'.$Hinh)){
    			$Hinh=str_random(4)."_".$name;
    		}
    		$file->move("upload/video",$Hinh);
    		$video->Hinh=$Hinh;
    	}
    	else{
    		$video->Hinh="";
    	}
    	$video->save();
    	return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }
    public function getSua($id){
    	$theloai=Theloai::all();
     	$loaitin=Loaitin::all();
     	
     	$video=Video::find($id);
    	return view('admin/video/sua',compact('theloai','loaitin','video'));
    }
    public function postSua(Request $re,$id){
    	$video=Video::find($id);
    	$this->validate($re,[
    		'TieuDe'=>'required|min:2',
    		'LoaiTin'=>'required',
    		'Link'=>'required'
    		
    		
    		
    	],[
    		'TieuDe.required'=>'Nhập tên tiêu đề',
    		'TieuDe.min'=>'Hãy nhập 2 kí tự trở lên',
    		
    		'LoaiTin.required'=>'Hãy chọn loại tin',
    		'Link.required'=>'Nhập link'
    		
    		
    	]);
    	
    	$video->Ten = $re->TieuDe;
    	$video->Ten_KhongDau= changeTitle($re->Ten);
    	$video->urlVideo=$re->Link;
    	
    	
    	$video->idLoaiTin=$re->LoaiTin;
    	$video->NoiBat=$re->NoiBat;
    	if($re->hasFile('Hinh')){
    		$file= $re->file('Hinh');
    		$name= $file->getClientOriginalName();
    		$Hinh=str_random(4)."_".$name;
    		while(file_exists('upload/video/'.$Hinh)){
    			$Hinh=str_random(4)."_".$name;
    		}
    		$file->move("upload/video",$Hinh);
    		$video->Hinh=$Hinh;
    	}
    	
    	$video->save();
    	return redirect()->back()->with('thanhcong','Sửa mới thành công');
    }
    
    
}
