<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>Espace Pro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Web Artys" name="description" />
        <meta content="Web Artys" name="eric tasca" />
        <meta name="service_worker" content="{{ asset('sw.js') }}">
        <link rel="manifest" href="{{ asset('sw.json') }}">
        <meta name="robots" content="noindex" />
        <meta name="googlebot" content="noindex">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114.png') }}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('assets/back/plugins/morris/morris.css')}}">
        <link href="{{ asset('assets/back/plugins/metro/MetroJs.min.css') }}" rel="stylesheet" >

        <!-- App css -->
        <link href="{{ asset('assets/back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/custom.css') }}" rel="stylesheet" type="text/css" />
        @isset($jqueryui)
            <link href="{{ asset('libs/jqueryui/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('libs/jqueryui/css/sortable.css') }}" rel="stylesheet" type="text/css" />

        @endisset


    </head>

    <body>

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('dashboard') }}" class="logo">
                    {{-- <span>
                        <img src="{{ asset('img/logo-web-artys-mini.png') }}" alt="logo web artys" class="logo-sm">
                    </span> --}}
                    <span>
                        <img src="{{asset('img/logo-web-artys-web-white.png')}}" alt="logo web artys" class="logo-lg">
                    </span>
                </a>
            </div>

            <!-- Navbar -->
            <nav class="navbar-custom">

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search here.." />
                        <a href="javascript:void(0);" class="close-search search-btn" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <ul class="list-unstyled topbar-nav float-right mb-0">
                    {{-- <li>
                        <a class="nav-link waves-effect waves-light search-btn" href="javascript:void(0);" data-target="#search-wrap">
                            <i class="mdi mdi-magnify nav-icon"></i>
                        </a>
                    </li> --}}

                    {{-- <li class="hidden-sm">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript: void(0);" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            English <img src="{{ asset('assets/back/images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt=""/> <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript: void(0);"><span> German </span><img src="assets/images/flags/germany_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                            <a class="dropdown-item" href="javascript: void(0);"><span> Italian </span><img src="assets/images/flags/italy_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                            <a class="dropdown-item" href="javascript: void(0);"><span> French </span><img src="assets/images/flags/french_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                            <a class="dropdown-item" href="javascript: void(0);"><span> Spanish </span><img src="assets/images/flags/spain_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                            <a class="dropdown-item" href="javascript: void(0);"><span> Russian </span><img src="assets/images/flags/russia_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                        </div>
                    </li> --}}

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline nav-icon"></i>
                            @if(Auth::user()->notifications())
                                <span class="badge badge-danger badge-pill noti-icon-badge" id="bell">{{ Auth::user()->notifications()->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (<span id="notifications">{{ Auth::user()->notifications->count() }}</span>)
                            </h6>
                            <div class="slimscroll notification-list">
                                @foreach (Auth::user()->notifications as $key => $notification)
                                    <!-- item-->
                                    <div id="notification-{{ $notification->id }}">
                                        <a href="javascript:void(0);" class="dropdown-item notify-item @if($notification->read ===1) active @endif">
                                            <div class="notify-icon {{ $notification->icon_color() }}"><i class="{{ $notification->icon_type() }}"></i></div>
                                            <p class="notify-details">{{ $notification->title }}<small class="text-muted">{{ $notification->text }}</small></p>
                                        </a>
                                        <p class="text-center"><span style="cursor:pointer" title="Effacer" onclick="del_notif({{ $notification->id }})" class="p-2 text-muted">X</span></p>
                                    </div>

                                @endforeach
                        </div>
                    </li>

                    {{-- <li class="hidden-sm">
                        <a class="nav-link waves-effect waves-light" href="javascript:void(0);" id="btn-fullscreen">
                            <i class="mdi mdi-fullscreen nav-icon"></i>
                        </a>
                    </li> --}}

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{ Auth::user()->image_url() }}" alt="profile-user" class="rounded-circle" />
                            <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->full_name() }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.profile', ['token'=> Auth::user()->token]) }}"><i class="dripicons-user text-muted mr-2"></i> Mon profil</a>
                            <a class="dropdown-item" href="{{ route('homepage')}}"><i class="fas fa-backward text-muted mr-2"></i> Retour au site</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted mr-2"></i> Déconnexion</a>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled topbar-nav mb-0">

                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="mdi mdi-menu nav-icon"></i>
                        </button>
                    </li>

                    {{-- <li class="hidden-sm">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-library-plus mr-2"></i>Tools <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                Photoshop
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                Visual Studio
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                Sublime Text 3
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                Phpstorm
                            </a>

                        </div>
                    </li>
                    <li class="hidden-sm">
                        <a class="nav-link waves-effect waves-light" href="../landing/index.html" target="_blank">
                            <i class="mdi mdi-airplane mr-2"></i>Landing
                        </a>
                    </li> --}}
                </ul>

            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <div class="page-wrapper">
            <!-- Left Sidenav -->
            <div class="left-sidenav">
                <ul class="metismenu left-sidenav-menu" id="side-nav">

                    <li class="menu-title">Menu principal</li>

                    {{-- <li>
                        <a class="text-muted">
                            <i class="mdi mdi-speedometer"></i>Tableau de bord
                        </a>
                    </li> --}}
                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-account-location"></i><span>Mon compte</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('user.profile', ['token'=> Auth::user()->token]) }}">Mon profil</a></li>
                            @if(Auth::user()->isDev())
                                <li><a href="{{ route('service.client')}}">Service client</a></li>
                            @endif
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-email-variant"></i><span>Email</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read Email</a></li>
                            <li><a href="email-compose.html">Compose Email</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="calendar.html">
                            <i class="mdi mdi-calendar"></i><span>Calendar</span>
                        </a>
                    </li> --}}

                @if(Auth::user()->isDev())
                    @include('back.inc.nav.admin')

                    @include('back.inc.nav.apparence')
                @endif

                @if(Auth::user()->isClient())
                    @include('back.inc.nav.client')
                @endif
                </ul>
            </div>
            <!-- end left-sidenav-->

            @yield('back.content')
        </div>
        <!-- end page-wrapper -->


        <!-- jQuery  -->
        <script src="{{ asset('assets/back/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.slimscroll.min.js') }}"></script>

        <!--Plugins-->
        @isset($home)
            <script src="{{ asset('assets/back/plugins/morris/morris.min.js') }}"></script>
        @endisset
        <script src="{{ asset('assets/back/plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('assets/back/plugins/metro/MetroJs.min.js') }}"></script>
        <script src="{{ asset('assets/back/plugins/jquery-knob/excanvas.js') }}"></script>
        <script src="{{ asset('assets/back/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('assets/back/pages/jquery.dashboard.init.js') }}"></script>

        @isset($datatable)
            @include('back.inc.datatable')
        @endisset

        @isset($jqueryui)
            @include('back.inc.jqueryui')
        @endisset

        <script type="text/javascript">
            function del_notif(e){
                let element = document.getElementById("notification-"+e);
                // console.log("a.notif-"+e)
                // let element = document.querySelector("notif-"+e);
                // console.log(element);
                let notifications_count = document.getElementById('notifications');
                let bell = document.getElementById('bell');
                $.ajax({
                    url : '{{ route("ajax.delete.notification") }}',
                    type : 'POST',
                    data : {
                        id: e,
                        "_token": "{{ csrf_token() }}"
                    },


                    success : function(r){
                        if(r !== "error") {
                            element.style.display = 'none';
                            notifications_count.innerHTML = r;
                            bell.innerHTML = r;
                        }
                    }
                });

            };
        </script>
        <!-- App js -->
        <script src="{{ asset('assets/back/js/app.js') }}"></script>

        <script type="text/javascript" src="{{ asset('libs/pwa/script.js') }}"></script>
    </body>
</html>
