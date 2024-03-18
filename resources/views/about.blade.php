@extends('layout.layout')

@push('title')
{{__('admin.About')}}
@endpush

@section('page')
    <!-- starabout banner -->

    <div class="ultimate-banner about-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{__('admin.about us')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end about banner -->

    <!-- start about page -->

    <div class="about-page py-5">
        <div class="container">
            <div class="row align-items-center mt-5">
                @if($about->slug == 'amg' || $about->slug == 'tvd')
                <div class="col-lg-6 mb-4">
                    <div class="img">
                        <img src="{{asset('uploads/'.$about->image)}}" alt="{{$about->localized->title}}">
                    </div>
                </div>
                @endif
                <div class="col-lg-6 mb-4">
                    <div class="about-title mb-3 ml-5">
                        <h2 class="custom-character main-color">{{$about->localized->title}}</h2>
                    </div>
                    <div class="description">
                        {!! $about->localized->description !!}
                    </div>
                </div>
                @if($about->slug == 'foton')
                <div class="col-lg-6 mb-4">
                    <div class="img">
                        <img src="{{asset('uploads/'.$about->image)}}" alt="{{$about->localized->title}}">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- end about page -->
@endsection
