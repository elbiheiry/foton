<!--  start events section  -->

<section class="block-slider-section events pt-5">
    <div class="container">
        <div class="section-title text-center pb-5">
            <div class="inner-text">
                <h2 class='upper-text'>{{__('admin.events')}}</h2>
                <p class="custom-character">{{$homeSectionsDescription->where('section', 'events')->first()?$homeSectionsDescription->where('section', 'events')->first()->localized:__('admin.Showing highlights of our various marketing activities and events.')}}</p>
            </div>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="main-slider events-slider">
                @foreach($events as $event)
                    @if($event->localized)
                        <div class="events-box">
                            <img src="{{asset('uploads/'.$event->image)}}" alt="{{$event->localized->title}}">
                            <div class="caption">
                                <h2 class="custom-character text-white"><a href="{{route('event-details',$event->id.'-'.str_slug($event->localized->title))}}">{{$event->localized->title}}</a></h2>
                                <a href="{{route('event-details',$event->id.'-'.str_slug($event->localized->title))}}" class="custom-character text-white">{!!str_limit($event->localized->feature_description,255)!!}</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="slider-control">
                <div class="prev-events-btn"><button type="button">
                        <ion-icon name="arrow-back"></ion-icon>
                    </button></div>
                <div class="next-events-btn"><button type="button">
                        <ion-icon name="arrow-forward"></ion-icon>
                    </button></div>
            </div>
        </div>
    </div>
</section>
<!--  end events section  -->
