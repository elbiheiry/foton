<div id="tabs-3">
    <div class="spareParts mt-5">
        <div class="row">
            <div class="col-12">
                <div class="sparePartsList" id='car-type'>
                    <span id='type-value' class='custom-character'>{{__('admin.car type')}}</span>
                    <i class="fa fa-sort-down"></i>
                    <ul class='custom-character'>
                        @foreach($vehicleTypes as $type)
                            @if($type->localized)
                                <li data-id='{{$type->id}}' data-type="vehicleType" onclick="loadPartName(this)">{{$type->localized->title}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div id='part-name'>

                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="row" id="parts">

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function loadPartName($item){
        if($item.dataset.type == 'vehicleType'){
            $.ajax({
                type: "get",
                url: "{{route('loadPartName')}}",
                data: {id:$item.dataset.id},
                success: function (response) {
                    $('#part-name').attr('class','sparePartsList mt-3 mt-sm-0')
                    $('#part-name').html(response.list);
                    $('#parts').html(response.parts);
                },
                error: function (xhr) {

                }
            });
        }else if ($item.dataset.type == 'sparePart') {
            $.ajax({
                type: "get",
                url: "{{route('loadParts')}}",
                data: {id:$item.dataset.id},
                success: function (response) {
                    $('#parts').html(response.parts);
                },
                error: function (xhr) {

                }
            });
        }
    };
</script>
@endpush
