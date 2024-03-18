@extends('layout.layout')

@push('title')
{{__('admin.dealers')}}
@endpush

@section('page')
    <!-- start section-title  -->

    <div class="ultimate-banner blog-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white  custom-character">
                    <h1 class='main-color'>{{__('admin.find a dealer')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- end section-title  -->

    <!-- start dealers -->

    <section class="dealers-section py-5">
        <div class="container">
            <div class="dealer-filter mt-5">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3">
                        <div class="dealer-list w-100" id='governorate'>
                            <span id='govern-value' class='custom-character'>{{__('admin.governorate')}}</span>
                            <i class="fa fa-sort-down"></i>
                            <ul class='custom-character'>
                                @foreach($governorates as $governorate)
                                    @if($governorate->localized)
                                        <li data-id='{{$governorate->id}}' data-type="state" onclick="loadData(this)">{{$governorate->localized}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div id='city'>

                        </div>
                    </div>
                    {{-- <div class="col-md-4 mb-3">
                        <button type='submit'>Submit</button>
                    </div> --}}
                </div>
            </div>
            <div id="dealer">
                @include('partials.dealers.dealer')
            </div>
        </div>
    </section>
    <!-- end dealers -->
@endsection
@push('scripts')
    <script>
        $('#governorate').click(function (e) {
            e.stopPropagation()
            $('#governorate ul').toggleClass('slideShow');
        })

        $(document).click(function () {
            $('#governorate ul, #city ul').removeClass('slideShow');
        })
        $('#governorate ul li').click(function () {
            $('#govern-value').text($(this).text());
        })
        $('#city ul li').click(function () {
            $('#city-value').text($(this).text());
        })

        $('#city').click(function (e) {
            e.stopPropagation()
            $('#city ul').toggleClass('slideShow');
        })
    </script>
    <script>
        function loadData($item){
            if($item.dataset.type == 'state'){
                $.ajax({
                    type: "get",
                    url: "{{route('loadCities')}}",
                    data: {id:$item.dataset.id},
                    success: function (response) {
                        $('#city').attr('class','dealer-list w-100')
                        $('#city').html(response.cities);
                        $('#dealer').html(response.dealers);
                    },
                    error: function (xhr) {

                    }
                });
            }else if ($item.dataset.type == 'cities') {
                $.ajax({
                    type: "get",
                    url: "{{route('loadDealers')}}",
                    data: {id:$item.dataset.id},
                    success: function (response) {
                        $('#dealer').html(response.dealers);
                    },
                    error: function (xhr) {

                    }
                });
            }
        };
    </script>
@endpush
