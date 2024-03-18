@push('header')
    <div class="text-slider-wrapper">
        <div class="text-slider">
            @foreach($homeSliders as $key => $homeSlider)
                @if($homeSlider->localized != null)
                    <div class="text-slide">
                        <h1 class='slider-title'>
                            {{Str::words($homeSlider->localized->title,3,'')}}
                            <span>{{Str::replaceFirst(Str::words($homeSlider->localized->title,3,''), '', $homeSlider->localized->title)}}</span>
                        </h1>
                        @if($homeSlider->localized->description)
                            <p class='slider-description'>{{$homeSlider->localized->description}}</p>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="blocks">
        <div class="block-1"></div>
        <div class="block-2"></div>
        <div class="block-3"></div>
    </div>
    <div class="overlay"></div>
    <div class="slider-control">
        <div class="prev"><button type="button">
                <ion-icon name="arrow-back"></ion-icon>
            </button></div>
        <div class="next"><button type="button">
                <ion-icon name="arrow-forward"></ion-icon>
            </button></div>
    </div>
    <div class="image-slider">
        @foreach($homeSliders as $homeSlider)
            @if($homeSlider->localized != null)
                <div class="image-slide" style="background: url({{asset('uploads/'.$homeSlider->image)}}) no-repeat 50% 50%; background-size: cover;">
                </div>
            @endif
        @endforeach
    </div>
@endpush
