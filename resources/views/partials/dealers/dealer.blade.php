@if(count($dealers))
    @foreach($dealers as $dealer)
        @if($dealer->localized)
            <div class="dealer">
                <div class="row mt-5 mx-0">
                    <div class="col-md-6 p-0">
                        <div class="dealer-details border h-100 p-3">
                            <div class="dealer-name">
                                <h5 class="custom-character main-color">{{$dealer->localized->title}}</h5>
                            </div>
                            <hr class='m-0 my-2'>
                            <div class="dealer-info">
                                {{-- <div class="name d-flex align-items-center">
                                    <h6 class='custom-character m-0'>name :</h6>
                                    <p class='custom-character m-0 pl-3'>dealer name</p>
                                </div>
                                <hr class='m-0 my-2'> --}}
                                @if($dealer->localized->address)
                                <div class="address d-flex align-items-center">
                                    <h6 class='custom-character m-0'>{{__('admin.address')}} :</h6>
                                    <p class='custom-character m-0 pl-3'>{{$dealer->localized->address}}</p>
                                </div>
                                <hr class='m-0 my-2'>
                                @endif

                                @if(count($dealer->contacts))
                                    <div class="phone d-flex align-items-center">
                                        <h6 class="custom-character m-0">{{__('admin.phone')}} :</h6>
                                        <p class='m-0 pl-3'>
                                            @foreach($dealer->contacts as $key => $contact)
                                                <a href="tel:{{str_replace('_','',$contact->phone)}}">{{str_replace('_','',$contact->phone)}}</a>{{$key < (count($dealer->contacts)-1)?',':''}}
                                            @endforeach
                                        </p>
                                    </div>
                                    <hr class='m-0 my-2'>
                                @endif
                                @if($dealer->stateLocalized)
                                <div class="dealer-governorate d-flex align-items-center">
                                    <h6 class="custom-character m-0">{{__('admin.governorate')}} :</h6>
                                    <p class='custom-character m-0 pl-3'>{{$dealer->stateLocalized}}</p>
                                </div>
                                <hr class='m-0 my-2'>
                                @endif
                                @if($dealer->cityLocalized)
                                <div class="dealer-city d-flex align-items-center">
                                    <h6 class="custom-character m-0">{{__('admin.city')}} :</h6>
                                    <p class='custom-character m-0 pl-3'>{{$dealer->cityLocalized}}</p>
                                </div>
                                <hr class='m-0 my-2'>
                                @endif

                                @if($dealer->localized->working_hour)
                                    <div class="w-hours d-flex flex-column mt-4">
                                        <h6 class="custom-character m-0 mb-3">{{__('admin.working hours')}} :</h6>
                                        {!!$dealer->localized->working_hour!!}
                                        {{-- <table class="table table-bordered table-sm mt-3">
                                            <thead>
                                                <tr class='custom-character'>
                                                    <th scope="col">{{__('admin.day')}}</th>
                                                    <th scope="col">{{__('admin.from')}}</th>
                                                    <th scope="col">{{__('admin.to')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dealer->workingHours as $workingHour)
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
                            {!! $dealer->map !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
