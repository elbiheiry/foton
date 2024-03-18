<div id="tabs-2" class='p-0'>
    <div class="spareParts">
    <div class="sparePartsList m-3" id='car-maintenance'>
        <span id='maintenance-value' class='custom-character'>{{__('admin.maintenance')}}</span>
        <i class="fa fa-sort-down"></i>
        <ul class='custom-character'>
        @foreach($vehicles as $vehicle)
            @if($vehicle->localized)
            <li data-id='{{$vehicle->id}}' data-type="vehicleMaintenance" onclick="loadMaintemance(this)">{{$vehicle->localized->title}}</li>
            @endif
        @endforeach
        </ul>
    </div>
    </div>
    <div class="maintain">

    </div>
</div>

@push('scripts')
<script>
    function loadMaintemance($item) {
        console.log($item.dataset.id)
            $.ajax({
                type: "get",
                url: "{{route('loadmaintenance')}}",
                data: {
                    id: $item.dataset.id
                },
                success: function(response) {
                    console.log(response);
                    $('.maintain').html(response);
                },
                error: function(xhr) {

                }
            });
        
    };
</script>
@endpush