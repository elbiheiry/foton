@extends('layout.layout')

@push('title')
{{__('admin.Images Gallery')}}
@endpush

@section('page')
    <!-- start gallery banner -->

    <div class="ultimate-banner gallery-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{__('admin.Gallery')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery banner -->

    <!--  start gallery section  -->

    <section class="images-gallery py-5">
        <div class="container">
            <div class="row mt-5">
                @if(count($imagesGallaries))
                    @foreach($imagesGallaries as $imagesGallary)
                        @if($imagesGallary->localized)
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                <div class="image-box h-100">
                                    <div class="image">
                                        <a href="{{route('images-gallary-details',$imagesGallary->id.'-'.str_slug($imagesGallary->localized->title))}}"><img src="{{asset('uploads/'.$imagesGallary->image)}}" alt="{{$imagesGallary->localized->title}}"></a>
                                    </div>
                                    <div class="caption">
                                        <h6 class="custom-character">{{$imagesGallary->localized->title}}</h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="justify-content-center mt-4">
                {{$imagesGallaries->links()}}
            </div>
        </div>
    </section>

    <!--  end gallery section  -->
@endsection
