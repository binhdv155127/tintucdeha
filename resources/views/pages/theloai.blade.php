@extends('layout.master')

@section('meba')
   @include('layout.banner')
@endsection

@section('content')
   <!-- ##### Breadcrumb Area Start ##### -->
   <div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $theloai1->Ten }}</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                    <!-- Single Catagory Post -->
                    <div class="t">
                        {{-- @foreach ($tt as $item)
                        {{ $item->Ten }} <br>
                        @endforeach --}}
                        
                    </div>
                    <?php
                       // $data=$theloai1->tintuc->where('NoiBat',1)->get();
                    ?>
                    @foreach ($tt->take(7) as $item)
                         <?php
                           //$data= $item->where('NoiBat',1)->take(11);
                           // $tt1=$item->orderBy('SoLuotXem','DESC')->take(7);
                         ?>
                         <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url(upload/tintuc/{{ $item->Hinh }});">
                                <a href="" ></a>
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">MAY 8, 2018</a>
                                    <a href="loaitin/{{ $item->loaitin->id }}/{{ $item->loaitin->TenKhongDau }}.html">{{ $item->loaitin->Ten }}</a>
                                </div>
                                <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html" class="post-title">{{ $item->TieuDe }}</a>
                                <!-- Post Meta -->
                                <div class="post-meta-2">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                </div>
                                <p>{{ $item->TomTat }}</p>
                            </div>
                        </div>
                    @endforeach
                       
               
                    <!-- Pagination -->
                    <div class="l">
                    
                    </div>
                    
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Social Followers Info -->
                        <div class="social-followers-info">
                            <!-- Facebook -->
                            <a href="#" class="facebook-fans"><i class="fa fa-facebook"></i> 4,360 <span>Fans</span></a>
                            <!-- Twitter -->
                            <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
                            <!-- YouTube -->
                            <a href="#" class="youtube-subscribers"><i class="fa fa-youtube"></i> 1250 <span>Subscribers</span></a>
                            <!-- Google -->
                            <a href="#" class="google-followers"><i class="fa fa-google-plus"></i> 4,230 <span>Followers</span></a>
                        </div>
                    </div>
            
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Loai Tin {{ $theloai1->Ten }}</h5>
                        </div>
            
                        <!-- Catagory Widget -->
                        <ul class="catagory-widgets">
                            @foreach ($theloai1->loaitin as $lt)
                                <li><a href="loaitin/{{ $lt->id }}/{{ $lt->TenKhongDau }}.html"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $lt->Ten }}</span> <span>{{ count($lt->tintuc) }}</span></a></li>
                            @endforeach
                            
                        </ul>
                    </div>
            
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget">
                        <a href="#" class="add-img"><img src="img/bg-img/add2.png" alt=""></a>
                    </div>
            
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Hot Channels</h5>
                        </div>
            
                        @foreach ($theloai_tl as $item)
                            <!-- Single YouTube Channel -->
                            <div class="single-youtube-channel d-flex">
                                <div class="youtube-channel-thumbnail">
                                    <img src="img/bg-img/14.jpg" alt="">
                                </div>
                                <div class="youtube-channel-content">
                                    <a href="theloai/{{ $item->id }}/{{ $item->TenKhongDau }}.html" class="channel-title">{{ $item->Ten }}</a>
                                    <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                                </div>
                            </div>
            
                        @endforeach
                        
            
                    </div>
            
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Newsletter</h5>
                        </div>
            
                        <div class="newsletter-form">
                            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                            <form action="#" method="get">
                                <input type="search" name="widget-search" placeholder="Enter your email">
                                <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                            </form>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->
@endsection