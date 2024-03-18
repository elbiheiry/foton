<span id='city-value' class='custom-character'>{{__('admin.city')}}</span>
<i class="fa fa-sort-down"></i>
<ul class='custom-character'>
    @foreach($cities as $city)
        @if($city->localized)
            <li data-id='{{$city->id}}' data-type="cities" onclick="loadData(this)">{{$city->localized}}</li>
        @endif
    @endforeach
</ul>
