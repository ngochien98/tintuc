<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function getDanhsach(){
    	$user=User::all();
    	return view('admin/user/danhsach',compact('user'));
    }
    public function getXoa($id){
    	$user=User::find($id);
    	$user->delete();
    	

    	return redirect()->back();
    }
     public function getThem(){
     	
    	return view('admin/user/them');
    }
   
    public function postThem(Request $re){
    	$this->validate($re,[
    		'Ten'=>'required|min:2',
    		'Password'=>'required',
    		'Password_re'=>'required|same:Password',
    		'Email'=>'required|unique:users,name'

    		
    	],[
    		'Ten.required'=>'Nhập tên người dùng',
    		'Ten.min'=>'Hãy nhập 2 kí tự trở lên',
    		
    		'Password.required'=>'Hãy nhập mật khẩu',
    		'Password_re.required'=>'Hãy nhập mật khẩu xác nhận',
    		'Password_re.same'=>'Mật khẩu xác nhận không khớp',
    		'Email.required'=>'Hãy nhập email',
    		'Email.unique'=>'Email này đã tồn tại'
    		
    		
    	]);
    	$user=new User();
    	$user->name=$re->Ten;
    	$user->email=$re->Email;
    	$user->password=Hash::make($re->Password);
    	$user->quyen=$re->Quyen;
    	$user->save();
    	return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }
    public function getSua($id){
    	$user=User::find($id);
    	return view('admin/user/sua',compact('user'));
    }
    public function postSua(Request $re,$id){
    	$user=User::find($id);
    $this->validate($re,[
    		'Ten'=>'required|min:2',
    		'Password'=>'required',
    		'Password_re'=>'required|same:Password',
    		'Email'=>'required|unique:users,name'

    		
    	],[
    		'Ten.required'=>'Nhập tên người dùng',
    		'Ten.min'=>'Hãy nhập 2 kí tự trở lên',
    		
    		'Password.required'=>'Hãy nhập mật khẩu',
    		'Password_re.required'=>'Hãy nhập mật khẩu xác nhận',
    		'Password_re.same'=>'Mật khẩu xác nhận không khớp',
    		'Email.required'=>'Hãy nhập email',
    		'Email.unique'=>'Email này đã tồn tại'
    		
    		
    	]);
    	
    	$user->name=$re->Ten;
    	$user->email=$re->Email;
    	$user->password=Hash::make($re->Password);
    	$user->quyen=$re->Quyen;
    	$user->save();
    	return redirect()->back()->with('thanhcong','Sửa thành công');
    }
    
   public function getDangnhapadmin(){
   	return view('admin/login');
   }
   public function postDangnhapadmin(Request $re){
   		$this->validate($re,[
   			'email'=>'required',
   			'password'=>'required'
   		],[
   			'email.required'=>'Nhập email của ban vào',
   			'password.required'=>'Bạn chưa nhập mật khẩu'
   		]);
   		$hi = array('email'=>$re->email,'password'=>$re->password);
   		if(Auth::attempt($hi)){
   			return redirect('admin/theloai/danhsach');
   		} 
   		else{
   			return redirect()->back()->with('thongbao','Đăng nhập thất bại');
   		}
   }
   public function getDangxuatadmin(){
   	Auth::logout();
   	return redirect('admin/dangnhap');
   }
}
