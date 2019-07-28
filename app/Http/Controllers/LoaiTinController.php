<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

use App\Http\Requests\LoaiTinRequest;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
        return view('admin/loaitin/danhsach',['loaitin'=>LoaiTin::getPaLoaiTin()]);
    }

    public function getThem(){
        $theloai=Theloai::getAllTheLoai();
        return view('admin/loaitin/them',compact('theloai'));
    }

    public function postThem(LoaiTinRequest $request){
        LoaiTin::postStore($request->Ten,$request->TheLoai);
        return redirect('admin/loaitin/them')->with('thongbao','thêm thành công ');
    }

    public function getSua($id){
        $theloai=TheLoai::getAllTheLoai();
        $loaitin=LoaiTin::getOneLoaiTin($id);
        return view('admin/loaitin/sua',compact('theloai','loaitin'));
    }

    public function postSua(LoaiTinRequest $request,$id){
        LoaiTin::postUpdate($request->Ten,$request->TheLoai,$id);
        return redirect('admin/loaitin/danhsach')->with('thongbao','sua thành công');
    }

    public function getXoa($id){
        $loaitin=LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','xóa thành công');
    }

}
