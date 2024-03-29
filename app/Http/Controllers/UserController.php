<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getDanhSach(){
        $user=User::paginate(5);
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(UserRequest $request){
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->quyen=$request->quyen;
        
        $user->save();
        return redirect('admin/user/them')->with('thongbao','them thành công');
    }

  public function getSua($id){
    $user= User::find($id);
    return view('admin.user.sua',['user'=>$user]);
  }

  public function postSua(UserRequest $request,$id){
    $user= User::find($id);
    
        $user= User::find($id);
        $user->name=$request->name;
        $user->quyen=$request->quyen;
        if($request->changePassword=="on"){ 
            $this->validate($request,
            [ 
                'password'=>'required|min:3|max:32' ,
                'passwordAgain'=>'required|same:password' ,
            ],
            [ 
                'password.required'=>'bạn chưa nhập pass',
                'password.min'=>'mk phài dài từ 3 đến 32 kí tự',
                'password.max'=>'mk phài tối đa 32 kí tự',
                'passwordAgain.required'=>'bạn chư nhập lại mk',
                'passwordAgain.same'=>'mk nhập lại chưa khớp',   
            ]); 
            $user->password= bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','sửa thành công');
  }
  

  public function getXoa($id){
    {
        $user = User::find($id);
        $comment = Comment::where('idUser',$id); //Tìm các comment của user
        $comment->delete(); //Xóa các comment của user
        $user->delete(); //Xóa user
        return redirect('admin/user/danhsach')->with('thongbao','Xóa tài khoản thành công');
      }
  }

  public function getdangnhapAdmin(){
    if(Auth::check()){
        return redirect('admin/theloai/danhsach');
    }else{
        return view('admin.login');
    }
  }
  public function postdangnhapAdmin(UserRequest $request){
    
    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect('admin/theloai/danhsach');
    }else{
        return redirect('admin/dangnhap')->with('thongbao','dang nhập ko thành công xin kiểm tra lại');
    }
  }
  public function getDangXuatAdmin(){
      Auth::logout();
      return redirect('admin/dangnhap');
  }
  
}

