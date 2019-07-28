<?php

namespace App;
//use TheLoai;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table="loaitin";
    protected $fillable =['Ten','idTheLoai','TenKhongDau'];


    public function theloai(){
        return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }

    public function tintuc(){
        return $this->hasMany('App\TinTuc','idLoaiTin','id');
    }

    public static function getPaLoaiTin(){
        return $loaitin= LoaiTin::paginate(10);
    }
    public static function getAllLoaiTin(){
        return $loaitin= LoaiTin::all();
    }
    public static function postStore($ten,$theloai){
        $loaitin = new LoaiTin;
        $loaitin->Ten=$ten;
        $loaitin->TenKhongDau=str_slug($ten);
        $loaitin->idTheLoai= $theloai;
        $loaitin->save();

    }

    public static function getOneLoaiTin($id){
        return $loaitin=LoaiTin::find($id);
    }

    public static function postUpdate($ten,$theloai,$id){
        $loaitin=LoaiTin::find($id);
        $loaitin->Ten=$ten;
        $loaitin->TenKhongDau=str_slug($ten);
        $loaitin->idTheLoai=$theloai;
        $loaitin->save();

    }
}
