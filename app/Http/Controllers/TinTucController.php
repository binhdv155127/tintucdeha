<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

use App\Http\Requests\TinTucRequest;

class TinTucController extends Controller
{
    public function getDanhSach(){
        $tintuc = TinTuc::getPaTinTuc();
        return view('admin.tintuc.danhsach', compact('tintuc'));
    }

    public function getThem(){
        $theloai= TheLoai::getAllTheLoai();
        $loaitin= LoaiTin::getAllLoaiTin();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(TinTucRequest $request){
        TinTuc::postStore($request->TieuDe,$request->LoaiTin,$request->TomTat,$request->NoiDung,$request->Hinh);
        return redirect('admin/tintuc/them')->with('thongbao','them thành công');
    }

    public function getSua($id){
        $tintuc= TinTuc::getOneTinTuc($id);
        $theloai= TheLoai::getAllTheLoai();
        $loaitin= LoaiTin::getAllLoaiTin();
        return view('admin.tintuc.sua',compact('tintuc','theloai','loaitin'));
    }

    public function postSua(TinTucRequest $request,$id){
        TinTuc::postUpdate($request->TieuDe,$request->LoaiTin,$request->TomTat,$request->NoiDung,$request->Hinh,$id);
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','sửa thành công');
      }

      public function getXoa($id){
        $tintuc= TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','xóa thành công');
      }

}
