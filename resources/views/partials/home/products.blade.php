<!-- start product slider -->

<section class="block-slider-section py-5">
    <div class="container">
        <div class="section-title text-center pb-5">
            <div class="inner-text">
                <h2 class=' upper-text'>{{__('admin.FOTON PRODUCTS')}}</h2>
                <p class='custom-character'>{{$homeSectionsDescription->where('section', 'products')->first()?$homeSectionsDescription->where('section', 'products')->first()->localized:__('admin.With all series commercial vehicle business, Foton Motor has been one of leading commercial vehicle manufacturer in the world.')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 order-sm-first order-last">
                <div class="main-slider-controllers">
                    <div class="prev-btn prev-control"><button type="button">
                            <ion-icon name="arrow-back"></ion-icon>
                        </button></div>
                    <div class="next-btn next-control"><button type="button">
                            <ion-icon name="arrow-forward"></ion-icon>
                        </button></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="main-slider products-slider">
                    @foreach($vehicles as $vehicle)
                        @if($vehicle->localized)
                            <div class="box text-center">
                                <div class="img">
                                    <a href="{{route('vehicle-details',$vehicle->id.'-'.str_slug($vehicle->localized->title))}}"><img src="{{asset('uploads/'.$vehicle->image)}}" alt="{{$vehicle->localized->title}}"></a>
                                </div>
                                <div class="caption">
                                    <h5 class="title upper-text">
                                        <a href='{{route('vehicle-details',$vehicle->id.'-'.str_slug($vehicle->localized->title))}}'>{{$vehicle->localized->title}}</a>
                                    </h5>
                                    <p class="subtitle custom-character">{{$vehicle->localized->featured_description}}</p>
                                </div>
                                <div class="overlay">
                                    <a href="{{route('vehicle-details',$vehicle->id.'-'.str_slug($vehicle->localized->title))}}">{{__('admin.details')}}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end product slider -->
