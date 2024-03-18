@extends('layout.layout')

@push('title')
{{__('admin.Videos Gallary')}}
@endpush

@push('head')
    <link rel="stylesheet" href="{{asset('assets/vendors/venobox.css')}}">
@endpush

@section('page')
    <!-- start videos banner -->

    <div class="ultimate-banner videos-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{__('admin.videos')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end videos banner -->

    <!--  start videos section  -->

    <section class="videos-gallery py-5">
        <div class="container">
            <div class="row mt-5">
                @if(count($videosGallaries))
                    @foreach($videosGallaries as $videosGallary)
                        @if($videosGallary->localized)
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                <div class="video-box">
                                    <div class="video" style="background-image: url({{asset('uploads/'.$videosGallary->image)}});">
                                        <a class="venobox" data-autoplay="true" title="{{$videosGallary->localized->title}}" data-gall="myGallery"
                                            data-vbtype="video" href="{{$videosGallary->video_url}}">
                                            <i class="fas fa-play-circle"></i>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h6 class="custom-character">{{$videosGallary->localized->title}}</h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>/
            <div class="justify-content-center mt-4">
                {{$videosGallaries->links()}}
            </div>
        </div>
    </section>

    <!--  end videos section  -->
@endsection
@push('scripts')
    <script src="{{asset('assets/js/venobox.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.venobox').venobox({
                framewidth: '50%',
                frameheight: '350px'
            });
        });
    </script>
@endpush
