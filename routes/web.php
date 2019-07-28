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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});


// Route::get('thu',function(){
//     $theloai= TheLoai::find(1);
//     foreach ($theloai->loaitin as $lt) {
//         echo $lt->Ten."<br>";
//     }
// });


Route::group(['prefix'=>'admin' ,'middleware'=>'adminLogin'], function () {
    Route::group(['prefix'=>'theloai'], function () {
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('sua/{id}','TheLoaiController@getsua');
        Route::post('sua/{id}','TheLoaiController@postsua');

        Route::get('xoa/{id}','TheLoaiController@getXoa');
    });

    Route::group(['prefix'=>'loaitin'], function () {
        Route::get('danhsach','LoaiTinController@getDanhSach');

        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');

        Route::get('sua/{id}','LoaiTinController@getsua');
        Route::post('sua/{id}','LoaiTinController@postsua');

        Route::get('xoa/{id}','LoaiTinController@getXoa');
    });

    Route::group(['prefix'=>'tintuc'], function () {
        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('sua/{id}','TinTucController@getsua');
        Route::post('sua/{id}','TinTucController@postsua');

        Route::get('xoa/{id}','TinTucController@getXoa');
    });

    Route::group(['prefix'=>'comment'], function () {

        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');

    });

    Route::group(['prefix'=>'ajax'], function () {
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });

    Route::group(['prefix'=>'slide'], function () {
        Route::get('danhsach','SlideController@getDanhSach');

        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('sua/{id}','SlideController@getsua');
        Route::post('sua/{id}','SlideController@postsua');

        Route::get('xoa/{id}','SlideController@getXoa');
    });

    Route::group(['prefix'=>'user'], function () {
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('sua/{id}','UserController@getsua');
        Route::post('sua/{id}','UserController@postsua');

        Route::get('xoa/{id}','UserController@getXoa');
    });

});

Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');


//  giao diện người dùng

Route::get('trangchu','PageController@trangchu');
Route::get('lienhe','PageController@lienhe');
Route::get('about','PageController@about');
Route::get('theloai/{id}/{TenKhongDau}.html','PageController@theloai');
Route::get('loaitin/{id}/{TenKhongDau}.html','PageController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PageController@tintuc');



Route::get('dangnhap','PageController@getDangNhap');
Route::post('dangnhap','PageController@postDangNhap');
Route::get('dangxuat','PageController@getDangXuat');
Route::get('nguoidung','PageController@getNguoiDung');
Route::post('nguoidung','PageController@postNguoiDung');

Route::get('dangky','PageController@getDangKy');
Route::post('dangky','PageController@postDangKy');

Route::post('comment/{id}','CommentController@postComment');

Route::post('timkiem','PageController@timkiem');


Route::middleware('throttle:6,1')->group(function () {
    Route::get('/foo', function () {
        echo 'foo';
   });
});
Route::middleware('throttle:5,1')->group(function () {
    Route::get('/bar', function () {
        echo 'Baz';
    });
});