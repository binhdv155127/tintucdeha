<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

  public function postComment($id,Request $request){
    Comment::postUpdate($id,$request->NoiDung);
    $tintuc=TinTuc::find($id);
    return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html")->with('thongbao','bt thành công');
  }

  public function getXoa($id,$idTinTuc){
    $comment= Comment::find($id);
    $comment->delete();
    return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','xóa thành công');
  }
}
