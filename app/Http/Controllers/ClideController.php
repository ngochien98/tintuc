<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
use App\Tintuc;
use App\Loaitin;
use App\Comment;
use App\Slide;
class ClideController extends Controller
{
    public function getDanhsach(){
    	$slide=Slide::all();
    	return view('admin/slide/danhsach',compact('slide'));
    }
    public function getXoa($id){
    	$slide=Slide::find($id);
    	$slide->delete();
    	

    	return redirect()->back();
    }
     public function getThem(){
     	
    	return view('admin/slide/them');
    }
   
    public function postThem(Request $re){
    	$this->validate($re,[
    		'Ten'=>'required|min:2|unique:slide,Ten',
    		'NoiDung'=>'required',
    		'Link'=>'required'

    		
    	],[
    		'Ten.required'=>'Nhập tên tiêu đề',
    		'Ten.min'=>'Hãy nhập 2 kí tự trở lên',
    		'Ten.unique'=>'Tên này đã tồn tại',
    		'NoiDung.required'=>'Hãy chọn loại tin',
    		'Link.required'=>'Nhập tóm tắt'
    		
    		
    	]);
    	$slide=new Slide();
    	$slide->Ten = $re->Ten;
    	
    	$slide->link=$re->Link;
    	$slide->NoiDung=$re->NoiDung;
    	
    	
    	if($re->hasFile('Hinh')){
    		$file= $re->file('Hinh');
    		$name= $file->getClientOriginalName();
    		$Hinh=str_random(4)."_".$name;
    		while(file_exists('upload/slide/'.$Hinh)){
    			$Hinh=str_random(4)."_".$name;
    		}
    		$file->move("upload/slide",$Hinh);
    		$slide->Hinh=$Hinh;
    	}
    	else{
    		$slide->Hinh="";
    	}
    	$slide->save();
    	return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }
    public function getSua($id){
    	$slide=Slide::find($id);
    	return view('admin/slide/sua',compact('slide'));
    }
    public function postSua(Request $re,$id){
    	$this->validate($re,[
    		'Ten'=>'required|min:2',
    		'NoiDung'=>'required',
    		'Link'=>'required'

    		
    	],[
    		'Ten.required'=>'Nhập tên tiêu đề',
    		'Ten.min'=>'Hãy nhập 2 kí tự trở lên',
    		
    		'NoiDung.required'=>'Hãy chọn loại tin',
    		'Link.required'=>'Nhập tóm tắt'
    		
    		
    	]);
    	$slide=Slide::find($id);
    	$slide->Ten = $re->Ten;
    	
    	$slide->link=$re->Link;
    	$slide->NoiDung=$re->NoiDung;
    	
    	
    	if($re->hasFile('Hinh')){
    		$file= $re->file('Hinh');
    		$name= $file->getClientOriginalName();
    		$Hinh=str_random(4)."_".$name;
    		while(file_exists('upload/slide/'.$Hinh)){
    			$Hinh=str_random(4)."_".$name;
    		}
    		$file->move("upload/slide",$Hinh);
    		$slide->Hinh=$Hinh;
    	}
    	
    	$slide->save();
    	return redirect()->back()->with('thanhcong','Sửa thành công');
    }
    
    public function getXoaComment($id){
    	
     $comment=Comment::find($id);
     $comment->delete();

     return redirect()->back();
    	
    }
}
