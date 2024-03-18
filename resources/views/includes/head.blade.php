<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('admin.Foton')}} | @stack('title')</title>
    <meta name="description" content="{{isset($seo_description)?$seo_description:\Setting::orderBy('id','desc')->first()->localized->seo_description}}">
    <link rel="shortcut icon" href="http://www.fotonmotor.co.ke/static/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/vendors/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/pace-theme-minimal.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/slick.css')}}">
    @if(\App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-rtl.css')}}?ver=4">
        <link rel="stylesheet" href="{{asset('assets/css/style-rtl.css')}}?ver=4">
        <link rel="stylesheet" href="{{asset('assets/css/responsive-rtl.css')}}?ver=4">
        <link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui-v1.12.1-rtl.min.css')}}?ver=4">
    @else
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap.css')}}?ver=4">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}?ver=4">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}?ver=4">
        <link rel="stylesheet" href="{{asset('assets/vendors/jquery-ui-v1.12.1.min.css')}}?ver=4">
    @endif

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap">

    <!-- icons -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    @stack('head')
</head>
