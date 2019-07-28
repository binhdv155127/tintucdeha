@extends('layout.master')
@section('meba')
   @include('layout.slide')
@endsection
@section('content')

<section class="mag-posts-area d-flex flex-wrap">

       <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Phổ biến nhất</h5>
                </div>

                <!-- Single Blog Post -->
                @foreach($tintuc as $tt)
                    <div class="single-blog-post d-flex">
                        <div class="post-thumbnail">
                        <img src="upload/tintuc/{{$tt->Hinh}}" alt="">
                        </div>
                        <div class="post-content">
                        <a href="tintuc/{{ $tt->id }}/{{ $tt->TieuDeKhongDau }}.html" class="post-title">{{$tt->TieuDe}}</a>
                            <div class="post-meta d-flex justify-content-between">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$tt->SoLuotXem}}</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget">
                <a href="#" class="add-img"><img src="img/bg-img/add.png" alt=""></a>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget p-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>Tin mới nhất</h5>
                </div>

                @foreach ($news as $item)
                    <!-- Single Blog Post -->
                    <div class="single-blog-post d-flex">
                        <div class="post-thumbnail">
                            <img src="upload/tintuc/{{ $item->Hinh }}" alt="">
                        </div>
                        <div class="post-content">
                            <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html" class="post-title">{{ $item->TieuDe }}</a>
                            <div class="post-meta d-flex justify-content-between">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{ $item->SoLuotXem }}</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                

            </div>
        </div>

        <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
            <!-- Trending Now Posts Area -->
            <div class="trending-now-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>TRENDING NOW</h5>
                </div>

                <div class="trending-post-slides owl-carousel">
                    <!-- Single Trending Post -->
                    @foreach ($trending as $td)
                        <div class="single-trending-post">
                            <img src="upload/tintuc/{{ $td->Hinh }}" alt="">
                            <div class="post-content">
                                
                                <a href="tintuc/{{ $td->id }}/{{ $td->TieuDeKhongDau }}.html" class="post-title">{{ $td->TieuDe }}</a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>

            <!-- Feature Video Posts Area -->
            @foreach($theloai as $tl)
            @if (count($tl->loaitin)>0)
            <div class="feature-video-posts mb-30">
                <!-- Section Title -->
                <div class="section-heading">
                    <h5>{{$tl->Ten}}</h5>
                </div>

                <?php 
                    $data=$tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(11);
                    $tin1=$data->shift(); // sẽ lấy 1 tin từ data bên trên, data chỉ còn 4 tin và tin1 là 1 mảng
                    // hàm shift lấy ra 1 tin thì sẽ làm cho tin1 là 1 mảng
                ?>
                <div class="featured-video-posts">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <!-- Single Featured Post -->
                            <div class="single-featured-post">
                                <!-- Thumbnail -->
                                <div class="post-thumbnail mb-50">
                                    <img src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                    
                                </div>
                                <!-- Post Contetnt -->
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">MAY 8, 2018</a>
                                        <a href="archive.html">{{ $tl->Ten }}</a>
                                    </div>
                                    <a href="tintuc/{{ $tin1['id'] }}/{{ $tin1['TieuDeKhongDau'] }}.html" class="post-title">{{$tin1['TieuDe']}}</a>
                                    <p>{{$tin1['TomTat']}}</p>
                                </div>
                                <!-- Post Share Area -->
                                <div class="post-share-area d-flex align-items-center justify-content-between">
                                    <!-- Post Meta -->
                                    <div class="post-meta pl-3">
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <!-- Featured Video Posts Slide -->
                            <div class="featured-video-posts-slide owl-carousel">

                                <div class="single--slide">
                                    <!-- Single Blog Post -->
                                    @foreach ($data->take(5) as $tintuc)
                                        <div class="single-blog-post d-flex style-3">
                                            <div class="post-thumbnail">
                                                <img src="upload/tintuc/{{$tintuc['Hinh']}}" alt="">
                                            </div>
                                            <div class="post-content">
                                                <a href="tintuc/{{ $tintuc->id }}/{{ $tintuc->TieuDeKhongDau }}.html" class="post-title">{{$tintuc['TieuDe']}}</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ $tintuc->SoLuotXem }}</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
        <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
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
                    <h5>Thể Loại</h5>
                </div>

                <!-- Catagory Widget -->
                <ul class="catagory-widgets">
                    @foreach ($theloai as $the)
                    @if (count($the->loaitin)>0)
                         <li><a href="theloai/{{ $the->id }}/{{ $the->TenKhongDau }}.html"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $the->Ten }}</span> <span>{{ count($the->loaitin) }}</span></a></li>
                    @endif
                       
                    @endforeach
                    
                </ul>
            </div>

            <!-- Sidebar Widget -->
            <div class="single-sidebar-widget">
                <a href="#" class="add-img"><img src="img/bg-img/add2.png" alt=""></a>
            </div>

            <!-- Sidebar Widget -->
           

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
    </section>
@endsection