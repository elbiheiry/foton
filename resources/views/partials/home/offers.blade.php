<!-- start offers slider -->
<section class="block-slider-section py-5">
    <div class="container">
        <div class="section-title text-center pb-5">
            <div class="inner-text">
                <h2 class='upper-text'>{{__('admin.offers')}}</h2>
                <p class='custom-character'>{{$homeSectionsDescription->where('section', 'offers')->first()?$homeSectionsDescription->where('section', 'offers')->first()->localized:__('admin.good price')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="main-slider offers-slider">
                    @foreach($offers as $offer)
                        @if($offer->localized)
                            <div class="box text-center">
                                <div class="text-head">
                                    <span>{{$offer->localized->title}}</span>
                                </div>
                                <div class="price">
                                    {!!$offer->price!!}
                                </div>
                                <p class="bottom-75">{{\Setting::orderBy('id','desc')->first()->localized->currency}}</p>
                                <div class="img">
                                    <a href='{{route('offer-details',$offer->id.'-'.str_slug($offer->localized->title))}}'><img src="{{asset('uploads/'.$offer->image)}}" alt="{{$offer->localized->title}}"></a>
                                </div>
                                <div class="offer-details">
                                    <a href="{{route('offer-details',$offer->id.'-'.str_slug($offer->localized->title))}}">{{__('admin.details')}}</a>
                                </div>
                                <div class="shape"><span>{{__('admin.Drive Away')}}</span></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-4">
                <div class="main-slider-controllers">
                    <div class="prev-offers-btn prev-control"><button type="button">
                            <ion-icon name="arrow-back"></ion-icon>
                        </button></div>
                    <div class="next-offers-btn next-control"><button type="button">
                            <ion-icon name="arrow-forward"></ion-icon>
                        </button></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end offers slider -->
