@extends('layout.layout')

@push('title')
{{__('admin.news')}}
@endpush

@section('page')

    <!-- start blog banner -->

    <div class="ultimate-banner blog-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white  custom-character">
                    <h1 class='main-color'>{{__('admin.news')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog banner -->

    <!-- start blog section -->

    <div class="blog-section py-5">
        <div class="container">
            <div class="row">
                @if(count($blogs))
                    @foreach($blogs as $blog)
                        @if($blog->localized)
                            <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
                                <div class="blog border h-100">
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
                                        <a href='{{route('blog-details',$blog->id.'-'.str_slug($blog->localized->title))}}'><img src="{{asset('uploads/'.$blog->image)}}" alt="{{$blog->localized->title}}"></a>
                                    </div>
                                    <div class="title pl-3 mt-3">
                                        <h5 class="custom-character main-color"><a href="{{route('blog-details',$blog->id.'-'.str_slug($blog->localized->title))}}">{{$blog->localized->title}}</a></h5>
                                    </div>
                                    <div class="description pl-3">
                                        <p class="custom-character">{!!strip_tags(str_limit($blog->localized->description,80))!!}</p>
                                    </div>
                                    <div class="more pl-3 pb-3">
                                        <a class='btn btn-primary btn-sm custom-character' href="{{route('blog-details',$blog->id.'-'.str_slug($blog->localized->title))}}">{{__('admin.read more')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="justify-content-center mt-4">
                {{$blogs->links()}}
            </div>
        </div>
    </div>

    <!-- end blog section -->

@endsection
