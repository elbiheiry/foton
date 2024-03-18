@extends('layout.layout')

@push('title')
{{$offer->localized->title}}
@endpush

@section('page')
    <!-- start offers banner -->

    <div class="offers-banner ultimate-banner" style="{{$offer && $offer->cover?'background-image: url('.asset('uploads/'.$offer->cover).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{$offer->localized->title}}</h1>
                    {{-- <p class='w-100'>current offers and FOTON value</p> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- end offers banner -->

    <!-- start details offers section -->
    <section class="details-offer-sec mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-column">
                        <div class="our-offer">
                            <ul>
                                <li>
                                    <p class='upper-text font-weight-bolder'>{{$offer->localized->title}}</p>
                                </li>
                                <li>
                                    <div class="offer-price">{!!$offer->price!!}<sub class='font-weight-bold bottom-75'>{{\Setting::orderBy('id','desc')->first()->localized->currency}}</sub></div>
                                </li>
                                <li>
                                    <p class='custom-character w-50'>{{$offer->localized->description}}</p>
                                </li>
                                @if($offer->localized->warranty)
                                    <li><b>{{__('admin.Warranty')}}</b> : {{$offer->localized->warranty}}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @if($offer->gallery)
                    <div class="col-lg-6">
                        <div class="offer-slider-container">
                            <div class="slider-imgs">
                                @foreach($offer->gallery as $gallery)
                                <div class="item">
                                    <img class='img-fluid m-auto' src="{{asset('uploads/'.$gallery)}}" alt="{{$offer->localized->title}}">
                                </div>
                                @endforeach
                            </div>
                            <div class="prevButton"></div>
                            <div class="nextButton"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- end details offers section -->

    @if(count($moreOffers))
    <hr>

    <!-- start more offers details section -->

    <section class="block-slider-section py-5">
        <div class="container">
            <div class="text-inner mb-3">
                <h3 class="custom-character main-color">{{__('admin.more offers')}}</h3>
            </div>
            <div class="row">
                @foreach($moreOffers as $one)
                    @if($one->localized)
                        <div class="col-md-4 mb-3">
                            <div class="main-slider offers-slider">
                                <div class="box text-center">
                                    <div class="text-head">
                                        <span>{{$one->localized->title}}</span>
                                    </div>
                                    <div class="price">
                                        <h3>{{number_format($one->price)}}<sub class='font-weight-lighter'>{{\Setting::orderBy('id','desc')->first()->localized->currency}}</sub></h3>
                                    </div>
                                    <div class="img">
                                        <a href='{{route('offer-details',$one->id.'-'.str_slug($one->localized->title))}}'><img src="{{asset('uploads/'.$one->image)}}" alt="{{$one->localized->title}}"></a>
                                    </div>
                                    <div class="offer-details">
                                        <a href="{{route('offer-details',$one->id.'-'.str_slug($one->localized->title))}}">{{__('admin.details')}}</a>
                                    </div>
                                    <div class="shape"><span>{{__('admin.Drive Away')}}</span></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- end more offers details section -->
    @endif
@endsection
@push('scripts')
    <script>
        $('.slider-imgs').slick({
            autoplay: true,
            pauseOnHover: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $('.prevButton'),
            nextArrow: $('.nextButton')

        })
    </script>
@endpush
