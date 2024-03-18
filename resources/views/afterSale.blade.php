@extends('layout.layout')

@push('title')
{{__('admin.after sales')}}
@endpush

@section('page')
    <!-- start services banner -->
    <div class="ultimate-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white  custom-character">
                    <h1 class='main-color'>{{__('admin.total care')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end services banner -->

    <!-- start after sales service -->
    <div class="after-sales-section my-5">
        <div class="container">
            <div id="tabs">
                <ul>
                    @if(count($serviceCenters) && \Setting::orderBy('id','desc')->first()->services_flag)
                        <li><a href="#tabs-1">{{__('admin.Services center')}}</a></li>
                    @endif

                    @if(count($vehicles) && \Setting::orderBy('id','desc')->first()->maintain_flag)
                        <li><a href="#tabs-2">{{__('admin.Maintenance schedule')}}</a></li>
                    @endif

                    @if(count($vehicleTypes) && \Setting::orderBy('id','desc')->first()->spare_parts_flag)
                        <li><a href="#tabs-3">{{__('admin.Spare Parts')}}</a></li>
                    @endif
                </ul>
                @if(count($serviceCenters) && \Setting::orderBy('id','desc')->first()->services_flag)
                    @include('partials.afterSale.serviceCenter')
                @endif

                @if(count($vehicles) && \Setting::orderBy('id','desc')->first()->maintain_flag)
                    @include('partials.afterSale.maintenance')
                @endif

                @if(count($vehicleTypes) && \Setting::orderBy('id','desc')->first()->spare_parts_flag)
                    @include('partials.afterSale.sparePart')
                @endif
            </div>
        </div>
    </div>
    <!-- end after sales service -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
            $("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
        });


        $('#car-type').click(function (e) {
            e.stopPropagation()
            $('#car-type ul').toggleClass('slideShow');
        })

        $(document).click(function () {
            $('#car-type ul, #part-name ul').removeClass('slideShow');
        })
        $('#car-type ul li').click(function () {
            $('#type-value').text($(this).text());
        })
        $('#part-name ul li').click(function () {
            $('#spare-value').text($(this).text());
        })

        $('#part-name').click(function (e) {
            e.stopPropagation()
            $('#part-name ul').toggleClass('slideShow');
        })

    ////  maintenance dropdown
    $('#car-maintenance').click(function (e) {
            e.stopPropagation()
            $('#car-maintenance ul').toggleClass('slideShow');
        })

        $(document).click(function () {
            $('#car-maintenance ul, #part-name ul').removeClass('slideShow');
        });
        $('#car-maintenance ul li').click(function () {
            $('#maintenance-value').text($(this).text());
        });

    </script>
@endpush
