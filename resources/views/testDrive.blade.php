@extends('layout.layout')

@push('title')
{{__('admin.Test drive')}}
@endpush

@push('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/parsley.css')}}"/>
@endpush

@section('page')

    <!-- start section-title  -->

    <div class="ultimate-banner blog-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
        <div class="container">
            <div class="inner-banner">
                <div class="text-banner text-white custom-character">
                    <h1 class='main-color'>{{__('admin.Test drive')}}</h1>
                    <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- end section-title  -->

    <!--  start test drive  -->

    <section class="test-drive-section my-5">

        <div class="container">
            <div class="contact_notice d-none">
                <div class="alert alert-dismissible in" role="alert">
                </div>
            </div>
            <form id="onTestDrive">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="row border p-5">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control custom-character" placeholder="{{__('admin.first name')}}" required data-parsley-maxlength="191">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control custom-character" placeholder="{{__('admin.last name')}}" required data-parsley-maxlength="191">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control custom-character" placeholder="{{__('admin.mobile number')}}" required data-parsley-type="digits" data-parsley-length="[7,15]" data-parsley-length-message="This value should be betwwen 7 and 15 digits long">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control custom-character" placeholder="{{__('admin.email')}}" required data-parsley-maxlength="191" data-parsley-type="email">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select type="text" id="state" name="state_id" class="form-control custom-character" required>
                                <option value="">{{__('admin.governorate')}}</option>
                                @foreach($states as $state)
                                    @if($state->localized)
                                        <option value="{{$state->id}}">{{$state->localized}}, {{$state->country->localized}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select type="text" name="vehicle_id" class="form-control custom-character" required>
                                <option value="">{{__('admin.Vehicles')}}</option>
                                @foreach($vehicles as $vehicle)
                                    @if($vehicle->localized)
                                        <option value="{{$vehicle->id}}">{{$vehicle->localized->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit"
                                class='btn border-0 rounded-0 bg-second-color text-white'>{{__('admin.submit')}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--  end test drive  -->
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/parsley.min.js')}}"></script>
<script>
    $('#onTestDrive').parsley();
</script>
<script>
    $(document).ready(function() {
        $('#state').select2();
    });
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#onTestDrive').on('submit',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            var returnMsg = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $.blockUI({ message: '<img src="{{asset('assets/img/loading.gif')}}" width="50">' });
            $.ajax({
                type: "POST",
                url: "{{route('onTestDrive')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status){
                        $.unblockUI();
                        returnMsg += response.message;
                        $('.alert').removeClass('alert-danger');
                        $('.alert').addClass('alert-success');
                        $('.alert').html(returnMsg);
                        $('.contact_notice').removeClass('d-none');
                        $('#onTestDrive').trigger('reset');
                    }else{
                        $.unblockUI();
                        var msg = response.message;
                        var text = "<ul>";
                        for (i = 0; i < msg.length; i++) {
                          text += "<li>" + msg[i] + "</li>";
                        }
                        text += "</ul>";
                        returnMsg += msg;
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('.alert').html(returnMsg);
                        $('.contact_notice').removeClass('d-none');
                    }
                },
                error: function (xhr) {

                }
            });
        });
    })
</script>
@endpush
