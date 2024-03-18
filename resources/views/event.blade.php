@extends('layout.layout')

@push('title')
{{$event->localized->title}}
@endpush

@section('page')
    <!-- start contact banner -->

    <div class="ultimate-banner contact-banner" style="{{$event && $event->cover?'background-image: url('.asset('uploads/'.$event->cover).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white  custom-character">
                    <h1 class='main-color'>{{$event->localized->title}}</h1>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, odio.</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end contact banner -->

    <!-- start event -->

    <section class="event-area mt-5">
        <div class="container px-5">
            <div class="section-title">
                <div class="inner-text text-center">
                    <h2 class="custom-character">{{$event->localized->title}}</h2>
                </div>
                <div class="inner-text {{$event->localized->locale == 'ar'?($event->localized->dir == 'left'?'text-right':($event->localized->dir == 'right'?'text-left':'text-center')):($event->localized->dir == 'left'?'text-left':($event->localized->dir == 'right'?'text-right':'text-center'))}}">
                    <p class="custom-character">{!!$event->localized->description!!}</p>
                </div>
            </div>
            @if($event->gallary)
                <div class="event-slider my-5">
                    <div class="slider-for">
                        @foreach($event->gallary as $gallary)
                            <div class="item">
                                <img src="{{asset('uploads/'.$gallary)}}" alt="{{$event->localized->title}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach($event->gallary as $gallary)
                            <div class="item">
                                <img src="{{asset('uploads/'.$gallary)}}" alt="{{$event->localized->title}}">
                            </div>
                        @endforeach
                    </div>
                    <button class="PrevArrowBtn">
                        <ion-icon name='arrow-back'></ion-icon>
                    </button>
                    <button class="NextArrowBtn">
                        <ion-icon name='arrow-forward'></ion-icon>
                    </button>
                </div>
            @endif
        </div>
    </section>

    <!-- end event -->
@endsection
@push('scripts')
    <script>
        $('.slider-for').slick({
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            mobileFirst: true,
            asNavFor: '.slider-nav',
            pauseOnHover: false,
            pauseOnFocus: false,
            arrows: false,
            focusOnSelect: true,
        });
        $('.slider-nav').slick({
            autoplay: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            mobileFirst: true,
            asNavFor: '.slider-for',
            pauseOnFocus: false,
            pauseOnHover: false,
            focusOnSelect: true,
            centerMode: true,
            prevArrow: '.PrevArrowBtn',
            nextArrow: '.NextArrowBtn'
        });
    </script>
@endpush
