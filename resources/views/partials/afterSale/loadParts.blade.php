@foreach($spareParts as $sparePart)
    @if($sparePart->localized)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="details border p-3 h-100">
                <h5 class="custom-character">{{$sparePart->localized->title}}</h5>
                <p class='price'>{{$sparePart->price}} {{\Setting::orderBy('id','desc')->first()->localized?\Setting::orderBy('id','desc')->first()->localized->currency:''}}</p>
                <div class="img-box">
                    <img src="{{asset('uploads/'.$sparePart->image)}}" alt="{{$sparePart->localized->title}}">
                </div>
            </div>
        </div>
    @endif
@endforeach
