<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function trangchu(){
        $slide=Slide::all();
        $theloai=TheLoai::all();
        $tintuc= TinTuc::orderBy('SoLuotXem','DESC')->take(5)->get();
        $news=TinTuc::orderBy('created_at','DESC')->take(19)->get();
        $trending= TinTuc::where('SoLuotXem','>','30')->orderBy('SoLuotXem','DESC')->take(4)->get();
        return view('pages.trangchu',compact('tintuc','trending','theloai','news','slide'));
    }
    function lienhe(){
        return view('pages.contact');
    }
    function about(){
        return view('pages.about');
    }
    function theloai($id){
        $theloai_tl=TheLoai::all();
        $theloai1= TheLoai::find($id);
        $tt=$theloai1->tintuc->sortByDesc('SoLuotXem');
        return view('pages.theloai',['theloai1'=>$theloai1,'tt'=>$tt,'theloai_tl'=>$theloai_tl]);
    }
    function loaitin($id){
        $loaitin= LoaiTin::find($id);
        $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(7);
       
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function tintuc ($id){
        $tintuc1=TinTuc::find($id);
        $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=TinTuc::where('idLoaiTin',$tintuc1->idLoaiTin)->take(3)->get();
        return view('pages.tintuc',['tintuc1'=>$tintuc1,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }



    function getDangNhap(){
        return view('pages.dangnhap');
    }
    function postDangNhap(Request $request){
        $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required|min:3|max:32',
        ],
        [
            'email.required'=>'bạn chưa nhập email',
            'password.required'=>'bạn chưa nhập password',
            'password.min'=>' password không được nhỏ hơn 3 kt',
            'password.max'=>' password không được lớn hơn 32 kt',
        ]);
    
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao','dang nhập ko thành công');
        }
    }
    function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }


    function getDangKy(){
        return view('pages.dangky');
    }

    function postDangKy(Request $request){

        $this->validate($request,
        [
            'name'=>'required|min:3' ,
            'email'=>'required|email|unique:users,email' ,
            'password'=>'required|min:3|max:32' ,
            'passwordAgain'=>'required|same:password' ,
        ],
        [
            'name.required'=>'bạn chưa nhập tên',
            'name.min'=>'tên phài dài từ 3 đến 32 kí tự',
            'email.required'=>'bạn chưa nhập email',
            'email.email'=>'bạn chưa nhập đúng định dạng email',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'bạn chưa nhập pass',
            'password.min'=>'mk phài dài từ 3 đến 32 kí tự',
            'password.max'=>'mk phài tối đa 32 kí tự',
            'passwordAgain.required'=>'bạn chư nhập lại mk',
            'passwordAgain.same'=>'mk nhập lại chưa khớp',
        ]);
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->quyen=0;
        
        $user->save();
        return redirect('dangnhap')->with('thongbao','dk thành công');

    }

    function timkiem(Request $request){
        $tukhoa= $request->tukhoa;
        $tintuc=TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('Noidung','like',"%$tukhoa%")->paginate(5);
        return view('pages.timkiem',compact('tukhoa','tintuc'));
    }

    function getNguoiDung(){
        $user=Auth::user();
        return view('pages.nguoidung',['nguoidung'=>$user]);
    }

    function postNguoiDung(Request $request){
        $this->validate($request,
            [ 
                'name'=>'required|min:3' ,
            ],
            [ 
                'name.required'=>'bạn chưa nhập tên',
                'name.min'=>'tên phài dài từ 3 kí tự',   
            ]); 
        $user= Auth::user();
        $user->name=$request->name;
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
        return redirect('nguoidung')->with('thongbao','bạn đã sủa thành công');
    }
}
