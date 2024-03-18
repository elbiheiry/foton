@extends('layout.layout')

@push('title')
{{__('admin.Home')}}
@endpush

@section('page')

    @if(count($homeSliders))
        @include('partials.home.sliders')
    @endif

    @if(count($vehicles))
        @include('partials.home.products')

        <hr>
    @endif

    @if(count($offers))
        @include('partials.home.offers')

        <hr style="border-color:rgba(165, 165, 165,.3)">
    @endif

    @include('partials.home.highlights')

    <hr>

    @if(count($blogs))
        @include('partials.home.news')

        <hr style="border-color:rgba(165, 165, 165,.3)">
    @endif

    @if(count($events))
        @include('partials.home.events')
    @endif

@endsection

@push('scripts')
<script>

    var slickPrimary = {
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1800,
        pauseOnDotsHover: true,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        asNavFor: '.text-slider',
        centerMode: false,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    }
    var slickSecondary = {
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnDotsHover: true,
        speed: 1800,
        fade: true,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        asNavFor: '.image-slider',
        prevArrow: $('.prev'),
        nextArrow: $('.next')
    };
    var productSlider = {
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 2,
        slidesToScroll: 1,
        pauseOnHover: false,
        centerMode: true,
        speed: 1800,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        prevArrow: $('.prev-btn'),
        nextArrow: $('.next-btn'),
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },

        ]
    };
    var offersSlider = {
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 2,
        pauseOnHover: false,
        slidesToScroll: 1,
        speed: 1800,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        prevArrow: $('.prev-offers-btn'),
        nextArrow: $('.next-offers-btn'),
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },

        ]
    };
    var newsSlider = {
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 2,
        pauseOnHover: false,
        slidesToScroll: 1,
        speed: 1800,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        prevArrow: $('.prev-news-btn'),
        nextArrow: $('.next-news-btn'),
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },

        ]
    };
    var eventsSlider = {
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        pauseOnHover: false,
        slidesToScroll: 1,
        speed: 1800,
        cssEase: 'cubic-bezier(.84, 0, .08, .99)',
        prevArrow: $('.prev-events-btn'),
        nextArrow: $('.next-events-btn'),
    };

    $('.image-slider').slick(slickPrimary);
    $('.text-slider').slick(slickSecondary);
    $('.products-slider').slick(productSlider);
    $('.offers-slider').slick(offersSlider);
    $('.news-slider').slick(newsSlider);
    $('.events-slider').slick(eventsSlider);

</script>
@endpush
