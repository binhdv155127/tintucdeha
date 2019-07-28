<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = "theloai";

    protected $fillable=['Ten','TenKhongDau'];

    public function loaitin(){
        return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }
    public function tintuc(){   
        return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }

    public static function getAllTheLoai(){
        return $theloai= TheLoai::all();
    }
    public static function postStore($request){
        $theloai= new TheLoai;
        $theloai->Ten=$request;
        $theloai->TenKhongDau=str_slug($request,'-'); 
        $theloai->save();
    }

    public static function getOneTheLoai($id){
        return $theloai = TheLoai::find($id);
    }

    public static function postUpdate($request,$id){
        $theloai = TheLoai::find($id);
        $theloai->Ten=$request;
        $theloai->TenKhongDau=str_slug($request);
        $theloai->save();
    }
}
