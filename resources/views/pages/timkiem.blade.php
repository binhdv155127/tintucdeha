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
                        <li class="breadcrumb-item"><a href="">tìm kiếm</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
       <?php 
            function doimau($str,$tukhoa){
                return str_replace($tukhoa,"<span style='color:red;'>$tukhoa</span>",$str);
            }
       ?>
<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

                    <!-- Single Catagory Post -->
                    @foreach ($tintuc as $tt)
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url(upload/tintuc/{{ $tt->Hinh }});">
                            
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">MAY 8, 2018</a>
                                    <a href="archive.html">{{ $tt->loaitin->Ten }}</a>
                                </div>
                                <a href="tintuc/{{ $tt->id }}/{{ $tt->TieuDeKhongDau }}.html" class="post-title"> {!! doimau($tt->TieuDe,$tukhoa) !!}</a>
                                <!-- Post Meta -->
                                <div class="post-meta-2">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 1034</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 834</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 234</a>
                                </div>
                                <p>{{ $tt->TomTat }}</p>
                            </div>
                        </div>
                    @endforeach
                   

                    <!-- Pagination -->  
                            <li class="page-item">{{ $tintuc->links() }}</li>
                </div>
            </div>

            @include('layout.danhmuc')
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->
@endsection