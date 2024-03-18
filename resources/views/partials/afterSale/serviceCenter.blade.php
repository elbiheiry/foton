<div id="tabs-1" class='p-0'>
    @foreach($serviceCenters as $service)
        @if($service->localized)
            <div class="row mt-5 mx-0">
                <div class="col-md-6 p-0">
                    <div class="service-center-details border h-100 p-3">
                        <div class="service-center-name">
                            <h5 class="custom-character main-color">{{$service->localized->title}}</h5>
                        </div>
                        <hr class='m-0 my-2'>
                        <div class="service-center-info">
                            <div class="address d-flex align-items-center">
                                <h6 class='custom-character m-0'>{{__('admin.address')}} :</h6>
                                <p class='custom-character m-0 pl-3'>{{$service->localized->address}}</p>
                            </div>
                            <hr class='m-0 my-2'>
                            @if(count($service->contacts))
                                <div class="phone d-flex align-items-center">
                                    <h6 class="custom-character m-0">{{__('admin.phone')}} :</h6>
                                    <p class='m-0 pl-3'>
                                        @foreach($service->contacts as $key => $contact)
                                            <a href="tel:{{str_replace('_','',$contact->phone)}}">{{str_replace('_','',$contact->phone)}}</a>{{$key < (count($service->contacts)-1)?',':''}}
                                        @endforeach
                                    </p>
                                </div>
                            <hr class='m-0 my-2'>
                            @endif
                            <div class="description">
                                <p class='custom-character'>{!!$service->localized->description!!}</p>
                            </div>
                            <!-- @if(count($service->workingHours))
                                <div class="w-hours d-flex flex-column mt-4">
                                    <h6 class="custom-character m-0">{{__('admin.working hours')}} :</h6>
                                    <table class="table table-bordered table-sm mt-3">
                                        <thead>
                                            <tr class='custom-character'>
                                                <th scope="col">{{__('admin.day')}}</th>
                                                <th scope="col">{{__('admin.from')}}</th>
                                                <th scope="col">{{__('admin.to')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($service->workingHours as $workingHour)
                                                <tr>
                                                    <td>{{trans('admin.'.days[$workingHour->day])}}</td>
                                                    <td>{{$workingHour->from}}</td>
                                                    <td>{{$workingHour->to}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <div class="map">
                        {!! $service->map !!}
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
