<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Tintuc;
use App\Loaitin;
use App\Comment;
class TintucController extends Controller
{
    public function getDanhsach(){
    	$tintuc=Tintuc::orderBy('id','desc')->get();
    	return view('admin.tintuc.danhsach',compact('tintuc'));
    }
    public function getXoa($id){
    	$tintuc=Tintuc::find($id);
    	$tintuc->delete();
    	

    	return redirect()->back();
    }
     public function getThem(){
     	$theloai=Theloai::all();
     	$loaitin=Loaitin::all();
    	return view('admin/tintuc/them',compact('theloai','loaitin'));
    }
    public function getAjaxloaitin($idTheLoai){
    	$loaitin = Loaitin::where('idTheLoai',$idTheLoai)->get();
    	foreach($loaitin as $hi){
            echo "<option value='".$hi->id."'>$hi->Ten</option>";
    	}
        
    }
    public function postThem(Request $re){
    	$this->validate($re,[
    		'TieuDe'=>'required|min:2|unique:tintuc,TieuDe',
    		'LoaiTin'=>'required',
    		'TomTat'=>'required|min:2'
    		
    	],[
    		'TieuDe.required'=>'Nhập tên tiêu đề',
    		'TieuDe.min'=>'Hãy nhập 2 kí tự trở lên',
    		'TieuDe.unique'=>'Tiêu đề này đã tồn tại',
    		'LoaiTin.required'=>'Hãy chọn loại tin',
    		'TomTat.required'=>'Nhập tóm tắt',
    		'TomTat.min'=>'Hãy nhập 2 kí tự trở lên'
    		
    	]);
    	$tintuc=new Tintuc();
    	$tintuc->TieuDe = $re->TieuDe;
    	$tintuc->TieuDeKhongDau= changeTitle($re->TieuDe);
    	$tintuc->TomTat=$re->TomTat;
    	$tintuc->NoiDung=$re->NoiDung;
    	
    	$tintuc->idLoaiTin=$re->LoaiTin;
    	$tintuc->NoiBat=$re->NoiBat;
    	if($re->hasFile('Hinh')){
    		$file= $re->file('Hinh');
    		$name= $file->getClientOriginalName();
    		$Hinh=str_random(4)."_".$name;
    		while(file_exists('upload/tintuc/'.$Hinh)){
    			$Hinh=str_random(4)."_".$name;
    		}
    		$file->move("upload/tintuc",$Hinh);
    		$tintuc->Hinh=$Hinh;
    	}
    	else{
    		$tintuc->Hinh="";
    	}
    	$tintuc->save();
    	return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }
    public function getSua($id){
    	$theloai=Theloai::all();
     	$loaitin=Loaitin::all();
     	$comment=Comment::where('idTinTuc',$id)->get();
     	$tintuc=Tintuc::find($id);
    	return view('admin/tintuc/sua',compact('theloai','loaitin','tintuc','comment'));
    }
    public function postSua(Request $re,$id){
    	$tintuc=Tintuc::find($id);
    	$this->validate($re,[
    		'TieuDe'=>'required|min:2|unique:tintuc,TieuDe',
    		'LoaiTin'=>'required',
    		'TomTat'=>'required|min:2'
    		
    	],[
    		'TieuDe.required'=>'Nhập tên tiêu đề',
    		'TieuDe.min'=>'Hãy nhập 2 kí tự trở lên',
    		'TieuDe.unique'=>'Tiêu đề này đã tồn tại',
    		'LoaiTin.required'=>'Hãy chọn loại tin',
    		'TomTat.required'=>'Nhập tóm tắt',
    		'TomTat.min'=>'Hãy nhập 2 kí tự trở lên'
    		
    	]);
    	
    	$tintuc->TieuDe = $re->TieuDe;
    	$tintuc->TieuDeKhongDau= changeTitle($re->TieuDe);
    	$tintuc->TomTat=$re->TomTat;
    	$tintuc->NoiDung=$re->NoiDung;
    	
    	$tintuc->idLoaiTin=$re->LoaiTin;
    	$tintuc->NoiBat=$re->NoiBat;
    	if($re->hasFile('Hinh')){
    		$file= $re->file('Hinh');
    		$name= $file->getClientOriginalName();
    		$Hinh=str_random(4)."_".$name;
    		while(file_exists('upload/tintuc/'.$Hinh)){
    			$Hinh=str_random(4)."_".$name;
    		}
    		$file->move("upload/tintuc",$Hinh);
    		$tintuc->Hinh=$Hinh;
    	}
    	
    	$tintuc->save();
    	return redirect()->back()->with('thanhcong','Sửa thành công');
    }
    
    public function getXoaComment($id){
    	
     $comment=Comment::find($id);
     $comment->delete();

     return redirect()->back();
    	
    }
}
