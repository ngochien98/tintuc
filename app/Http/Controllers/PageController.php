<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Theloai;
use App\Video;
use App\Tintuc;
use App\Loaitin;
use App\Comment;
use App\Slide;
use App\User;
use Auth;
use Hash;
use Session; 
class PageController extends Controller{
	public function getLogin(){
    	return view ('admin/login');
    } 
    public function __construct(){
    	$tinmoinhat=Tintuc::orderBy('id','desc')->first();
    	$bontinmoitiep=Tintuc::orderBy('id','desc')->paginate(6);
    	$videoxemnhieu=Video::orderBy('SoLuotXem','desc')->paginate(6);
    	$tinxemnhieu=Tintuc::orderBy('SoLuotXem','desc')->paginate(6);
    	$theloai_share=Theloai::paginate(3);
    	
    	view()->share(['tinmoinhat'=>$tinmoinhat,'bontinmoitiep'=>$bontinmoitiep,'videoxemnhieu'=>$videoxemnhieu,'tinxemnhieu'=>$tinxemnhieu,'theloai_share'=>$theloai_share]);
    }
    public function getTrangchu(){
    	
    	$theloai=Theloai::orderBy('id')->paginate(4);
    	
    	return view('pages.trangchu',compact('theloai'));

    }
    public function getChitiettin($id){
      
           if((Session::get('kt'.$id)!=$id)){
                               
                $chitiet= Tintuc::find($id);
                $chitiet->SoLuotXem=$chitiet->SoLuotXem+1;
                $chitiet->save();
                Session::put('kt'.$id,$id);
                }
        
           
    	  $chitiet= Tintuc::find($id);
       //echo Session::get($id);
        $comment=Comment::where('idTinTuc',$id)->paginate(10);
    	return view('pages.chitiettin',compact('chitiet','comment'));

    }
    public function getLoaitin($id){
    	$tintuc=Tintuc::where('idLoaiTin',$id)->paginate(8);
    	return view('pages.loaitin',compact('tintuc'));
    }
    public function getTimkiem(Request $re){
    	$timkiem= Tintuc::where('TieuDe','like','%'.$re->khoa.'%')->orwhere('TomTat','like','%'.$re->khoa.'%')->paginate(8);
        $theloai=Theloai::all();
        $loaitin=Loaitin::all();
    	return view('pages.timkiem',compact('timkiem','theloai','loaitin'));
    }
    public function getTimkiemthem($idTheloai){
        $theloai=Loaitin::where('idTheloai',$idTheloai)->get();
        foreach ($theloai as $key => $value) {
            echo("abc");
        }

    }

    public function getDangky(){
    	return view('pages.dangky');
    }
    public function postDangky(Request $re){
    	$this->validate($re,[
    		'email'=>'required|email|unique:users,email',
    		'name'=>'required',
    		'password'=>'required|min:3',
    		'passwordAgain'=>'required|same:password'
    	],[
    		 'email.required'=>'Vui lòng nhập thông tin email',
                'email.email'=>'Chưa đúng đinh dạng email',
                'email.unique'=>'Email này đã tồn tại',
                'password.required'=>'Vui lòng nhập thông tin password',
                'password.min'=>'Độ dài nhiều hơn 6 kí tự',
                'name.required'=>'Vui lòng nhập thông tin name',
                'passwordAgain.required'=>'Vui lòng nhập thông tin',
                'passwordAgain.same'=>'Mat khau xac nhan ko khớp'
    	]);
    	$user= new User();
    	$user->name=$re->name;
    	$user->password=Hash::make($re->password);
    	$user->email=$re->email;
    	$user->save();
    	return redirect()->back()->with('thongbao','Đăng Ký thành công');
    }
    public function getDangnhap(){
    	return view('pages.dangnhap');
    }
    public function postDangnhap(Request $re){
    	$this->validate($re,[
    		'email'=>'required|email',
    		'password'=>'required'
    	],[
    		'email.required'=>'Nhập email',
    		'email.email'=>'Định dạng email không đúng',
    		'password.required'=>'Nhập password'
    	]);
    	$hi=array('email'=>$re->email,'password'=>$re->password);
    	if(Auth::attempt($hi)){
    		return redirect('trangchu');
    	}
    	else{
    		 return redirect()->back()->with('thongbaodn',"Đăng Nhâp thất bại");
    	}
    }
    public function getDangxuat(){
    	Auth::logout();
    	return redirect()->back();
    }
    public function postComment(Request $re,$id){
    	if(Auth::check()){
    		$this->validate($re,[
    			'Comment'=>'required'
    		],[
    			'Comment.required'=>'Hãy nhập bình luận'
    		]);
    		$hi= new Comment();
    		$hi->NoiDung =$re->Comment;
    		$hi->idUser= Auth::user()->id;
    		$hi->idTinTuc=$id;

    		$hi->save();

    		return redirect()->back();
    	}
    	else{
    		return redirect('dangnhap');
    	}
    }
}