<header class="header-area">
 <!-- Navbar Area -->
 <div class="mag-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="magNav">

            <!-- Nav brand -->
            <a href="trangchu" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Nav Content -->
            <div class="nav-content d-flex align-items-center">
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li class="active"><a href="trangchu">Home</a></li>
                            {{-- <li><a href="archive.html">Archive</a></li> --}}
                            <li><a href="#">Thể Loại</a>
                                <ul class="dropdown">
                                    @foreach ($theloai as $tl)
                                         <li><a href="theloai/{{ $tl->id }}/{{ $tl->TenKhongDau }}.html">{{ $tl->Ten }}</a></li>
                                    @endforeach
                                   
                                </ul>
                            </li>
                            <li><a href="about">About</a></li>
                            <li><a href="lienhe">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>

                <div class="top-meta-data d-flex align-items-center">
                    <!-- Top Search Area -->
                    <div class="top-search-area">
                        <form action="timkiem" method="post">
                            @csrf
                            <input type="text" name="tukhoa" id="topSearch" placeholder="Tìm Kiếm">
                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <!-- Login -->
                    @if (Auth::user())
                        <a href="nguoidung" class="login-btn"><i class="fa fa-user" aria-hidden="true"> {{ Auth::user()->name }}</i></a>
                        <a href="dangxuat" class="login-btn"><i class="fa fa-user" aria-hidden="true"> đăng xuất</i></a>
                     
                    @else
                        <a href="dangnhap" class="login-btn"><i class="fa fa-user" aria-hidden="true"> đăng nhập</i></a>
                        <a href="dangky" class="login-btn"><i class="fa fa-user" aria-hidden="true"> đăng ký</i></a>
                        
                    @endif
                   
                    {{-- <a href="submit-video.html" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Submit Video</span></a> --}}
                </div>
            </div>
        </nav>
    </div>
</div>
</header>