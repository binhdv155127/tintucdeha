<!-- ##### Hero Area Start ##### -->
<div class="hero-area owl-carousel">
    @foreach ($slide as $item)
        <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(upload/slide/{{ $item->Hinh }});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Contetnt -->
                        <div class="post-content text-center">
                            <div class="post-meta" data-animation="fadeInUp" data-delay="100ms">
                                <a href="#">JuLY 25, 2019</a>
                                <a href="#">lifestyle</a>
                            </div>
                            <a href="#" class="post-title" data-animation="fadeInUp" data-delay="300ms">Welcome to Mag news</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Single Blog Post -->
    
</div>
<!-- ##### Hero Area End ##### -->