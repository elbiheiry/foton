@extends('layout.layout')

@push('title')
{{__('admin.Careers')}}
@endpush

@push('head')
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/parsley.css')}}"/>
@endpush

@section('page')
    <!--  start careers section  -->

    <section class="careers mt-3 mb-5">
        <div class="container">
            @if(count($careers))
                @foreach($careers as $career)
                    @if($career->localized)
                        <div class="text-wrap border mt-5 p-5">
                            <h3 class="career-title custom-character">{{$career->localized->title}}</h3>
                            <hr>
                            <p class="career-desc">{{$career->localized->description}}</p>
                            <h5 class="custom-character Vacancies">{{__('admin.Vacancies')}} : <span>{{$career->available_vacancies}}</span> </h5>
                        </div>
                    @endif
                @endforeach
            @endif
            <div class="target-id" id='personal-info'></div>
            <div class="form mt-5 border p-5">
                <div class="text-wrapper text-center">
                    <h4 class="personal-info custom-character py-2 px-3 d-inline-block">{{__('admin.your personal information')}}</h4>
                </div>

                <div class="contact_notice d-none">
                    <div class="alert alert-dismissible in" role="alert">
                    </div>
                </div>
                <form id="application" enctype="multipart/form-data">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="row mt-5">
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
                                <input type="text" name="email" class="form-control custom-character" placeholder="{{__('admin.email')}}" required data-parsley-maxlength="191" data-parsley-type="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control custom-character" placeholder="{{__('admin.mobile number')}}" required data-parsley-type="digits" data-parsley-length="[7,15]" data-parsley-length-message="This value should be betwwen 7 and 15 digits long">
                            </div>
                        </div>
                        <div class="col-12">
                            <textarea name="notes" id="" rows="3" class="form-control custom-character"
                                placeholder="{{__('admin.notes')}}"></textarea>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="custom-file" class='upload custom-character input-content'>{{__('admin.upload your C.V')}}</label>
                                <input type="file" name="resume" id='custom-file' required>
                                <span class='ml-1'>Ext:Doc,Docx,PDF maxsize: 10MB</span>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class='btn rounded-0 px-4'>{{__('admin.send')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--  start careers section  -->
@endsection
@push('scripts')
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/parsley.min.js')}}"></script>
<script>
    $('#application').parsley();
</script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#application').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var returnMsg = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
        $.blockUI({ message: '<img src="{{asset('assets/img/loading.gif')}}" width="50">' });
        $.ajax({
            type: "POST",
            url: "{{route('application')}}",
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
                    $('#application').trigger('reset');
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

    var inputUpload = $('#custom-file');
    var inputContent = $('.input-content');
    inputUpload.on('change', function(event) {
        var inputUpload = event.target;
        var fileName = inputUpload.files[0].name;
        inputContent.text(fileName);
    });
})
</script>
@endpush
