<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
        $theloai= TheLoai::paginate(5);
        return view('admin.theloai.danhsach', compact('theloai'));
    }

    public function getThem(){
        return view('admin.theloai.them');
    }

    public function postThem(Request $request){
        $this->validate($request, // bắt lỗi
        [
            'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'   // biến Tên là truyền từ bên form sang
        ],
        [
            'Ten.required'=>'bạn chưa nhập',
            'Ten.unique'=>'tên đã tồn tại',
            'Ten.min'=>'tên phài dài từ 3 đến 100 kí tự',
            'Ten.max'=>'tên phài dài từ 3 đến 100 kí tự',

        ]);

        $theloai= new TheLoai;
        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau=str_slug($request->Ten,'-'); //để tạo cái tiêu đề không dấu, hay link thân thiện thì laravel đã hổ trợ hàm str_slug() rồi. Em sử dụng $tieude=str_slug($request->Ten,'-')
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','them thành công');
    }

    public function getSua($id){
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua', compact('theloai'));
    }

   
    public function postSua(Request $request,$id){
        $theloai = TheLoai::find($id);
        
        $this->validate($request,
        [
            'Ten'=>'required|unique:TheLoai,Ten|min:3|max:100'// unique để tên ko bị trùng trong bảng thể loại, ở cột tên
        ],
        [
            'Ten.required'=>'bạn chưa nhập tên thể loại',
            'Ten.unique'=>'tên đã tồn tại',
            'Ten.min'=>'tên phài dài từ 3 đến 100 kí tự',
            'Ten.max'=>'tên phài dài từ 3 đến 100 kí tự',
        ]);

        $theloai->Ten=$request->Ten;
        $theloai->TenKhongDau=str_slug($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','sửa thành công');
    }

    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','xóa thành công '.$theloai->Ten);

    }

}
