<!--  start highlights  -->

<section class="highlights py-5">
    <div class="container">
        <div class="section-title text-center pb-5">
            <div class="inner-text">
                <h2 class='upper-text'>{{__('admin.highlights')}}</h2>
                <p class="custom-character">{{$homeSectionsDescription->where('section', 'highlights')->first()?$homeSectionsDescription->where('section', 'highlights')->first()->localized:__('admin.Aiming to make breakthroughs in science and technology, produce energy-saving, environmentally friendly and intelligently interconnected automobile products.')}}</p>
            </div>
        </div>
    </div>
    <div class="highlights-gallery">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-6 p-0">
                    <div class="gallery">
                        <img src="{{$firstHighlight?asset('uploads/'.$firstHighlight->image):asset('assets/img/highlights/hl-1.jpg')}}" alt="highlights">
                        <div class="highlights-details">
                            <h3 class="custom-character"><a href='{{$firstHighlight?$firstHighlight->link:route('about-foton')}}'> {{$firstHighlight?$firstHighlight->localized['title']:__('admin.Foton Motor at a glance')}}</a></h3>
                            <p class="custom-character">{{$firstHighlight?$firstHighlight->localized['description']:__('admin.A global leading commercial vehicle manufaturer driven by technology.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="gallery">
                        <img src="{{$secondHighlight?asset('uploads/'.$secondHighlight->image):asset('assets/img/highlights/hl-2.jpg')}}" alt="dealers">
                        <div class="highlights-details">
                            <h3 class="custom-character"><a href='{{$secondHighlight?$secondHighlight->link:route('about-amg')}}'> {{$secondHighlight?$secondHighlight->localized['title']:__('admin.AMG at a glance')}}</a></h3>
                            <p class="custom-character">{{$secondHighlight?$secondHighlight->localized['description']:__('admin.A global leading commercial vehicle manufaturer driven by technology.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-lg-4 col-md-6 p-0">
                    <div class="gallery">
                        <img src="{{$thirdHighlight?asset('uploads/'.$thirdHighlight->image):asset('assets/img/highlights/hl-3.jpg')}}" alt="services">
                        <div class="highlights-details">
                            <h3 class="custom-character"><a href='{{$thirdHighlight?$thirdHighlight->link:route('services')}}'> {{$thirdHighlight?$thirdHighlight->localized['title']:__('admin.services')}}</a></h3>
                            <p class="custom-character">{{$thirdHighlight?$thirdHighlight->localized['description']:__('admin.A global leading commercial vehicle manufaturer driven by technology.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-0">
                    <div class="gallery">
                        <img src="{{$forthHighlight?asset('uploads/'.$forthHighlight->image):asset('assets/img/highlights/hl-4.jpg')}}" alt="after-sale">
                        <div class="highlights-details">
                            <h3 class="custom-character"><a href='{{$forthHighlight?$forthHighlight->link:route('after-sale')}}'> {{$forthHighlight?$forthHighlight->localized['title']:__('admin.after sales')}}</a></h3>
                            <p class="custom-character">{{$forthHighlight?$forthHighlight->localized['description']:__('admin.A global leading commercial vehicle manufaturer driven by technology.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-0">
                    <div class="gallery">
                        <img src="{{$fifthHighlight?asset('uploads/'.$fifthHighlight->image):asset('assets/img/highlights/hl-5.jpg')}}" alt="blogs">
                        <div class="highlights-details">
                            <h3 class="custom-character"><a href='{{$fifthHighlight?$fifthHighlight->link:route('blogs')}}'> {{$fifthHighlight?$fifthHighlight->localized['title']:__('admin.news')}}</a></h3>
                            <p class="custom-character">{{$fifthHighlight?$fifthHighlight->localized['description']:__('admin.A global leading commercial vehicle manufaturer driven by technology.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  end highlights  -->
