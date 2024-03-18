<!-- start news slider -->
<section class="block-slider-section py-5">
    <div class="container">
        <div class="section-title text-center pb-5">
            <div class="inner-text">
                <h2 class='upper-text'>{{__('admin.news')}}</h2>
                <p class="custom-character">{{$homeSectionsDescription->where('section', 'news')->first()?$homeSectionsDescription->where('section', 'news')->first()->localized:__('admin.We believe that every small step in markets will get one big jump in the future.')}}</p>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-md-4 order-md-first order-last mt-3 mt-md-0">
                <div class="main-slider-controllers">
                    <div class="prev-news-btn prev-control"><button type="button">
                            <ion-icon name="arrow-back"></ion-icon>
                        </button></div>
                    <div class="next-news-btn next-control"><button type="button">
                            <ion-icon name="arrow-forward"></ion-icon>
                        </button></div>
                </div>
            </div>
            <div class="col-md-8 p-0">
                <div class="main-slider news-slider">
                    @foreach($blogs as $blog)
                    @if($blog->localized)
                    <div class="box">
                        <div class="img">
                            <a href='{{route('blog-details',$blog->id.'-'.str_slug($blog->localized->title))}}'><img src="{{asset('uploads/'.$blog->image)}}" alt="{{$blog->localized->title}}"></a>
                        </div>
                        <div class="caption">
                            <h5 class='captital-text'><a href='{{route('blog-details',$blog->id.'-'.str_slug($blog->localized->title))}}'>{{$blog->localized->title}}</a></h5>
                            <p class="custom-character">{!! strip_tags(str_limit($blog->localized->description,80))!!}</p>
                        </div>
                        <div class="more-btn">
                            <a href="{{route('blog-details',$blog->id.'-'.str_slug($blog->localized->title))}}" class='custom-character'>{{__('admin.more')}}</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end news slider -->