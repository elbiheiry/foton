@extends('layout.layout')

@push('title')
{{__('admin.events')}}
@endpush

@section('page')

    <!-- start section-title  -->

    <div class="ultimate-banner blog-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white  custom-character">
                    <h1 class='main-color'>{{__('admin.events')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- end section-title  -->

    <!-- start events -->

    <section class="events-list py-5">
        <div class="container">
            <div class="row">
                @if(count($events))
                    @foreach($events as $event)
                        @if($event->localized)
                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                            <div class="our-event border h-100">
                                <div class="img">
                                    <a href="{{route('event-details',$event->id.'-'.str_slug($event->localized->title))}}"><img class='img-fluid' src="{{asset('uploads/'.$event->image)}}" alt="{{$event->localized->title}}"></a>
                                </div>
                                <div class="event-details p-3" style="border: 0px;">
                                    <div class="title">
                                        <h4 class="custom-character"><a href="{{route('event-details',$event->id.'-'.str_slug($event->localized->title))}}">{{$event->localized->title}}</a></h4>
                                    </div>
                                    <div class="event-range d-flex flex-column justify-content-between">
                                        <p class='m-0'><i class="fa fa-calendar pr-1"></i><span>{{__('admin.from')}}</span> : {{date('d/m/Y', strtotime($event->from))}}</p>
                                        <p class='m-0'><i class="fa fa-calendar pr-1"></i><span>{{__('admin.to')}}</span> : {{date('d/m/Y', strtotime($event->to))}}</p>
                                    </div>
                                    <div class="description">
                                        <p class="custom-character"><a href="{{route('event-details',$event->id.'-'.str_slug($event->localized->title))}}">{{str_limit($event->localized->feature_description,100)}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="justify-content-center mt-4">
                {{$events->links()}}
            </div>
        </div>
    </section>

    <!-- end events -->

@endsection
