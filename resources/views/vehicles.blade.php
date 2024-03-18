@extends('layout.layout')

@push('title')
{{__('admin.Vehicles')}}
@endpush

@section('page')
    <!-- start vehicles-hero-section  -->
    @if(count($vehicleTypeSliders))
    <div class="vehicles-hero-section">
        <div class="hero-vehicles-slider">
            @foreach($vehicleTypeSliders as $slider)
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

    <!-- start vehiclies-list -->
    <div class="vehiclies-list my-5">
        <div class="container">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-all">{{__('admin.all')}}</a></li>
                    @if(count($vehicleTypes))
                        @foreach($vehicleTypes as $key => $vehicleType)
                            @if($vehicleType->localized)
                                <li><a href="#tabs-{{$key}}">{{$vehicleType->localized->title}}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
                <div id="tabs-all">
                    <div class="row mt-3">
                        @if(count($vehicleTypes))
                            @foreach($vehicleTypes as $vehicleType)
                                @if($vehicleType->localized && count($vehicleType->vehicles))
                                    @foreach($vehicleType->vehicles as $vehicle)
                                        @if($vehicle->localized && $vehicle->active)
                                            <div class="col-xl-4 col-md-6">
                                                <div class="vehicle">
                                                    <div class="img">
                                                        <img src='{{asset('uploads/'.$vehicle->image)}}' alt='{{$vehicle->localized->title}}'>
                                                    </div>
                                                    <div class="caption">
                                                        <h4 class='custom-character'>{{$vehicle->localized->title}}</h4>
                                                        <span>{{$vehicle->localized->featured_description}}</span>
                                                    </div>
                                                    <div class="details">
                                                        <a href="{{route('vehicle-details',$vehicle->id.'-'.str_slug($vehicle->localized->title))}}">{{__('admin.details')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(count($vehicleTypes))
                    @foreach($vehicleTypes as $key => $vehicleType)
                        @if($vehicleType->localized && count($vehicleType->vehicles))
                            <div id="tabs-{{$key}}">
                                <div class="row mt-3">
                                    @foreach($vehicleType->vehicles as $vehicle)
                                        @if($vehicle->localized && $vehicle->active)
                                            <div class="col-xl-4 col-md-6">
                                                <div class="vehicle">
                                                    <div class="img">
                                                        <img src='{{asset('uploads/'.$vehicle->image)}}' alt='{{$vehicle->localized->title}}'>
                                                    </div>
                                                    <div class="caption">
                                                        <h4 class='custom-character'>{{$vehicle->localized->title}}</h4>
                                                        <span>{{$vehicle->localized->featured_description}}</span>
                                                    </div>
                                                    <div class="details">
                                                        <a href="{{route('vehicle-details',$vehicle->id.'-'.str_slug($vehicle->localized->title))}}">{{__('admin.details')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- end vehiclies-list -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
            $("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
        });

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

        $('.hero-vehicles-slider').slick(heroVehiclesSlider);

    </script>
@endpush
