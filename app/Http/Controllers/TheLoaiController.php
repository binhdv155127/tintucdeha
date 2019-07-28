<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Http\Requests\TheLoaiRequest;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
        return view('admin.theloai.danhsach', ['theloai'=>Theloai::getAllTheLoai()]);
    }

    public function getThem(){
        return view('admin.theloai.them');
    }

    public function postThem(TheLoaiRequest $request){
        TheLoai::postStore($request->Ten);
        return redirect('admin/theloai/them')->with('thongbao','Đã thêm thành công ');
        
    }

    public function getSua($id){
        $theloai=TheLoai::getOneTheLoai($id);
        return view('admin.theloai.sua', compact('theloai'));
    }

   
    public function postSua(TheLoaiRequest $request,$id){
        TheLoai::postUpdate($request->Ten,$id);
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','sửa thành công');
    }

    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','xóa thành công '.$theloai->Ten);

    }

}
