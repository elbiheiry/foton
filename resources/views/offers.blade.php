@extends('layout.layout')

@push('title')
{{__('admin.offers')}}
@endpush

@section('page')
    <!-- start offers banner -->

    <div class="offers-banner ultimate-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{__('admin.offers')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end offers banner -->

    <!-- start offers section -->
    <section class="block-slider-section py-5">
        <div class="container">
            <div class="row">
                @if(count($offers))
                    @foreach($offers as $offer)
                        @if($offer->localized)
                            <div class="col-md-4 mb-3">
                                <div class="main-slider offers-slider">
                                    <div class="box text-center">
                                        <div class="text-head">
                                            <span>{{$offer->localized->title}}</span>
                                        </div>
                                        <div class="price">
                                            <h3>{!!$offer->price!!}<sub>{{\Setting::orderBy('id','desc')->first()->localized->currency}}</sub></h3>
                                        </div>
                                        <div class="img">
                                            <a href='{{route('offer-details',$offer->id.'-'.str_slug($offer->localized->title))}}'><img src="{{asset('uploads/'.$offer->image)}}" alt="{{$offer->localized->title}}"></a>
                                        </div>
                                        <div class="offer-details">
                                            <a href="{{route('offer-details',$offer->id.'-'.str_slug($offer->localized->title))}}">{{__('admin.details')}}</a>
                                        </div>
                                        <div class="shape"><span>{{__('admin.Drive Away')}}</span></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="justify-content-center mt-4">
                {{$offers->links()}}
            </div>
        </div>
    </section>
    <!-- end offers section -->
@endsection
