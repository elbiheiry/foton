@extends('layout.layout')

@push('title')
{{__('admin.AMG Showrooms')}}
@endpush

@push('head')
    <link rel="stylesheet" href="{{asset('assets/vendors/venobox.css')}}">
@endpush

@section('page')
    <!-- start section-title  -->

    <div class="ultimate-banner blog-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner  align-items-center">
                <div class="text-banner text-white">
                    <h1 class='main-color'>{{__('admin.AMG showrooms')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- end section-title  -->

    <!-- start showrooms -->

    <section class="showrooms-section py-5">
        <div class="container">
            @if(count($branches))
                @foreach($branches as $branch)
                    @if($branch->localized)
                    <div class="showroom">
                        <div class="row mt-5 mx-0">
                            <div class="col-md-6 p-0">
                                <div class="showroom-details border h-100 p-3">
                                    <div class="dealer-name">
                                        <h5 class="custom-character main-color">{{$branch->localized->title}}</h5>
                                    </div>
                                    <hr class='m-0 my-2'>
                                    <div class="showroom-info">
                                        @if(count($branch->contacts))
                                        <div class="phone d-flex align-items-center">
                                            <h6 class="custom-character m-0">{{__('admin.phone')}} :</h6>
                                            <p class='m-0 pl-3'>
                                                @foreach($branch->contacts as $key => $contact)
                                                    <a href="tel:{{str_replace('_','',$contact->phone)}}">{{str_replace('_','',$contact->phone)}}</a>{{$key < (count($branch->contacts)-1)?',':''}}
                                                @endforeach
                                            </p>
                                        </div>
                                        @endif

                                        @if($branch->localized->address)
                                            <hr class='m-0 my-2'>
                                            <div class="address d-flex align-items-center">
                                                <h6 class='custom-character m-0'>{{__('admin.address')}} :</h6>
                                                <p class='custom-character m-0 pl-3'>{{$branch->localized->address}} </p>
                                            </div>
                                        @endif

                                        @if(count($branch->images))
                                            <hr class='m-0 my-2'>
                                            <div class="images d-flex">
                                                @foreach($branch->images as $image)
                                                <div class="img">
                                                    <a class="venobox" data-gall="myGallery" href="{{asset('uploads/'.$image)}}"><img class='img-fluid' src="{{asset('uploads/'.$image)}}" alt="{{$branch->localized->address}}" /></a>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if($branch->localized->working_hour)
                                            <hr class='m-0 my-2'>
                                            <div class="w-hours d-flex flex-column mt-4">
                                                <h6 class="custom-character m-0 mb-3">{{__('admin.working hours')}} :</h6>
                                                {!!$branch->localized->working_hour!!}
                                                {{-- <table class="table table-bordered table-sm mt-3">
                                                    <thead>
                                                        <tr class='custom-character'>
                                                            <th scope="col">{{__('admin.day')}}</th>
                                                            <th scope="col">{{__('admin.from')}}</th>
                                                            <th scope="col">{{__('admin.to')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($branch->workingHours as $workingHour)
                                                            <tr>
                                                                <td>{{trans('admin.'.days[$workingHour->day])}}</td>
                                                                <td>{{$workingHour->from}}</td>
                                                                <td>{{$workingHour->to}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table> --}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <div class="map">
                                    {!!$branch->map!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
            <div class="justify-content-center mt-4">
                {{$branches->links()}}
            </div>
        </div>
    </section>
    <!-- end showrooms -->

@endsection

@push('scripts')
    <script src="{{asset('assets/js/venobox.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.venobox').venobox();
        });
    </script>
@endpush
