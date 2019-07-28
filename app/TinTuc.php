<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table="tintuc";
    protected $fillable =['TieuDe','TieuDeKhongDau','TomTat','NoiDung',
                           'Hinh','NoiBat','SoLuotXem','idLoaiTin'];

    public function loaitin(){
        return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    }

    public function comment(){
        return $this->hasMany('App\Comment','idTinTuc','id');
    }


    public static function getPaTinTuc(){
        return $tintuc = TinTuc::orderBy('id','DESC')->paginate(10);
    }
    public static function getAllTinTuc(){
        return $loaitin= LoaiTin::all();
    }
    public static function postStore($tieude,$loaitin,$tomtat,$noidung,$hinh){
        $tintuc= new TinTuc;
        $tintuc->TieuDe=$tieude;
        $tintuc->TieuDeKhongDau=str_slug($tieude);
        $tintuc->idLoaiTin=$loaitin;
        $tintuc->TomTat=$tomtat;
        $tintuc->NoiDung=$noidung;
        $tintuc->SoLuotXem=0;

        if (!is_null($hinh)) {
             $file=$hinh;
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

    }

    public static function getOneTinTuc($id){
        return $loaitin=TinTuc::find($id);
    }

    public static function postUpdate($tieude,$loaitin,$tomtat,$noidung,$hinh,$id){
        
        $tintuc= TinTuc::find($id);
        $tintuc->TieuDe=$tieude;
        $tintuc->TieuDeKhongDau=str_slug($tieude);
        $tintuc->idLoaiTin=$loaitin;
        $tintuc->TomTat=$tomtat;
        $tintuc->NoiDung=$noidung;
    

        if (!is_null($hinh)) {
             $file=$hinh;
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

    }
}
