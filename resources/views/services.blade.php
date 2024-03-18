@extends('layout.layout')

@push('title')
{{__('admin.services')}}
@endpush

@section('page')
    <!-- start services banner -->

    <div class="ultimate-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{__('admin.total care')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end services banner -->

    <!-- start services section -->

    <div class="services-section py-5">
        <div class="container">
            <div class="title-section">
                <div class="inner-text text-center">
                    <h2 class='main-color custom-character'>{{__('admin.Foton TotaL care')}}</h2>
                    <p class='w-50 m-auto'>{{__('admin.Creating comprehensive, carrying personalized and professional services for client.')}}</p>
                </div>
            </div>
            <hr>
            @if(\Setting::orderBy('id','desc')->first()->services_main_img && \Setting::orderBy('id','desc')->first()->localized->services_main_desc)
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="img">
                        <img class='img-fluid' src='{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->services_main_img)}}' alt='' />
                    </div>
                </div>
                <div class="col-md-6">
                    <p>{{\Setting::orderBy('id','desc')->first()->localized->services_main_desc}}</p>
                </div>
            </div>
            <hr>
            @endif
            <div class="row pt-5">
                @if(count($services))
                    @foreach($services as $service)
                        @if($service->localized)
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service">
                                    <div class="icon text-center"><img class='img-fluid' src='{{asset('uploads/'.$service->icon)}}' alt='{{$service->localized->title}}' />
                                    </div>
                                    <div class="title-service">
                                        <h5 class='main-color custom-character text-center'>{{$service->localized->title}}</h5>
                                    </div>
                                    <div class="description mt-3">
                                        <p>{{$service->localized->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="justify-content-center mt-4">
                {{$services->links()}}
            </div>
        </div>
    </div>
    <!-- end services section -->
@endsection
