<span id='spare-value' class='custom-character'>{{__('admin.part name')}}</span>
<i class="fa fa-sort-down"></i>
<ul class='custom-character'>
    @foreach($spareParts as $sparePart)
        @if($sparePart->localized)
            <li data-id="{{$sparePart->id}}" data-type="sparePart" onclick="loadPartName(this)">{{$sparePart->localized->title}}</li>
        @endif
    @endforeach
</ul>
