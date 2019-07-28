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
                            <li class="breadcrumb-item"><a href="trangchu"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="theloai/{{ $tintuc1->loaitin->theloai->id }}/{{ $tintuc1->loaitin->theloai->TenKhongDau }}.html">{{ $tintuc1->loaitin->theloai->Ten }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="loaitin/{{ $tintuc1->loaitin->id }}/{{ $tintuc1->loaitin->TenKhongDau }}.html">{{ $tintuc1->loaitin->Ten }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bài Viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-xl-8">
                    <div class="post-details-content bg-white mb-30 p-30 box-shadow">
                        <div class="blog-thumb mb-30">
                            <img src="upload/tintuc/{{ $tintuc1->Hinh }}" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <a href="#">MAY 8, 2018</a>
                                <a href="loaitin/{{ $tintuc1->loaitin->id }}/{{ $tintuc1->loaitin->TenKhongDau }}.html">{{ $tintuc1->loaitin->Ten }}</a>
                            </div>
                            <h4 class="post-title">{{ $tintuc1->TieuDe }}</h4>
                            <!-- Post Meta -->
                            <div class="post-meta-2">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{ $tintuc1->SoLuotXem }}</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                            </div>

                            <p>
                                {{ $tintuc1->NoiDung }}
                            </p>
                            <!-- Like Dislike Share -->
                            <div class="like-dislike-share my-5">
                                <h4 class="share">240<span>Share</span></h4>
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a>
                            </div>

                           
                        </div>
                    </div>

                    <!-- Related Post Area -->
                    <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Tin Liên Quan</h5>
                        </div>

                        <div class="row">
                            <!-- Single Blog Post -->
                            @foreach ($tinlienquan as $item)
                                <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-post style-4 mb-30">
                                    <div class="post-thumbnail">
                                        <img src="upload/tintuc/{{ $item->Hinh }}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="tintuc/{{ $item->id }}/{{ $item->TieuDeKhongDau }}.html" class="post-title">{{ $item->TieuDe }}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                           
                           

                        </div>
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix bg-white mb-30 p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>COMMENTS</h5>
                        </div>

                        <ol>
                            <!-- Single Comment Area -->
                            @foreach ($tintuc1->comment as $cm)
                                <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="img/bg-img/53.jpg" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="comment-date">{{ $cm->created_at }}</a>
                                        <h6>{{ $cm->user->name }}</h6>
                                        <p>{{ $cm->NoiDung }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="like">like</a>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                        </ol>
                    </div>

                    <!-- Post A Comment Area -->
                    <div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Comment</h5>
                        </div>

                        <!-- Reply Form -->
                        @if (Auth::user())
                            <div class="contact-form-area">
                                <form action="comment/{{ $tintuc1->id }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <textarea class="form-control" name="NoiDung" id="message" cols="30" rows="10" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn mag-btn mt-30" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                       
                    </div>
                </div>

                @include('layout.danhmuc')
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->
@endsection