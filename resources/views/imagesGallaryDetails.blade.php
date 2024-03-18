@extends('layout.layout')

@push('title')
{{$ImagesGallary->localized->title}}
@endpush

@section('page')
    <!-- start gallery banner -->

    <div class="ultimate-banner gallery-banner" style="{{$ImagesGallary && $ImagesGallary->cover?'background-image: url('.asset('uploads/'.$ImagesGallary->cover).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{$ImagesGallary->localized->title}}</h1>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, odio.</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery banner -->

    <!--  start view gallery section  -->

    <section class="view-gallery py-5">
        <div class="container px-5">
            <div class="row align-items-center mb-5">
                <div class="col-12">
                    <div class="img">
                        <img src="{{asset('uploads/'.$ImagesGallary->image)}}" alt="{{$ImagesGallary->localized->title}}">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="title">
                        <h3 class="custom-character">{{$ImagesGallary->localized->title}}</h3>
                    </div>
                    <!--<div class="date"><i class="far fa-clock"></i> <span>{{date('d/m/Y', strtotime($ImagesGallary->created_at))}}</span></div>-->
                </div>
                <div class="col-lg-6 mt-5">
                    <div class="desc">
                        <p>{{$ImagesGallary->localized->description}}</p>
                    </div>
                </div>
                @if($ImagesGallary->gallary)
                <div class="col-lg-6 mt-5">
                    <div class="view-gallery-slider text-center">
                        @foreach($ImagesGallary->gallary as $gallary)
                            <div class="item">
                                <img src="{{asset('uploads/'.$gallary)}}" alt="{{$ImagesGallary->localized->title}}">
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!--  end view gallery section  -->
@endsection
@push('scripts')
    <script>
        $('.view-gallery-slider').slick({
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            customPaging: function () {
                return '<span class="dot"><img src=""></span>';
            },
            speed: 900,
            pauseOnHover: false,
            cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        })
        var slides = Array.from($('.view-gallery-slider .slick-slide'));
        var slideImg = [];
        var dotImg = Array.from($('.dot > img'));

        slides.forEach((el) => {
            if (!el.classList.contains('slick-cloned')) {
                let slide = el.getElementsByClassName('item')[0];
                let img = slide.getElementsByTagName('img')[0];
                slideImg.push(img);
            }
        });

        dotImg.forEach((el, index) => {
            let i = index;
            let src = slideImg[i].getAttribute('src');

            el.setAttribute('src', src);
        });
    </script>
@endpush
