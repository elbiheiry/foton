<!-- start scroll to top button -->
<div class="goTop_btn">
    <button><i class='fa fa-angle-up'></i></button>
</div>
<!-- end scroll to top button -->


<!-- start some-fast-links -->
<div class="some-fast-links">
    <ul class='custom-character'>
        <li class='d-flex align-items-center'>
            <a href="{{route('branches')}}">
                <ion-icon name="pin"></ion-icon>
            </a>
            <span>{{__('admin.amg Location')}}</span>
        </li>
        <li class='d-flex align-items-center'>
            <a href="{{route('dealers')}}">
                <ion-icon name="search"></ion-icon>
            </a>
            <span>{{__('admin.Find a dealer')}}</span>
        </li>
        <li class='d-flex align-items-center'>
            <a href="{{route('test-drive')}}">
                <ion-icon name="speedometer"></ion-icon>
            </a>
            <span>{{__('admin.Test drive')}}</span>
        </li>
        <li class='d-flex align-items-center'>
            <a href="{{route('contact')}}">
                <ion-icon name="call"></ion-icon>
            </a>
            <span>{{__('admin.Contact us')}}</span>
        </li>
    </ul>
</div>
<!-- end some-fast-links -->

<!-- start header  -->
<header>
    <div class="fixed-nav-bar fixed-top">
        <div class="foton-main-logo">
            <a href='{{route('home')}}'><img class="logo-1" src="{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->foton_logo)}}" alt="logo"></a>
            @if(app()->getLocale() == 'en')
            <a href='{{route('home')}}'><img class="logo-2" src="{{asset('uploads/logo final-01.png')}}" alt="TVD"></a>
            @else
            <a href='{{route('home')}}'><img class="logo-2" src="{{asset('uploads/logo final-02.png')}}" alt="TVD"></a>
            @endif
        </div>
        <div class="language-box">
            <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="arabic-lang">AR</a>
            <span>|</span>
            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="english-lang">EN</a>
        </div>
        @if(count(\Setting::orderBy('id','desc')->first()->socialMedia))
            <div class="social-links">
                <ul class='d-flex align-items-center'>
                    @foreach(\Setting::orderBy('id','desc')->first()->socialMedia as $one)
                    <li><a href="{{$one->link}}" title="{{$one->title}}" target="_blank"><i class="fab {{$one->icon}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="search-bar">
            <div class="wrapper">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
                <input id="search-bar" type="text" placeholder="Search...">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="search-dropdown" id="result">

                </div>
            </div>
        </div>
        <div id="hamburger-menu">
            <svg viewBox="0 0 18 7">
                <line class='line' style="fill:#FFFFFF;stroke:#fff;stroke-width:0.5;stroke-miterlimit:10;" x1="1.5"
                    y1="1.5" x2="16.5" y2="1.5" />
                <line class='line' style="fill:#FFFFFF;stroke:#fff;stroke-width:.65;stroke-miterlimit:10;" x1="1.5"
                    y1="3.5" x2="16.5" y2="3.5" />
                <line class='line' style="fill:#FFFFFF;stroke:#fff;stroke-width:0.5;stroke-miterlimit:10;" x1="1.5"
                    y1="5.5" x2="16.5" y2="5.5" />
            </svg>
        </div>
    </div>
    <nav>
        <div class="top-menu">
            <div class="container">
                <div class="logo d-block d-md-none">
                    <a href="{{route('home')}}"><img src="{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->foton_logo)}}" alt="logo"></a>
                </div>
                <div class="close-menu-area">
                    <div class="close-icon">
                        <svg viewBox="0 0 8 6">
                            <line style="fill:#FFFFFF;stroke:#868686;stroke-width:0.5;stroke-miterlimit:10;"
                                x1="1.5" y1="0.5" x2="6.5" y2="5.5" />
                            <line style="fill:#FFFFFF;stroke:#868686;stroke-width:0.5;stroke-miterlimit:10;"
                                x1="6.5" y1="0.5" x2="1.5" y2="5.5" />
                        </svg>
                    </div>
                    <span class='close-guide upper-text'>{{__('admin.Close')}}</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-menu d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{asset('uploads/'.\Setting::orderBy('id','desc')->first()->foton_logo)}}" alt="logo"></a>
                    <a href='{{route('home')}}'><img src="{{asset('uploads/tvd.png')}}" alt="TVD"></a>
                </div>
                <ul class="links d-flex align-items-center upper-text">
                    <li class='item'>
                        <a href="{{route('vehicles')}}" class='link'>
                            <svg class='svg-mobile-hidden' width="1004" height="648" viewBox="0 0 1004 648"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="SVGvehicle" d="M238 469H124V126H832L982 295.538V469H810" stroke="#fff"
                                    stroke-linejoin="round" />
                                <path class="SVGvehicle" d="M887.259 180H782V300H978" stroke="#fff"
                                    stroke-linejoin="round" />
                                <path class="SVGvehicle" d="M661 469L391 469" stroke="#fff" stroke-width="5" />
                                <path class="SVGvehicle"
                                    d="M388.5 469.5C388.5 510.294 354.326 543.5 312 543.5C269.674 543.5 235.5 510.294 235.5 469.5C235.5 428.706 269.674 395.5 312 395.5C354.326 395.5 388.5 428.706 388.5 469.5Z" />
                                <path class="SVGvehicle"
                                    d="M813.5 469.5C813.5 510.294 779.326 543.5 737 543.5C694.674 543.5 660.5 510.294 660.5 469.5C660.5 428.706 694.674 395.5 737 395.5C779.326 395.5 813.5 428.706 813.5 469.5Z" />
                                <path class="SVGvehicle" d="M528 180V300H658V180H528Z" stroke="#fff"
                                    stroke-linejoin="round" />
                                <path class="SVGvehicle" d="M355 180V300H485V180H355Z" stroke="#fff"
                                    stroke-linejoin="round" />
                                <path class="SVGvehicle" d="M182 180V300H312V180H182Z" stroke="#fff"
                                    stroke-linejoin="round" />
                                <path class="SVGvehicle" d="M725 126L722 393" stroke="#fff" />

                                <path class="SVGvehicle0" d="M238 469H124V126H832L982 295.538V469H810"
                                    stroke="#474544" stroke-width="8" stroke-linejoin="round" />
                                <path class="SVGvehicle0" d="M887.259 180H782V300H978" stroke="#474544"
                                    stroke-width="8" stroke-linejoin="round" />
                                <path class="SVGvehicle0" d="M661 469L391 469" stroke="#474544" stroke-width="8" />
                                <path class="SVGvehicle0"
                                    d="M388.5 469.5C388.5 510.294 354.326 543.5 312 543.5C269.674 543.5 235.5 510.294 235.5 469.5C235.5 428.706 269.674 395.5 312 395.5C354.326 395.5 388.5 428.706 388.5 469.5Z"
                                    stroke="#474544" stroke-width="8" />
                                <path class="SVGvehicle0"
                                    d="M813.5 469.5C813.5 510.294 779.326 543.5 737 543.5C694.674 543.5 660.5 510.294 660.5 469.5C660.5 428.706 694.674 395.5 737 395.5C779.326 395.5 813.5 428.706 813.5 469.5Z"
                                    stroke="#474544" stroke-width="8" />
                                <path class="SVGvehicle0" d="M528 180V300H658V180H528Z" stroke="#474544"
                                    stroke-width="8" stroke-linejoin="round" />
                                <path class="SVGvehicle0" d="M355 180V300H485V180H355Z" stroke="#474544"
                                    stroke-width="8" stroke-linejoin="round" />
                                <path class="SVGvehicle0" d="M182 180V300H312V180H182Z" stroke="#474544"
                                    stroke-width="8" stroke-linejoin="round" />
                                <path class="SVGvehicle0" d="M725 126L722 393" stroke="#474544" stroke-width="8" />
                            </svg>
                            {{__('admin.Vehicles')}}</a></li>
                    <li class='item'>
                        <a href="{{route('offers')}}" class='link'>
                            <svg class='svg-mobile-hidden' version="1.1" viewBox="0 0 450 470">
                                <g>
                                    <path class='animate-svg-offer'
                                        style="fill:none;stroke:#fff;stroke-width:1;stroke-miterlimit:10;"
                                        d="M98.456,278.211
                                           c-2.103-2.296-4.405-2.915-6.903-1.857c-2.5,1.058-3.728,3.053-3.687,5.981c0.04,2.93,1.243,7.184,3.605,12.763
                                           c2.534,5.985,4.876,10.101,7.025,12.342c2.148,2.244,4.472,2.835,6.971,1.777c2.382-1.009,3.565-2.949,3.549-5.821
                                           c-0.018-2.871-1.157-6.979-3.421-12.327C102.939,284.794,100.559,280.508,98.456,278.211L98.456,278.211z" />
                                    <path class='animate-svg-offer'
                                        style="fill:none;stroke:#fff;stroke-width:1;stroke-miterlimit:10;"
                                        d="M214.766,331.965
                                           c2.07,2.379,4.412,3.015,7.027,1.907c2.441-1.033,3.643-2.964,3.611-5.795c-0.033-2.829-1.231-7.035-3.593-12.613
                                           c-2.559-6.043-4.928-10.181-7.106-12.412c-2.177-2.228-4.43-2.852-6.754-1.868c-2.441,1.033-3.682,2.879-3.722,5.533
                                           c-0.041,2.657,1.034,6.57,3.224,11.742C210.259,325.084,212.696,329.587,214.766,331.965L214.766,331.965z" />
                                    <path class='animate-svg-offer'
                                        style="fill:none;stroke:#fff;stroke-width:1;stroke-miterlimit:10;" d="M91.116,154.593
                                           c1.354,7.082,2.477,11.495,2.598,11.968l1.367,5.303l4.727-2.764c0.119-0.069,5.573-3.266,13.965-8.472
                                           c0.626,1.044,1.151,2.175,1.556,3.387c2.593,7.777-0.922,16.455-8.195,20.235c-9.247,4.805-20.526,0.237-23.822-9.649
                                           C80.766,166.968,84.114,158.479,91.116,154.593L91.116,154.593z M107.676,154.67c-2.836,1.751-5.271,3.232-7.195,4.393
                                           c-0.388-1.812-0.842-4.043-1.324-6.612C102.162,152.422,105.102,153.203,107.676,154.67L107.676,154.67z M94.282,99.982
                                           c0.6-41.929,13.357-68.429,37.936-78.837c0.912-0.386,1.844-0.751,2.789-1.094c23.261-8.416,41.073-7.613,52.942,2.387
                                           c14.452,12.176,17.704,36.379,14.609,53.716c-1.048,5.874-9.534,20.451-54.584,52.084c-3.252,2.284-6.499,4.517-9.695,6.679
                                           L94.9,119.912C94.438,113.532,94.184,106.81,94.282,99.982L94.282,99.982z M158.802,229.785l16.04-6.792l-20.297,157.449
                                           l-15.865,6.718L158.802,229.785L158.802,229.785z M187.165,301.865c2.012-7.225,6.823-12.45,14.437-15.674
                                           c7.612-3.223,14.737-2.95,21.37,0.82c6.634,3.77,12.067,10.654,16.299,20.648c4.085,9.647,5.14,18.127,3.165,25.439
                                           c-1.975,7.314-6.74,12.569-14.294,15.768c-7.845,3.322-15.023,3.123-21.532-0.597c-6.51-3.719-11.955-10.751-16.335-21.096
                                           C186.191,317.527,185.153,309.09,187.165,301.865L187.165,301.865z M125.845,308.299c-1.797,7.409-6.474,12.713-14.028,15.911
                                           c-7.439,3.151-14.469,2.855-21.09-0.886c-6.621-3.741-11.999-10.493-16.133-20.257c-4.232-9.994-5.425-18.639-3.579-25.932
                                           c1.846-7.292,6.518-12.527,14.015-15.701c7.554-3.199,14.597-2.994,21.128,0.614c6.53,3.609,11.839,10.236,15.923,19.882
                                           C126.388,292.101,127.643,300.891,125.845,308.299L125.845,308.299z M71.28,122.426L17.627,237.39
                                           c-1.348,2.89-1.409,6.217-0.165,9.154l87.901,207.582c2.425,5.728,9.034,8.405,14.762,5.98l173.55-73.49
                                           c5.727-2.425,8.404-9.034,5.979-14.762l-87.902-207.583c-1.243-2.937-3.674-5.209-6.688-6.252l-57.046-19.733
                                           c1.552-1.07,3.111-2.153,4.67-3.248c36.745-25.797,55.723-44.583,58.016-57.431c1.754-9.825,1.505-21.253-0.685-31.355
                                           c-2.781-12.837-8.569-23.26-16.738-30.142c-14.294-12.043-34.847-13.335-61.089-3.839c-16.635,6.019-28.983,18.123-36.701,35.973
                                           c-6.015,13.913-9.206,31.333-9.484,51.776c-0.078,5.794,0.079,11.486,0.396,16.952l-1.237-0.428
                                           C79.714,114.659,73.719,117.198,71.28,122.426L71.28,122.426z" />
                                    <path style="fill:none;stroke:#fff;stroke-width:1;stroke-miterlimit:10;"
                                        d="M98.456,278.211
                                           c-2.103-2.296-4.405-2.915-6.903-1.857c-2.5,1.058-3.728,3.053-3.687,5.981c0.04,2.93,1.243,7.184,3.605,12.763
                                           c2.534,5.985,4.876,10.101,7.025,12.342c2.148,2.244,4.472,2.835,6.971,1.777c2.382-1.009,3.565-2.949,3.549-5.821
                                           c-0.018-2.871-1.157-6.979-3.421-12.327C102.939,284.794,100.559,280.508,98.456,278.211L98.456,278.211z" />
                                    <path style="fill:none;stroke:#fff;stroke-width:1;stroke-miterlimit:10;"
                                        d="M214.766,331.965
                                           c2.07,2.379,4.412,3.015,7.027,1.907c2.441-1.033,3.643-2.964,3.611-5.795c-0.033-2.829-1.231-7.035-3.593-12.613
                                           c-2.559-6.043-4.928-10.181-7.106-12.412c-2.177-2.228-4.43-2.852-6.754-1.868c-2.441,1.033-3.682,2.879-3.722,5.533
                                           c-0.041,2.657,1.034,6.57,3.224,11.742C210.259,325.084,212.696,329.587,214.766,331.965L214.766,331.965z" />
                                    <path style="fill:none;stroke:#fff;stroke-width:1;stroke-miterlimit:10;" d="M91.116,154.593
                                           c1.354,7.082,2.477,11.495,2.598,11.968l1.367,5.303l4.727-2.764c0.119-0.069,5.573-3.266,13.965-8.472
                                           c0.626,1.044,1.151,2.175,1.556,3.387c2.593,7.777-0.922,16.455-8.195,20.235c-9.247,4.805-20.526,0.237-23.822-9.649
                                           C80.766,166.968,84.114,158.479,91.116,154.593L91.116,154.593z M107.676,154.67c-2.836,1.751-5.271,3.232-7.195,4.393
                                           c-0.388-1.812-0.842-4.043-1.324-6.612C102.162,152.422,105.102,153.203,107.676,154.67L107.676,154.67z M94.282,99.982
                                           c0.6-41.929,13.357-68.429,37.936-78.837c0.912-0.386,1.844-0.751,2.789-1.094c23.261-8.416,41.073-7.613,52.942,2.387
                                           c14.452,12.176,17.704,36.379,14.609,53.716c-1.048,5.874-9.534,20.451-54.584,52.084c-3.252,2.284-6.499,4.517-9.695,6.679
                                           L94.9,119.912C94.438,113.532,94.184,106.81,94.282,99.982L94.282,99.982z M158.802,229.785l16.04-6.792l-20.297,157.449
                                           l-15.865,6.718L158.802,229.785L158.802,229.785z M187.165,301.865c2.012-7.225,6.823-12.45,14.437-15.674
                                           c7.612-3.223,14.737-2.95,21.37,0.82c6.634,3.77,12.067,10.654,16.299,20.648c4.085,9.647,5.14,18.127,3.165,25.439
                                           c-1.975,7.314-6.74,12.569-14.294,15.768c-7.845,3.322-15.023,3.123-21.532-0.597c-6.51-3.719-11.955-10.751-16.335-21.096
                                           C186.191,317.527,185.153,309.09,187.165,301.865L187.165,301.865z M125.845,308.299c-1.797,7.409-6.474,12.713-14.028,15.911
                                           c-7.439,3.151-14.469,2.855-21.09-0.886c-6.621-3.741-11.999-10.493-16.133-20.257c-4.232-9.994-5.425-18.639-3.579-25.932
                                           c1.846-7.292,6.518-12.527,14.015-15.701c7.554-3.199,14.597-2.994,21.128,0.614c6.53,3.609,11.839,10.236,15.923,19.882
                                           C126.388,292.101,127.643,300.891,125.845,308.299L125.845,308.299z M71.28,122.426L17.627,237.39
                                           c-1.348,2.89-1.409,6.217-0.165,9.154l87.901,207.582c2.425,5.728,9.034,8.405,14.762,5.98l173.55-73.49
                                           c5.727-2.425,8.404-9.034,5.979-14.762l-87.902-207.583c-1.243-2.937-3.674-5.209-6.688-6.252l-57.046-19.733
                                           c1.552-1.07,3.111-2.153,4.67-3.248c36.745-25.797,55.723-44.583,58.016-57.431c1.754-9.825,1.505-21.253-0.685-31.355
                                           c-2.781-12.837-8.569-23.26-16.738-30.142c-14.294-12.043-34.847-13.335-61.089-3.839c-16.635,6.019-28.983,18.123-36.701,35.973
                                           c-6.015,13.913-9.206,31.333-9.484,51.776c-0.078,5.794,0.079,11.486,0.396,16.952l-1.237-0.428
                                           C79.714,114.659,73.719,117.198,71.28,122.426L71.28,122.426z" />
                                </g>
                            </svg>
                            {{__('admin.offers')}}</a></li>
                    <li class='item service-item'>
                        <a class='link' href="{{route('services')}}">
                            <svg class='svg-mobile-hidden' viewBox="0 0 267.17 245.52">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: none;
                                            stroke: #fff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1 svgHeart"
                                    d="M288.5,98.66c0-39.5-31.1-71.51-69.45-71.51-.91,0-1.81,0-2.7.05a67.46,67.46,0,0,0-22.88,4.95c-.79.33-1.58.66-2.35,1a69.74,69.74,0,0,0-24.21,18.26c-5,5.82-9.06,13.7-12,21-2.94-7.28-7-15.16-12-21a69.74,69.74,0,0,0-24.21-18.26c-.78-.36-1.56-.69-2.36-1A67.4,67.4,0,0,0,93.48,27.2c-.9,0-1.8-.05-2.7-.05-38.36,0-69.45,32-69.45,71.51V104c0,61.69,64.13,119.76,103.53,149.61,10.27,7.82,19.14,13.84,24.53,17.36a10.12,10.12,0,0,0,11.1,0c5.31-3.47,14-9.4,24.48-17.36C224.36,223.8,288.5,165.73,288.5,104Z"
                                    transform="translate(-21.33 -27.15)" />

                                <path class="cls-1"
                                    d="M288.5,98.66c0-39.5-31.1-71.51-69.45-71.51-.91,0-1.81,0-2.7.05a67.46,67.46,0,0,0-22.88,4.95c-.79.33-1.58.66-2.35,1a69.74,69.74,0,0,0-24.21,18.26c-5,5.82-9.06,13.7-12,21-2.94-7.28-7-15.16-12-21a69.74,69.74,0,0,0-24.21-18.26c-.78-.36-1.56-.69-2.36-1A67.4,67.4,0,0,0,93.48,27.2c-.9,0-1.8-.05-2.7-.05-38.36,0-69.45,32-69.45,71.51V104c0,61.69,64.13,119.76,103.53,149.61,10.27,7.82,19.14,13.84,24.53,17.36a10.12,10.12,0,0,0,11.1,0c5.31-3.47,14-9.4,24.48-17.36C224.36,223.8,288.5,165.73,288.5,104Z"
                                    transform="translate(-21.33 -27.15)" />
                            </svg>
                            {{__('admin.services')}}</a></li>
                    <li class='item'>
                        <a class='link' href="{{route('after-sale')}}">
                            <svg class='svg-mobile-hidden' viewBox="0 0 139 81">
                                <g>
                                    <path fill="#5c5857"
                                        d="M97.73 75H41.311C38.382 75 36 72.572 36 69.588V18.992C36 16.146 38.283 14 41.311 14H49V9.01C49 7.86 50.194 7 51.262 7h3.417C55.775 7 57 7.86 57 9.01V14h25V9.01C82 7.878 83.27 7 84.362 7h3.417C88.828 7 90 7.86 90 9.01V14h7.73c3.004 0 5.27 2.146 5.27 4.992v50.596C103 72.572 100.636 75 97.73 75zM41.311 15C38.854 15 37 16.716 37 18.992v50.596C37 71.979 38.974 74 41.311 74H97.73c2.354 0 4.27-1.979 4.27-4.412V18.992c0-2.313-1.795-3.992-4.27-3.992H89V9.01C89 8.451 88.332 8 87.779 8h-3.417C83.767 8 83 8.49 83 9.01V15H56V9.01C56 8.49 55.256 8 54.68 8h-3.417C50.694 8 50 8.466 50 9.01V15H41.311zM97 28H42v1h55V28z">
                                    </path>
                                </g>
                                <g>
                                    <path class="svg-anim svg-anim-horar"
                                        d="M70 74.5H41.311c-2.657 0-4.811-2.256-4.811-4.913V18.992c0-2.657 2.154-4.492 4.811-4.492H49.5V9.01c0-0.834 0.928-1.51 1.762-1.51h3.418c0.834 0 1.82 0.676 1.82 1.51v5.49h26V9.01c0-0.834 1.028-1.51 1.862-1.51h3.418c0.834 0 1.721 0.676 1.721 1.51v5.49h8.231c2.657 0 4.769 1.835 4.769 4.492v50.595c0 2.657-2.112 4.913-4.769 4.913H70"
                                        fill="none"></path>
                                    <path class="svg-anim svg-anim-horar" d="M42 28.5h55" fill="none"></path>
                                </g>
                            </svg>

                            {{__('admin.after sales')}}</a></li>

                    <li class='item'>
                        <a href="{{route('contact')}}" class='link'>
                            <svg class='svg-mobile-hidden' viewBox="0 0 139 81">
                                <g>
                                    <path fill="#5c5857"
                                        d="M99.39 9c5.677 0 10.292 5.169 10.292 11.524 0 5.835-2.917 10.844-8.164 11.404l0.108 2.405C118.747 34.613 120.031 44 121 57c-2.368 0-27 0-27 0l0.556 2.027C95.72 63.349 96.199 68 96.537 73c-2.461 0-53.781 0-56.243 0 0.339-5 0.819-9.651 1.981-13.973L43 57c0 0-22.656 0-25 0 0.955-13 2.194-22.206 19.041-22.649l0.078-2.405c-5.315-0.478-8.284-5.494-8.284-11.421C28.835 14.064 33.36 9 39.134 9c5.676 0 10.292 5.169 10.292 11.524 0 5.844-2.922 10.854-8.178 11.406l0.106 2.403c8.831 0.142 13.112 2.735 16.039 8.16l0.433 0.801 0.887-0.196c2.37-0.52 3.825-0.832 6.682-0.927l0.118-2.401c-6.465-0.854-10.147-7.414-10.147-15.259 0-8.385 5.717-15.207 12.744-15.207 7.03 0 12.753 6.822 12.753 15.207 0 7.812-3.665 14.369-10.109 15.252l0.137 2.399c3.945 0.085 6.198 0.542 9.063 1.355l0.956 0.272 0.451-0.886c2.837-5.605 7.1-8.323 15.986-8.549l0.076-2.406c-5.34-0.471-8.329-5.486-8.329-11.423C89.094 14.169 93.716 9 99.39 9M99.39 8c-6.228 0-11.296 5.618-11.296 12.524 0 6.54 3.297 11.348 8.301 12.29l-0.018 0.573c-8.221 0.386-12.866 3.052-15.908 9.063l-0.077 0.151 -0.165-0.047c-2.713-0.77-4.926-1.229-8.39-1.365l-0.034-0.6c6.056-1.355 10.06-7.678 10.06-16.079 0-8.936-6.17-16.207-13.753-16.207 -7.578 0-13.744 7.27-13.744 16.207 0 8.435 4.022 14.764 10.105 16.092l-0.03 0.61c-2.408 0.134-3.86 0.452-5.942 0.909l-0.152 0.034 -0.075-0.138c-3.134-5.808-7.794-8.355-15.96-8.659l-0.025-0.579c4.908-1.015 8.14-5.809 8.14-12.256C50.426 13.618 45.361 8 39.134 8c-6.336 0-11.299 5.501-11.299 12.524 0 6.53 3.278 11.336 8.255 12.286l-0.019 0.574c-17.443 0.821-18.197 11.367-19.07 23.542L16.926 58H18h23.581l-0.247 0.691 -0.014 0.037 -0.01 0.038c-1.2 4.463-1.677 9.445-2.013 14.164L39.22 74h1.074 56.243 1.074l-0.076-1.071c-0.337-4.723-0.813-9.705-2.013-14.162L95.311 58H121h1.075l-0.077-1.074c-0.886-12.282-1.654-22.919-19.414-23.569l-0.026-0.581c4.899-1.021 8.125-5.815 8.125-12.252C110.682 13.619 105.616 8 99.39 8L99.39 8z">
                                    </path>
                                </g>
                                <g>
                                    <path class="svg-anim svg-anim-instr" fill="none"
                                        d="M68 8.887c-7.21 0.071-13.059 7.049-13.059 15.624 0 8.371 4.053 14.588 10.128 15.622l-0.079 1.628c-2.683 0.113-4.169 0.439-6.369 0.923l-0.575 0.127 -0.281-0.52c-3.089-5.726-7.743-8.169-16.005-8.375l-0.071-1.614c4.899-0.737 8.161-5.412 8.161-11.778 0-6.589-4.808-11.949-10.717-11.949 -6.013 0-10.724 5.249-10.724 11.949 0 6.446 3.306 11.13 8.271 11.8l-0.052 1.613c-17.446 0.615-18.192 11.008-19.054 23.028l-0.033 0.455h24.854l-0.533 1.494c-1.188 4.418-1.661 9.366-1.994 14.056l-0.033 0.455H68">
                                    </path>
                                </g>
                                <g>
                                    <path class="svg-anim svg-anim-instr-rgt" fill="none"
                                        d="M68 73.425h28.994l-0.032-0.455c-0.335-4.696-0.809-9.649-1.995-14.058l-0.409-1.492h26.899l-0.033-0.455c-1.013-14.051-2.834-22.646-19.391-23.051l-0.072-1.615c4.891-0.744 8.146-5.418 8.146-11.775 0-6.589-4.808-11.949-10.717-11.949 -5.911 0-10.721 5.36-10.721 11.949 0 6.455 3.324 11.141 8.316 11.802l-0.051 1.614c-8.315 0.287-12.954 2.845-15.953 8.77l-0.293 0.575 -0.619-0.177c-2.801-0.795-5.062-1.254-8.776-1.361l-0.093-1.623c6.051-1.061 10.087-7.273 10.087-15.612 0-8.619-5.911-15.631-13.178-15.631 -0.037 0-0.073 0.006-0.11 0.007">
                                    </path>
                                </g>
                                <g>
                                    <path class="svg-anim svg-anim-instr-p" fill="none"
                                        d="M69.961 51.674c3.877 0 7.039 0.685 7.039 4.664v0.166c0 4.036-3.205 4.738-6.572 4.738 -0.473 0-1.428 0-1.428-0.018v1.591l1 0.075V66h-6v-3.11l1-0.075v-8.051l-1-0.073v-2.776C66 51.748 68.316 51.674 69.961 51.674M70.376 58.661c1.768 0 2.624-0.433 2.624-1.923v-0.194c0-1.555-0.855-1.858-2.645-1.858 -0.457 0-1.355 0-1.355 0.021v3.932C69 58.639 69.898 58.661 70.376 58.661M69.796 50.674c-1.493 0-3.891 0.064-5.963 0.245L63 50.998v0.917 2.776 0.916l1 0.073v6.221l-1 0.075v0.914 2.776V67h0.671 6.108H71v-1.334V62.89v-0.653c2-0.049 7-0.552 7-5.733v-0.166C78 50.674 72.201 50.674 69.796 50.674L69.796 50.674zM69.67 55.686c0.119 0 0.237 0 0.352 0 1.642 0 1.642 0.199 1.642 0.858v0.194c0 0.595 0 0.923-1.621 0.923 -0.124 0-0.249-0.002-0.373-0.004V55.686L69.67 55.686z">
                                    </path>
                                </g>
                            </svg>
                            {{__('admin.Contact')}}</a></li>
                    <li class="extra-links">
                        <ul class='d-flex align-items-center'>
                            <li class='dropdown-list-item'><a href="#">{{__('admin.about Us')}}</a>
                                <ion-icon name="ios-arrow-down"></ion-icon>
                                <ul>
                                    <li><a href="{{route('about-amg')}}">{{__('admin.about AMG')}}</a></li>
                                    <li><a href="{{route('about-foton')}}">{{__('admin.about FOTON')}}</a></li>
                                    <li><a href="{{route('about-tvd')}}">{{__('admin.about TVD')}}</a></li>
                                </ul>
                            </li>
                            <li class='dropdown-list-item'><a href="#">{{__('admin.News & event')}}</a>
                                <ion-icon name="ios-arrow-down"></ion-icon>
                                <ul>
                                    <li><a href="{{route('events')}}">{{__('admin.events')}}</a></li>
                                    <li><a href="{{route('blogs')}}">{{__('admin.news')}}</a></li>
                                </ul>
                            </li>
                            <li class='dropdown-list-item'><a href="#">{{__('admin.Dealer Network')}}</a>
                                <ion-icon name="ios-arrow-down"></ion-icon>
                                <ul>
                                    <li><a href="{{route('branches')}}">{{__('admin.AMG showrooms')}}</a></li>
                                    <li><a href="{{route('dealers')}}">{{__('admin.dealers')}}</a></li>
                                </ul>
                            </li>
                            <li class='dropdown-list-item'><a href="#">{{__('admin.Gallery')}}</a>
                                <ion-icon name="ios-arrow-down"></ion-icon>
                                <ul>
                                    <li><a href="{{route('images-gallary')}}">{{__('admin.Images')}}</a></li>
                                    <li><a href="{{route('videos-gallary')}}">{{__('admin.videos')}}</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('careers')}}">{{__('admin.careers')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @stack('header')

</header>

@push('scripts')
<script>
    var $header = $('header');
    var searchBox = $header.find('.search-dropdown');
    var inputSearch = $header.find('#search-bar');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    inputSearch.keyup(function() {
        var q = inputSearch.val();
        $.ajax({
            type: "POST",
            url: "{{route('search')}}",
            data: {q:q},
            success: function (response) {
                $('#result').html(response);
            },
            error: function (xhr) {

            }
        });

        searchBox.addClass('show-box');
    });
    $(document).click(function(){
        searchBox.removeClass('show-box');
    });
    searchBox.click(function(e){
        e.stopPropagation();
    });
</script>
@endpush
