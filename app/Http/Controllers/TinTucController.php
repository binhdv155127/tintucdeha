<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
    public function getDanhSach(){
        $tintuc = TinTuc::orderBy('id','DESC')->paginate(10);
        return view('admin.tintuc.danhsach', compact('tintuc'));
    }

    public function getThem(){
        $theloai= TheLoai::all();
        $loaitin= LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'LoaiTin'=>'required' ,
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe', 
            'TomTat'=>'required' ,
            'NoiDung'=>'required' ,
        ],
        [
            'LoaiTin.required'=>'bạn chưa chọn loại tin',
            'TieuDe.required'=>'bạn chưa chọn tiêu đề',
            'TieuDe.min'=>'tên phài dài từ 3 đến 100 kí tự',
            'TieuDe.unique'=>'td đã tồn tại',
            'TomTat.required'=>'bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'bạn chưa nhập nội dung',
        ]);

        $tintuc= new TinTuc;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=str_slug($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->SoLuotXem=0;

        if ($request->hasFile('Hinh')) {
             $file=$request->file('Hinh'); // lưu hình vào biến file
             $duoi=$file->getClientOriginalExtension();
             if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg'){
                return redirect('admin/tintuc/them')->with('loi','bạn chỉ được thêm đuôi jpg, npg');
             }

             $name=$file->getClientOriginalName(); // lấy tên file ảnh
             $Hinh=str_random(4)."_".$name; // đặt tên ảnh ko bị trùng
             while (file_exists("upload/tintuc/".$Hinh)) { // kiểm tra xem trong folder tintuc đã có ảnh nào có tên là $Hình chưa, nếu có rồi thì đổi tiếp tên khác
                $Hinh=str_random(4)."_".$name;
             }
             $file->move("upload/tintuc",$Hinh);
             $tintuc->Hinh=$Hinh;
        } else {
           $tintuc->Hinh="";
        }
        $tintuc->save(); // hàm này để lưu vào csdl
        return redirect('admin/tintuc/them')->with('thongbao','them thành công');
    }

    public function getSua($id){
        $tintuc= TinTuc::find($id);
        $theloai= TheLoai::all();
        $loaitin= LoaiTin::all();
        return view('admin.tintuc.sua',compact('tintuc','theloai','loaitin'));
    }

    public function postSua(Request $request,$id){
        $tintuc= TinTuc::find($id);
        $this->validate($request,
        [
            'LoaiTin'=>'required' ,
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe', 
            'TomTat'=>'required' ,
            'NoiDung'=>'required' ,
        ],
        [
            'LoaiTin.required'=>'bạn chưa chọn lt',
            'TieuDe.required'=>'bạn chưa chọn td',
            'TieuDe.min'=>'tên phài dài từ 3 đến 100 kí tự',
            'TieuDe.unique'=>'td đã tồn tại',
            'TomTat.required'=>'bạn chưa nhập tt',
            'NoiDung.required'=>'bạn chưa nhập nd',
    
    
        ]);
            $tintuc->TieuDe=$request->TieuDe;
            $tintuc->TieuDeKhongDau=str_slug($request->TieuDe);
            $tintuc->idLoaiTin=$request->LoaiTin;
            $tintuc->TomTat=$request->TomTat;
            $tintuc->NoiDung=$request->NoiDung;
        
    
            if ($request->hasFile('Hinh')) {
                 $file=$request->file('Hinh');
                 $duoi=$file->getClientOriginalExtension();
                 if($duoi!='jpg'&& $duoi!='png' && $duoi='jpeg'){
                    return redirect('admin/tintuc/them')->with('loi','bạn chỉ được thêm đuôi jpg, npg');
                 }
                 $name=$file->getClientOriginalName();
                 $Hinh=str_random(4)."_".$name;
                 while (file_exists("upload/tintuc/".$Hinh)) {
                    $Hinh=str_random(4)."_".$name;
                 }
                 unlink("upload/tintuc/".$tintuc->Hinh);
                 $file->move("upload/tintuc",$Hinh);
                 $tintuc->Hinh=$Hinh;
            } 
            $tintuc->save();
            return redirect('admin/tintuc/sua/'.$id)->with('thongbao','sửa thành công');
      }

      public function getXoa($id){
        $tintuc= TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','xóa thành công');
      }

}
