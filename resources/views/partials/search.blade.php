<ul class="search-submenu d-flex flex-column">
    @if(count($searches))
    @foreach($searches as $search)
        <li><a href="{{route('vehicle-details', $search->vehicleModel->vehicle_id.'-'.str_slug($search->vehicleModel->vehicle->localized->title))}}">{{$search->title}}</a></li>
    @endforeach
    @else
    <li>{{__('admin.No result found')}}</li>
    @endif
</ul>
