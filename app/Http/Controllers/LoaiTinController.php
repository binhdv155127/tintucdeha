<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    public function getDanhSach(){
        $loaitin = LoaiTin::paginate(10);
        return view('admin/loaitin/danhsach',compact('loaitin'));
    }

    public function getThem(){
        $theloai=TheLoai::all();
        return view('admin/loaitin/them',compact('theloai'));
    }

    public function postThem(Request $request){
        $this-> validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:LoaiTin,Ten',
            'TheLoai'=>'required'
        ],
        [
            'Ten.required'=>'bạn chưa nhập',
            'Ten.unique'=>'tên đã tồn tại',
            'Ten.min'=>'tên phài dài từ 3 đến 100 kí tự',
            'Ten.max'=>'tên phài dài từ 3 đến 100 kí tự',
            'TheLoai.required'=>'bạn chưa nhập',
        ]);

        $loaitin = new LoaiTin;
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=str_slug($request->Ten);
        $loaitin->idTheLoai= $request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','thêm thành công ');
    }

    public function getSua($id){
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::find($id);
        return view('admin/loaitin/sua',compact('theloai','loaitin'));
    }

    public function postSua(Request $request,$id){
        $loaitin=LoaiTin::find($id);

        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:LoaiTin,Ten',
            'TheLoai'=>'required'
        ],
        [
            'Ten.required'=>'bạn chưa nhập',
            'Ten.unique'=>'tên đã tồn tại',
            'Ten.min'=>'tên phài dài từ 3 đến 100 kí tự',
            'Ten.max'=>'tên phài dài từ 3 đến 100 kí tự',
            'TheLoai.required'=>'bạn chưa nhập',
        ]);

        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=str_slug($request->Ten);
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$loaitin->id)->with('thongbao','sua thành công');
    }

    public function getXoa($id){
        $loaitin=LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','xóa thành công');
    }

}
