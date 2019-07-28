<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
//use  App\Slide;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tintuc_share = TinTuc::orderBy('id','DESC')->take(2)->get();
        view()->share('tintuc_share', $tintuc_share);

        $theloai = TheLoai::all();
        view()->share('theloai', $theloai);

        // $slide = Slide::all();
        // view()->share('slide', $slide);

        // view()->composer(['menu','footer'],function($view){
        //     $theloai = TheLoai::all();
        //     $view->with('theloai',$theloai);
        // });


        // view()->composer('footer',function($view){
        //     $tintuc = TinTuc::orderBy('id','DESC')->take(2)->get();
        //     $view->with('tintuc',$tintuc);
        // });

        
    }
}
