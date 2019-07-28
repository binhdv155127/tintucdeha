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
                <h5>Categories</h5>
            </div>

            <!-- Catagory Widget -->
            <ul class="catagory-widgets">
                @foreach ($theloai as $item)
                    <li><a href="theloai/{{ $item->id }}/{{ $item->TenKhongDau }}.html"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $item->Ten }}</span> <span>{{ count($item->loaitin) }}</span></a></li>
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