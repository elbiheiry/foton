@extends('layout.layout')

@push('title')
{{$vehicle->localized->title}}
@endpush

@section('page')
    <!-- start vehicles-hero-section  -->

    @if(count($vehicle->vehicleSliders))
        <div class="vehicles-hero-section">
            <div class="hero-vehicles-slider">
                @foreach($vehicle->vehicleSliders as $slider)
                    @if($slider->localized)
                        <div class="box text-center">
                            <div class="img">
                                <a href="#"><img src="{{asset('uploads/'.$slider->image)}}" alt="{{$slider->localized->title}}"></a>
                            </div>
                            <div class="caption">
                                <h2 class="title upper-text">{{$slider->localized->title}}</h2>
                                <p class="subtitle custom-character">{{$slider->localized->description}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="slider-control">
                <div class="prev"><button type="button">
                        <ion-icon name="arrow-back"></ion-icon>
                    </button></div>
                <div class="next"><button type="button">
                        <ion-icon name="arrow-forward"></ion-icon>
                    </button></div>
            </div>
        </div>
    @endif

    <!-- end vehicles-hero-section -->

    <!-- start vehicles details section -->

    <div class="vehicles-details-section pt-5">
        <div class="container">
            <div class="section-title-details {{$vehicle->localized->locale == 'ar'?($vehicle->localized->dir == 'left'?'text-right':($vehicle->localized->dir == 'right'?'text-left':'text-center')):($vehicle->localized->dir == 'left'?'text-left':($vehicle->localized->dir == 'right'?'text-right':'text-center'))}}">
                <div class="text-inner">
                    <h3 class='upper-text main-color'>{{$vehicle->localized->title}}</h3>
                    <p class='custom-character'>{!!$vehicle->localized->description!!}</p>
                </div>
            </div>
            @if(count($vehicle->vehicleModels))
            <div class="slideshow my-5">
                <div class="details-slider">
                    @foreach($vehicle->vehicleModels as $model)
                        @if($model->localized)
                            <div class="item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 text-center">
                                        <div class="img"><img src="{{asset('uploads/'.$model->image)}}" alt='{{$model->localized->title}}' /></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="details">
                                            <h5 class='upper-text'>{{$model->localized->title}}</h5>
                                            @if(count($model->specs))
                                                <ul class='custom-character'>
                                                    @foreach($model->specs as $spec)
                                                        <li><b>{{$spec->spec->localized->title}}:</b> {{$spec->localized}}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="controllers">
                    <div class="prevArrow">
                        <button type="button">
                            <ion-icon name="ios-arrow-back"></ion-icon>
                        </button>
                    </div>
                    <div class="nextArrow">
                        <button type="button">
                            <ion-icon name="ios-arrow-forward"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- end vehicles details section -->
@endsection
@push('scripts')
    <script>

        var heroVehiclesSlider = {
            autoplay: true,
            autoplaySpeed: 2400,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 1800,
            pauseOnHover: false,
            cssEase: 'cubic-bezier(.84, 0, .08, .99)',
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
        };
        var vehiclesDetailsSlider = {
            autoplay: true,
            dots: true,
            customPaging: function () {
                return '<span class="dot"><img src=""></span>';
            },
            speed: 900,
            pauseOnHover: false,
            cssEase: 'cubic-bezier(.84, 0, .08, .99)',
            prevArrow: $('.prevArrow'),
            nextArrow: $('.nextArrow'),
        };

        $('.hero-vehicles-slider').slick(heroVehiclesSlider);
        $('.details-slider').slick(vehiclesDetailsSlider);


        var slides = Array.from($('.details-slider .slick-slide'));
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
