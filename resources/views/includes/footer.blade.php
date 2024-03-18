@php
$footer_fetures = \App\Models\FooterFeture::get();
@endphp
<!-- start footer -->
<footer class='pt-5'>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1">
                <div class="foton-footer-area">
                    <div class="logo">
                        <a href="{{route('about-foton')}}"><img src="{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->footer_image)}}" alt="logo"></a>
                    </div>
                    @if(count(\Setting::orderBy('id','desc')->first()->contacts))
                    <a href='' class='call-center'> {{__('admin.Call Us')}} :
                        @foreach(\Setting::orderBy('id','desc')->first()->contacts as $key => $contact)
                        @if($contact->field == 'callCenter')
                        <span>{{str_replace('_','',$contact->phone)}} {{$key < (count(\Setting::orderBy('id','desc')->first()->contacts)-1)?',':''}}</span>
                        @endif
                        @endforeach
                    </a>
                    @endif
                </div>
                <hr class='d-block d-md-none mx-5' style='border-color:rgba(255, 255, 255, .07)'>
            </div>
            <div class="col-lg-6 order-lg-2">
                <div class="side-column">
                    <div class="row mt-3 mt-md-0">
                        @if(count($footer_fetures) > 0)
                        @foreach($footer_fetures as $feature)
                        <div class="col-md-6">
                            <div class="item d-flex ml-5 ml-md-0 mb-3">
                                <div class="img">
                                    <a href="@if(!is_null($feature->link)){{$feature->link}}@else # @endif">
                                        <img src="{{asset($feature->icon)}}" class='img-fluid' alt="{{!empty($feature->localized) ? $feature->localized->title : ''}}">
                                    </a>

                                </div>
                                <div class="text-box ml-3">
                                    <a href="@if(!is_null($feature->link)){{$feature->link}}@else # @endif">
                                        <h6 class='title-box'>{{!empty($feature->localized) ? $feature->localized->title : ""}}</h6>
                                        <p>{{!empty($feature->localized) ? $feature->localized->description : ""}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-6">
                            <div class="item d-flex ml-5 ml-md-0 mb-3">
                                <div class="img">
                                    <img src="{{asset('assets/img/footer/about.png')}}" class='img-fluid' alt="about">
                                </div>
                                <div class="text-box ml-3">
                                    <a href="{{route('about-foton')}}">
                                        <h6 class='title-box'>{{__('admin.ABOUT US')}}</h6>
                                        <p>{{__('admin.Technology leading into the future.')}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item d-flex ml-5 ml-md-0 mb-3">
                                <div class="img">
                                    <img src="{{asset('assets/img/footer/models.png')}}" class='img-fluid' alt="models">
                                </div>
                                <div class="text-box ml-3">
                                    <a href="{{route('vehicles')}}">
                                        <h6 class='title-box'>{{__('admin.MODELS')}}</h6>
                                        <p>{{__('admin.Best seller models in Egypt.')}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item d-flex ml-5 ml-md-0 mb-3">
                                <div class="img">
                                    <img src="{{asset('assets/img/footer/newsletter.png')}}" class='img-fluid' alt="newsletter">
                                </div>
                                <div class="text-box ml-3">
                                    <a href="{{route('blogs')}}">
                                        <h6 class='title-box'>{{__('admin.NEWS')}}</h6>
                                        <p>{{__('admin.Check our latest news')}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item d-flex ml-5 ml-md-0 mb-3">
                                <div class="img">
                                    <img src="{{asset('assets/img/footer/app.png')}}" alt="app" class='img-fluid'>
                                </div>
                                <div class="text-box">
                                    {{-- <a href="#" id='under-const'> --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn text-left" style='box-shadow: none' data-toggle="modal" data-target="#exampleModal">
                                        <h6 class='title-box'>{{__('admin.APP')}}</h6>
                                        <p>{{__('admin.To be continued.')}}</p>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <img src="{{asset('assets/img/under-construction.jpg')}}" class='img-fluid' alt="">
                                        </div>
                                    </div>
                                    {{-- </a> --}}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- <div class="col-lg-3"> --}}
                    {{-- <div class="side-column"> --}}

                </div>
                <hr class='d-block d-md-none mx-5 mb-4' style='border-color:rgba(255, 255, 255, .07)'>
            </div>
            <div class="col-lg-3 order-lg-3 order-4">
                <div class="amg-area text-center">
                    <a href="{{route('about-amg')}}" class='d-block amg-root text-center m-auto'>
                        <!--<img class='img-fluid mb-3 amg-footer-logo' src="{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->amg_logo)}}" alt="logo"></a>-->
                        @if(app()->getLocale() == 'en')
                            <img class="img-fluid mb-3 amg-footer-logo" src="{{asset('uploads/logo final-01.png')}}"  alt="TVD" style="width: 190px;">
                        @else
                            <img class="img-fluid mb-3 amg-footer-logo" src="{{asset('uploads/logo final-02.png')}}"  alt="TVD" style="width: 190px;">
                            <!--<a href='{{route('home')}}'><img class="logo-2" src="{{asset('uploads/logo final-02.png')}}" alt="TVD"></a>-->
                        @endif
                    <div class="text" hidden>
                        <p class='text-capitalize text-center'>{{__('admin.Authorized distributor for FOTON commercial vehicles in Egypt')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 order-lg-4 order-3">
                @if(\Setting::orderBy('id','desc')->first()->e_brochure)
                <div class="side-column">
                    <div class="item d-flex my-lg-3 my-0 justify-content-center">
                        <div class="img">
                            <i class="fas fa-book-open fa-lg" style="color: white;"></i>
                        </div>
                        <div class="text-box ml-3">
                            <a target="_blank" href="{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->e_brochure)}}">
                                <h6 class='title-box'>{{__('admin.e-Brochure')}}</h6>
                            </a>
                        </div>
                    </div>
                    <hr class='d-block d-md-none mx-5 mb-4' style='border-color:rgba(255, 255, 255, .07)'>
                </div>
                @endif
                @if(count(\Setting::orderBy('id','desc')->first()->socialMedia))
                <div class="social-links d-block d-lg-none">
                    <ul class='d-flex align-items-center justify-content-center'>
                        @foreach(\Setting::orderBy('id','desc')->first()->socialMedia as $one)
                        <li><a href="{{$one->link}}" title="{{$one->title}}" target="_blank"><i class="fab {{$one->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <hr class='d-block d-md-none mx-5 mb-4' style='border-color:rgba(255, 255, 255, .07)'>
            </div>
        </div>
        <div class="rights text-center">
            <p class='m-0 p-0'>© {{__('admin.2019 Foton Motor Group. All Rights Reserved. Developed By')}}
                <a href="https://icons-agency.com"><strong>{{__('admin.ICONS')}}</strong></a>
            </p>
        </div>
    </div>
</footer>
<!-- end footer -->