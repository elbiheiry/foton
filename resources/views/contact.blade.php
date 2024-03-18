@extends('layout.layout')

@push('title')
{{__('admin.Contact Us')}}
@endpush

@push('head')
<link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/parsley.css')}}" />
@endpush

@section('page')

<!-- start contact banner -->

<div class="ultimate-banner contact-banner" style="{{$pageSetting && $pageSetting->image?'background-image: url('.asset('uploads/'.$pageSetting->image).')':''}}">
    <div class="container">
        <div class="inner-banner">
            <div class="text-banner text-white  custom-character">
                <h1 class='main-color'>{{__('admin.contact us')}}</h1>
                <p>{{$pageSetting && $pageSetting->localized && $pageSetting->localized->description?$pageSetting->localized->description:''}}</p>
            </div>
        </div>
    </div>
</div>
<!-- end contact banner -->

<div class="contact-section py-5">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-6">
                <div class="contact_notice d-none">
                    <div class="alert alert-dismissible in" role="alert">
                    </div>
                </div>
                <form id="contact">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id='f-name' name="first_name" type="text" class='custom-character form-control' placeholder="{{__('admin.first name')}}" required data-parsley-maxlength="191">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id='l-name' name="last_name" type="text" class='custom-character form-control' placeholder="{{__('admin.last name')}}" required data-parsley-maxlength="191">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id='full-name' type="text" class='custom-character form-control' placeholder="{{__('admin.Full Name')}}" required data-parsley-maxlength="191">
                                <i class="far fa-user"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="mobile" class='custom-character form-control' placeholder="{{__('admin.mobile number')}}" required data-parsley-type="digits" data-parsley-length="[7,15]" data-parsley-length-message="This value should be betwwen 7 and 15 digits long">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="email" class='custom-character form-control' placeholder="{{__('admin.email')}}" data-parsley-maxlength="191" data-parsley-type="email">
                                <i class="far fa-envelope"></i>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="call_time" id='time-picker' class='custom-character form-control' placeholder="{{__('admin.Best Time To Call')}}" required>
                                <i class="far fa-calendar"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea rows="5" name="message" class='custom-character form-control' placeholder="{{__('admin.message')}}" required data-parsley-maxlength="255"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="checkbox" name="drive_to" class='custom-character'> {{__('admin.check here')}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type='submit' class='btn btn-primary custom-character' />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="img">
                    <img src="{{asset('uploads/'.$settings->contact_img)}}" alt="contact">
                </div>
            </div>
        </div>
        <hr>
        <div class="contact-information">
            @if($settings->localized->address)
            <div class="address d-flex">
                <h6 class="custom-character main-color">{{__('admin.address')}}:</h6>
                <p class="custom-character m-0 ml-3">{{$settings->localized->address}}</p>
            </div>
            @endif
            @if(count($settings->contacts))
            <div class="phone-num d-flex">
                <h6 class="custom-character main-color">{{__('admin.Phone Numbers')}}:</h6>
                <p class="custom-character m-0 ml-3">
                    @foreach($settings->contacts as $key => $contact)
                    @if($contact->field == 'phone')
                    <a href="tel:{{str_replace('_','',$contact->phone)}}">{{str_replace('_','',$contact->phone)}}</a>{{$key < (count($settings->contacts->where('field','phone'))-1)?',':''}}
                    @endif
                    @endforeach
                </p>
            </div>
            @endif
            <div class="c-cenetr d-flex">
                <h6 class="custom-character main-color">{{__('admin.Call center')}}:</h6>
                <p class="custom-character m-0 ml-3">
                    @foreach($settings->contacts as $key => $contact)
                    @if($contact->field == 'callCenter')
                    <a href="tel:{{str_replace('_','',$contact->phone)}}">{{str_replace('_','',$contact->phone)}}</a>{{$key < (count($settings->contacts->where('field','callCenter'))-1)?',':''}}
                    @endif
                    @endforeach
                </p>
            </div>
            <div class="location-map">
                <h6 class="custom-character mb-4 main-color">{{__('admin.visit our location')}}:</h6>
                <div class="our-map">
                    {!! $settings->map !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    let firstName = $('#f-name');
    lastName = $('#l-name'),
        fullName = $('#full-name');

    firstName.on('keyup', function() {
        fullName.val($(this).val() + ' ' + lastName.val());
    });

    lastName.on('keyup', function() {
        fullName.val(firstName.val() + ' ' + $(this).val());
    });
</script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/parsley.min.js')}}"></script>
<script>
    $('#contact').parsley();
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#contact').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var returnMsg = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $.blockUI({
                message: '<img src="{{asset('assets/img/loading.gif')}}" width="50">'
            });
            $.ajax({
                type: "POST",
                url: "{{route('onContact')}}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        $.unblockUI();
                        returnMsg += response.message;
                        $('.alert').removeClass('alert-danger');
                        $('.alert').addClass('alert-success');
                        $('.alert').html(returnMsg);
                        $('.contact_notice').removeClass('d-none');
                        $('#contact').trigger('reset');
                    } else {
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
                error: function(xhr) {

                }
            });
        });
    })
</script>
@endpush
