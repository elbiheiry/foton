<html lang="en">
    <head>
        <!-- Meta Tags
        ================================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="copyright" content="">

        <!-- Title Name
        ================================-->
        <title>FOTON</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('public/contact/images/fav-icon.png')}}">
        
        <!-- Css Base And Vendor 
        ===================================-->
        <link rel="stylesheet" href="{{asset('public/contact/vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('public/contact/vendor/animation/animate.css')}}">
            
        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('public/contact/css/style.css')}}">
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('public/contact/css/rtl.css')}}">
        @endif
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178393190-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-178393190-1');
        </script>

    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">
                            Privacy Policy
                        </h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button class="custom-btn">
                            <span>
                                <i class="fa fa-shopping-bag"></i>
                                {{app()->getLocale() == 'en' ? 'add to cart' : 'اضافه الي العربه'}}
                            </span>
                        </button>
                    </div>
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        <!-- Header
        ==========================================-->
        <header>
            <div class="container all-menu">
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <div class="left-menu">
                            <a href="#" class="navbar-brand">
                                <img src="{{asset('public/contact/images/logo.png')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-6">
                        <div class="header-widget">
                            <div class="right-menu">
                                <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="icon-btn">
                                    EN
                                </a>
                                <span> / </span>
                                <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="icon-btn">
                                    AR
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End Container fluid-->
        </header><!--End header-->
        <!-- Start Page Content
        ====================================-->
        <div class="page-content">
            <!-- Start Section
            ====================================-->
            <section class="page-head">
                <div class="container-fluid">
                    <div class="row">
                        <div>
                            <img class="img-responsive" src="{{asset('public/contact/images/banner.jpg')}}">
                        </div>
                    </div><!--End row-->
                </div><!--End Container-->
            </section><!--End Section-->
            <!-- Start Section
            ====================================-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-10">

                            <form class="contact-form ajax-form" method="post" action="{{route('site.contact')}}">
                                {!! csrf_field() !!}
                                <div class="alert alert-danger text-center" style="display : none;">
                                    
                                </div>
                                <div class="alert alert-success text-center" style="display : none;">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-title"> {{app()->getLocale() == 'en' ? 'Get in touch' : 'تواصل معنا'}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{app()->getLocale() == 'en' ? 'Name' : 'الاسم'}}</label>
                                            <input type="text" class="form-control" name="name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{app()->getLocale() == 'en' ? 'Phone' : 'رقم الهاتف'}}</label>
                                            <input type="phone" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{app()->getLocale() == 'en' ? 'Model' : 'الموديل'}}</label>
                                            @if(app()->getLocale() == 'en')
                                            <select name="model" class="form-control">
                                                <option value="CS2 Royal Saloon">CS2 Royal Saloon</option>
                                                <option value="C2 passenger">C2 passenger</option>
                                                <option value="C2 Cargo">C2 Cargo</option>
                                                <option value="Px Van">Px Van</option>
                                            </select>
                                            @else
                                            <select name="model" class="form-control">
                                                <option value="CS2 Royal Saloon">رويال صالون</option>
                                                <option value="C2 passenger">المعلم - ركاب</option>
                                                <option value="C2 Cargo">المعلم - بضائع</option>
                                                <option value="Px Van">بى اكس - فان</option>
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{app()->getLocale() == 'en' ? 'City' : 'المدينه'}}</label>
                                            @if(app()->getLocale() == 'en')
                                            <select name="city" class="form-control">
                                                <option value="Alexandria">Alexandria</option>
                                                <option value="Aswan">Aswan</option>
                                                <option value="Assuit">Assuit</option>
                                                <option value="Beheira">Beheira</option>
                                                <option value="Beni-Suef">Beni-Suef</option>
                                                <option value="Cairo">Cairo</option>
                                                <option value="Dakahlia">Dakahlia</option>
                                                <option value="Damietta">Damietta</option>
                                                <option value="Faiyum">Faiyum</option>
                                                <option value="Gharbia">Gharbia</option>
                                                <option value="Giza">Giza</option>
                                                <option value="Ismailia">Ismailia</option>
                                                <option value="Kafr el-Sheikh">Kafr el-Sheikh</option>
                                                <option value="Luxor">Luxor</option>
                                                <option value="Matruh">Matruh</option>
                                                <option value="Minya">Minya</option>
                                                <option value="Monufia">Monufia</option>
                                                <option value="New Valley">New Valley</option>
                                                <option value="North Sinai">North Sinai</option>
                                                <option value="Port-Said">Port-Said</option>
                                                <option value="Qalyubia">Qalyubia</option>
                                                <option value="Qena">Qena</option>
                                                <option value="Red Sea">Red Sea</option>
                                                <option value="Sharqia">Sharqia</option>
                                                <option value="Sohag">Sohag</option>
                                                <option value="South Sinai">South Sinai</option>
                                                <option value="Suez">Suez</option>
                                                <option value="Mansura">Mansura</option>
                                                <option value="Zagazig">Zagazig</option>
                                                <option value="Hurghada">Hurghada</option>
                                                <option value="Shebin El Koum">Shebin El Koum</option>
                                                <option value="Tanta">Tanta</option>
                                                <option value="6th of October">6th of October</option>
                                                <option value="Sharm El Sheikh">Sharm El Sheikh</option>
                                                <option value="Mahala">Mahala</option>
                                                <option value="10th Of Ramadan">10th Of Ramadan</option>
                                                <option value="Damanhour">Damanhour</option>
                                                <option value="Banha">Banha</option>
                                                <option value="Ghareb Ras Ghareb">Ghareb Ras Ghareb</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @else
                                            <select name="city" class="form-control">
                                                <option value="Alexandria">الإسكندرية</option>
                                                <option value="Aswan">أسوان</option>
                                                <option value="Assuit">أسيوط</option>
                                                <option value="Beheira">البحيرة</option>
                                                <option value="Beni-Suef">بنى سويف</option>
                                                <option value="Cairo">القاهره</option>
                                                <option value="Dakahlia">الدقهليه</option>
                                                <option value="Damietta">الدقهليه</option>
                                                <option value="Faiyum">الفيوم</option>
                                                <option value="Gharbia">الغربية</option>
                                                <option value="Giza">الجيزه</option>
                                                <option value="Ismailia">الاسماعيلية</option>
                                                <option value="Kafr el-Sheikh">كفر الشيخ</option>
                                                <option value="Luxor">الاقصر</option>
                                                <option value="Matruh">مطروح</option>
                                                <option value="Minya">المنيا</option>
                                                <option value="Monufia">المنوفيه</option>
                                                <option value="New Valley">الوادى الجديد</option>
                                                <option value="North Sinai">شمال سيناء</option>
                                                <option value="Port-Said">بور سعيد</option>
                                                <option value="Qalyubia">القليوبيه</option>
                                                <option value="Qena">قنا</option>
                                                <option value="Red Sea">البحر الاحمر</option>
                                                <option value="Sharqia">الشرقيه</option>
                                                <option value="Sohag">سوهاج</option>
                                                <option value="South Sinai">جنوب سيناء</option>
                                                <option value="Suez">السويس</option>
                                                <option value="Mansura">المنصوره</option>
                                                <option value="Zagazig">الزقازيق</option>
                                                <option value="Hurghada">الغردقة</option>
                                                <option value="Shebin El Koum">شبين الكوم</option>
                                                <option value="Tanta">طنطا</option>
                                                <option value="6th of October">السادس من اكتوبر</option>
                                                <option value="Sharm El Sheikh">شرم الشيخ</option>
                                                <option value="Mahala">المحلة</option>
                                                <option value="10th Of Ramadan">العاشر من رمضان</option>
                                                <option value="Damanhour">دمنهور</option>
                                                <option value="Banha">بنها</option>
                                                <option value="Ras Ghareb">راس غارب</option>
                                                <option value="Other">اخرى</option>
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="custom-btn">
                                            <span> {{app()->getLocale() == 'en' ? 'Send' : 'ارسال'}} </span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-lg-1">
                        </div>
                    </div><!--End row-->
                </div><!--End Container-->
            </section><!--End Section-->
        </div><!--End Page Content-->
        <!-- Footer
        ====================================-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 logo">
                        <img src="{{asset('public/contact/images/logo.png')}}">
                    </div><!--End Col-->
                    <div class="col-md-6 col-sm-6 col-6 tvd">
                        <img src="{{asset('public/contact/images/tvd.png')}}">
                    </div><!--End Col-->
                    <div class="w-100">
                        <hr>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <p class="copyrights">
                            @if(app()->getLocale() == 'en' )
                            © 2020 Transport Vehicles Distribution. All Rights Reserved.
                            @else
                            © 2020 شركة توزيع وسائل النقل. كل الحقوق محفوظة. 
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 contact-footer">
                        <ul class="social">
                            <li>
                                <a href="tel: 15463" class="icon-btn">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </li>
                            <li>
                                <a class="icon-btn" target="_blank" href="https://www.facebook.com/Fotonegyptofficial">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="icon-btn" target="_blank" href="https://www.instagram.com/fotonegypt/">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div><!--End Col-->
                </div>
            </div><!--End container-->
        </footer>
        
        <!-- Loader
        ====================================-->
        <div class="loader">
            <div class="loader-cont">
                <img src="{{asset('public/contact/images/logo.png')}}">  
                <div class="spin"></div>
            </div>
        </div>
        <!-- JS Base And Vendor 
        ==========================================-->
        <script src="{{asset('public/contact/vendor/jquery/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{asset('public/contact/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/contact/vendor/animation/wow.min.js')}}"></script>
        <script src="{{asset('public/contact/js/main.js')}}"></script>
        <script>
        $(document).on('submit', '.ajax-form', function () {
                var form = $(this);
                var url = form.attr('action');
                var formData = new FormData(form[0]);

                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        
                        $('.alert-success').css('display' , 'block');
                        $('.alert-success').html(response);
                        $('.alert-danger').css('display' ,'none');
                        // $('.ajax-form')[0].reset();
                        
                        setTimeout(function(){
                            window.location.href = "https://fotonegypt.com/thanks";
                        }, 1000);
                        
                    },
                    error: function (jqXHR) {
                        var response = $.parseJSON(jqXHR.responseText);
                        $('.alert-danger').css('display' , 'block');
                        $('.alert-danger').html(response);
                        setTimeout( function (args) {
                            $('.alert-success').css('display' ,'none');
                        },2000);
                    }
                });

                $.ajaxSetup({
                    headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                });
                return false;
            });
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 80,
                    callback: function(box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();
            
            
        </script>
    </body>
</html>