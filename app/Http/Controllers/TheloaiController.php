<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;
class TheloaiController extends Controller
{
    public function getDanhsach(){
    	$theloai= Theloai::all();
    	return view('admin.theloai.danhsach',compact('theloai'));
    }
    public function getThem(){

    	return view('admin.theloai.them');
    }
    public function postThem(Request $re){
    	$this->validate($re,[
    		'TenTL'=>'required|min:2'
    	],[
    		'TenTL.required'=>'Nhập tên thể loại',
    		'TenTL.min'=>'Hãy nhập 2 kí tự trở lên'
    	]);
    	$theloai=new Theloai();
    	$theloai->Ten=$re->TenTL;
    	$theloai->TenKhongDau=changeTitle($re->TenTL);
    	$theloai->save();

    	return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }
    public function getSua(Request $re,$id){
    	$theloai = Theloai::find($id);
    	return view('admin.theloai.sua',compact('theloai'));
    }
    public function postSua(Request $re,$id){
    	$theloai =Theloai::find($id);
    	$this->validate($re,[
    		'TenTL'=>'required|min:2|unique:TheLoai,Ten'
    	],[
    		'TenTL.required'=>'Nhập tên thể loại',
    		'TenTL.min'=>'Hãy nhập 2 kí tự trở lên',
    		'TenTL.unique'=>'Tên này đã tồn tại'
    	]);
    	
    	$theloai->Ten=$re->TenTL;
    	$theloai->TenKhongDau=changeTitle($re->TenTL);
    	$theloai->save();
    	return redirect()->back()->with('thanhcong','Sửa thành công');
    }

    public function getXoa($id){
    	$theloai=Theloai::find($id);
    	$theloai->delete();

    	return redirect()->back();
    }
    
}
