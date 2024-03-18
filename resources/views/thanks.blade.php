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
                                <!--<a href="#" class="icon-btn">-->
                                <!--    EN-->
                                <!--</a>-->
                                <!--<span> / </span>-->
                                <!--<a href="#" class="icon-btn">-->
                                <!--    AR-->
                                <!--</a>-->
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
                            
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-title"> {{app()->getLocale() == 'en' ? 'Thank you, we will contact you ASAP' : 'شكرا لك سيتم التواصل معك قريبا'}}</div>
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
            
            setTimeout(function(){
                window.location.href = "https://fotonegypt.com/contact-form";
            }, 5000);
            
        </script>
    </body>
</html>