<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Comment extends Model
{
    protected $table="comment";

    protected $fillable=['idUser','idTinTuc','NoiDung'];

    public function tintuc(){ 
        return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }

    public function user(){
        return $this->belongsTo('App\User','idUser','id');
    }

    public static function postUpdate($id,$noidung){
        $idTinTuc=$id;
        $tintuc=TinTuc::find($id);
        $comment=new Comment;
        $comment->idTinTuc=$idTinTuc;
        $comment->idUser=Auth::user()->id;
        $comment->NoiDung=$noidung;
        $comment->save();
    }
}
