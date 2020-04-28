<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which 
| contains the "web" middleware group. Now create something great!
|
*/
use App\Theloai;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapadmin');
Route::post('admin/dangnhap','UserController@postDangnhapadmin');
Route::get('admin/dangxuat','UserController@getDangxuatadmin');
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheloaiController@getDanhsach');
		Route::get('them','TheloaiController@getThem');
		Route::post('them','TheloaiController@postThem');
		Route::get('sua/{id}','TheloaiController@getSua');
		Route::post('sua/{id}','TheloaiController@postSua');

		Route::get('xoa/{id}','TheloaiController@getXoa');
	});

	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','LoaitinController@getDanhsach');
		Route::get('them','LoaitinController@getThem');
		Route::post('them','LoaitinController@postThem');
		Route::get('sua/{id}','LoaitinController@getSua');
		Route::post('sua/{id}','LoaitinController@postSua');

		Route::get('xoa/{id}','LoaitinController@getXoa');

	});

	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','TintucController@getDanhsach');
		Route::get('them','TintucController@getThem');
		Route::post('them','TintucController@postThem');
		Route::get('sua/{id}','TintucController@getSua');
		Route::post('sua/{id}','TintucController@postSua');

		Route::get('xoa/{id}','TintucController@getXoa');
		Route::get('xoaComment/{id}','TintucController@getXoaComment');



	});
	Route::group(['prefix'=>'video'],function(){
		Route::get('danhsach','VideoController@getDanhsach');
		Route::get('them','VideoController@getThem');
		Route::post('them','VideoController@postThem');
		Route::get('sua/{id}','VideoController@getSua');
		Route::post('sua/{id}','VideoController@postSua');

		Route::get('xoa/{id}','VideoController@getXoa');
		



	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','ClideController@getDanhsach');
		Route::get('them','ClideController@getThem');
		Route::post('them','ClideController@postThem');
		Route::get('sua/{id}','ClideController@getSua');
		Route::post('sua/{id}','ClideController@postSua');

		Route::get('xoa/{id}','ClideController@getXoa');

	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhsach');
		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');
		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('xoa/{id}','UserController@getXoa');

	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('ajaxloaitin/{idTheLoai}','TintucController@getAjaxloaitin');
		
		
	});
});

Route::get('trangchu','PageController@getTrangchu');
Route::get('theloai/{id}','PageController@getTheloai');
Route::get('loaitin/{id}','PageController@getLoaitin');
Route::get('chitiettin/{id}','PageController@getChitiettin');

Route::get('timkiem','PageController@getTimkiem');
Route::get('timkiemthem/{idTheloai}','PageController@getTimkiemthem');

Route::get('dangky','PageController@getDangky');
Route::post('dangky','PageController@postDangky');
Route::get('dangnhap','PageController@getDangnhap');
Route::post('dangnhap','PageController@postDangnhap');

Route::get('dangxuat','PageController@getDangxuat');
Route::post('comment/{id}','PageController@postComment');

