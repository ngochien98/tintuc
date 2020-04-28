<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
use App\Theloai;
class LoaitinController extends Controller
{
	public function getDanhsach(){
		$loaitin=Loaitin::all();
    	return view('admin/loaitin/danhsach',compact('loaitin'));
    }
   
 
    public function getXoa($id){
    	$loaitin=Loaitin::find($id);
    	$loaitin->delete();
    	

    	return redirect()->back();
    }
     public function getThem(){
     	$theloai=Theloai::all();
    	return view('admin/loaitin/them',compact('theloai'));
    }
    public function postThem(Request $re){
    	$this->validate($re,[
    		'TenLT'=>'required|min:2|unique:Loaitin,Ten',
    		'TheLoai'=>'required'
    	],[
    		'TenLT.required'=>'Nhập tên thể loại',
    		'TenLT.min'=>'Hãy nhập 2 kí tự trở lên',
    		'TenLT.unique'=>'Loại tin này đã tồn tại',
    		'TheLoai.required'=>'Hãy chọn thể loại'
    	]);
    	$loaitin=new Loaitin();
    	$loaitin->idTheLoai=$re->TheLoai;
    	$loaitin->Ten=$re->TenLT;
    	$loaitin->TenKhongDau=changeTitle($re->TenLT);
    	$loaitin->save();

    	return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }
    public function getSua($id){
    	$loaitin = Loaitin::find($id);
    	$theloai =Theloai::all();
    	return view('admin/loaitin/sua',compact('loaitin','theloai'));
    }
    public function postSua(Request $re,$id){
    	$loaitin =Loaitin::find($id);
    	$this->validate($re,[
    		'TenLT'=>'required|min:2|unique:Loaitin,idTheLoai',
    		'TheLoai'=>'required'
    	],[
    		'TenLT.required'=>'Nhập tên thể loại',
    		'TenLT.min'=>'Hãy nhập 2 kí tự trở lên',
    		'TenLT.unique'=>'Loại tin này đã tồn tại',
    		'TheLoai.required'=>'Hãy chọn thể loại'
    	]);
    	
    	$loaitin->idTheLoai=$re->TheLoai;
    	$loaitin->Ten=$re->TenLT;
    	$loaitin->TenKhongDau=changeTitle($re->TenLT);
    	$loaitin->save();
    	return redirect()->back()->with('thanhcong','Sửa thành công');
    }
}
