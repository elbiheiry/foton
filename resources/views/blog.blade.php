@extends('layout.layout')

@push('title')
{{$blog->localized->title}}
@endpush

@section('page')
    <!-- start blog banner -->

    <div class="ultimate-banner blog-banner" style="{{$blog && $blog->cover?'background-image: url('.asset('uploads/'.$blog->cover).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white  custom-character">
                    <h1 class='main-color'>{{$blog->localized->title}}</h1>
                    {{-- <p>subtitle is here</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end blog banner -->

    <!-- start blog-details section -->

    <div class="blog-details-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-details-box">
                        <div class="floating-date rounded">
                            @if($blog->date != null)
                                <span class='d-block'>{{date('d',strtotime($blog->date))}}</span>
                                <span class='d-block upper-text'>{{date('M',strtotime($blog->date))}}</span>
                                <span class='d-block'>{{date('Y',strtotime($blog->date))}}</span>
                            @else
                                <span class='d-block'>{{date('d',strtotime($blog->created_at))}}</span>
                                <span class='d-block upper-text'>{{date('M',strtotime($blog->created_at))}}</span>
                                <span class='d-block'>{{date('Y',strtotime($blog->created_at))}}</span>
                            @endif
                        </div>
                        <div class="img">
                            <img src="{{asset('uploads/'.$blog->image)}}" alt="{{$blog->localized->title}}">
                        </div>
                        <div class="title mb-4 mt-3">
                            <h3 class="custom-character text-white">{{$blog->localized->title}}</h3>
                        </div>
                        <div class="description">
                            {!!$blog->localized->description!!}
                        </div>
                        {{-- <div class="sahre-blog my-5 d-flex align-items-center">
                            <h5 class="custom-character text-white m-0">share :</h5>
                            <ul class="d-flex align-items-center ml-3">
                                <li><a class='fb' href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class='insta' href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a class='tw' href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a class='yout' href=""><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div> --}}
                        {{-- <div class="description">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate commodi modi harum,
                                maxime, sint similique ipsum nisi, quasi suscipit possimus reprehenderit nemo dolores
                                amet quae!</p>
                            <p>Lorem, Lorem, ipsum dolor sit amet Cupiditate commodi modi harum, maxime, sint similique
                                ipsum dolor sit amet consectetur adipisicing elit. Cupiditate commodi modi harum,
                                maxime, sint similique ipsum nisi, quasi suscipit possimus reprehenderit nemo dolores
                                amet quae!</p>
                            <p>Lorem, ipsum adipisicing elit. Cupiditate commodi modi harum, maxime, sint similique
                                ipsum nisi, quasi suscipit possimus reprehenderit nemo dolores amet quae!</p>
                            <p> ipsum nisi, quasi suscipit possimus reprehenderit nemo dolores amet quae!</p>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate commodi modi harum,
                                maxime, sint similique ipsum nisi, quasi suscipit possimus reprehenderit nemo dolores
                                amet quae!</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end blog-details section -->
@endsection
