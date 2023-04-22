<section class="container mb-5 pt-md-4">
    <div class="d-flex flex-sm-row flex-column align-items-center justify-content-between mb-4 pb-1 pb-md-3">
        <h2 class="h1 mb-sm-0">Videos Relacionados</h2>
    </div>


    @if($videos != null)
    <div class="swiper mySwiper">
        <div class="swiper-wrapper  gallery" data-video="true">
            @foreach($videos as $video)
            <div class="swiper-slide">
                <div class=" h-auto pb-3 swiper-slide-active" role="group" style="width: 306px; margin-right: 24px;">
                    <article>
                        <div class="d-block position-relative rounded-3 mb-3">
                            <div class="position-relative">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->id }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Digital</a>
                            <span class="fs-sm text-muted border-start ps-3 ms-3">2 hours ago</span>
                        </div>
                        <h3 class="h5">
                            <a href="#">{{ $video->snippet->title }}</a>
                        </h3>
                        <div class="d-flex align-items-center text-muted">
                            <div class="d-flex align-items-center me-3">
                                <i class="bx bx-like fs-lg me-1"></i>
                                <span class="fs-sm">{{ $video->statistics->likeCount }}</span>
                            </div>
                            <div class="d-flex align-items-center me-3">
                                <i class="bx bx-comment fs-lg me-1"></i>
                                <span class="fs-sm">{{ $video->statistics->commentCount }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bx-share-alt fs-lg me-1"></i>
                                <span class="fs-sm">0</span>
                            </div>
                        </div>
                        <a href="blog-podcast.html" class="btn btn-link px-0 mt-3">
                            <i class="bx bx-play-circle fs-lg me-2"></i>
                            Listen now
                        </a>
                    </article>
                </div>
            </div>

            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    @endif

    <button class="btn btn-icon btn-secondary btn-youtube" wire:click="searchYoutube">
        <i class="bx bxl-youtube"></i>
    </button>

    <!-- Initialize Swiper -->
    @if($videos != null)
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    @endif
</section>