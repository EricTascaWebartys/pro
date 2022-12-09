<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <title>WEB ARTYS</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="web artys">
    	<meta name="cookies" content="{{ route('mentions') }}" id=mentions_url>
        <meta name="service_worker" content="{{ asset('sw.js') }}">
        <link rel="manifest" href="{{ asset('sw.json') }}">
        @if(!isset($index_page) || app()->getLocale() !== "fr")
             <meta name="robots" content="noindex" />
             <meta name="googlebot" content="noindex">
         @endisset
    	{{-- <link href='//fonts.googleapis.com/css?family=DM+Sans:400,400i,500,700' rel='stylesheet'> --}}
    	<link async rel="stylesheet" href="{{ asset('assets/front/css/style.min.css') }}" />
    	{{-- <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}" /> --}}
    	<link rel="shortcut icon" href="{{ asset('img/favicon.webp') }}">
    	<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.webp') }}">
    	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72.webp') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114.webp') }}">
    	{{-- <link rel="stylesheet" href="{{ asset('libs/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css"> --}}
        <link async rel='stylesheet' href='{{ asset('assets/front/revolution-addons/distortion/css/distortion.css') }}' type='text/css' media='all' />
        <link rel="stylesheet" href="{{ asset("css/front/design.css") }}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        {{-- <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Black+Ops+One&family=Cabin+Condensed&family=NTR&family=Text+Me+One&family=Tomorrow:wght@100;200;300;400&display=swap" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ asset('libs/settings/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('libs/tarteaucitron/css/custom.css') }}">
    </head>
    <body data-spy="scroll" data-offset="60" data-target=".nav__holder" id="home" itemscope>
    	<div class="loader-mask">
    		<div class="loader">
    			"Loading..."
    		</div>
    	</div>
    	<header class="nav nav--always-fixed" itemscope>
            <div class="nav__holder nav--sticky  nav--align-center" @if(!isset($homepage)) style="background-color:#fff;color:#333" @endif>
    			<div class="container-fluid container-semi-fluid nav-color-resp">
    				<div class="flex-parent">
    					<div class="nav__header clearfix">
    						<div class="logo-wrap local-scroll">
    							<a href="{{ route('homepage') }}" class="logo__url">
    								<img class="logo" src="{{ asset('/img/logo-mini.webp') }}" alt="logo web artys" itemscope>
    							</a>
    						</div>
    						<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
    							<span class="sr-only">Toggle navigation</span>
    							<span class="nav__icon-toggle-bar"></span>
    							<span class="nav__icon-toggle-bar"></span>
    							<span class="nav__icon-toggle-bar"></span>
    						</button>
    					</div>
    					<nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse" itemscope="itemscope">
    						<ul class="nav__menu local-scroll" id="onepage-nav">
    							<li class="nav__dropdown">
    								<a href="@if(isset($homepage)) #home @else {{ route('homepage') }}#home @endif" class="nav-link @if(isset($homepage)) home_active @endif" aria-haspopup="true">{{ __('navigation.Home') }}</a>
    								<i class="ui-arrow-down nav__dropdown-trigger" role="button" aria-haspopup="true" aria-expanded="false" style="color:rgba(255,255,255,0)"></i>
    							</li>
                                <li>
                                    <a href="@if(isset($homepage)) #blog @else {{ route('homepage') }}#blog @endif" class="nav-link  @if(isset($products)) home_active @endif">{{ __('navigation.Products') }}</a>
                                </li>
    							<li>
    								<a href="@if(isset($homepage)) #services @else {{ route('homepage') }}#services @endif" class="nav-link">{{ __('navigation.Services') }}</a>
    							</li>
    							<li>
    								<a href="@if(isset($homepage)) #about @else {{ route('homepage') }}#about @endif" class="nav-link">{{ __('navigation.About') }}</a>
    							</li>
    							<li>
    								<a href="@if(isset($homepage)) #works @else {{ route('homepage') }}#works @endif" class="nav-link">{{ __('navigation.Works') }}</a>
    							</li>
                                <li>
                                    <a href="@if(isset($homepage)) #avis @else {{ route('homepage') }}#avis @endif" class="nav-link  @if(isset($avis_page)) home_active @endif">{{ __('navigation.Testimonies') }}</a>
                                </li>
    							<li>
    								<a href="{{ route('contact', ['devis' => 'devis']) }}" class="nav-link @if(isset($contact)) home_active @endif">{{ __('navigation.Quote') }}</a>
    							</li>

                                <li class="hide-up">
                                    <a href="@if(Auth::user()) {{ route('dashboard') }} @else {{ route('login') }} @endif" class="nav-link">{{ __('navigation.Pro Area') }}</a>
                                </li>
                                <li>
                                    @if(app()->getLocale() == "en")
                                        <a class="nav-link" href="{{ route('lang',['locale' => "fr"]) }}">
                                            <img src="{{ asset('img/flag/fr.webp') }}" alt="Fr" width="30px" height="20px">
                                        </a>
                                    @else
                                        <a class="nav-link" href="{{ route('lang',['locale' => "en"]) }}">
                                            <img src="{{ asset('img/flag/en.webp') }}" alt="Fr" width="30px" height="20px">
                                        </a>
                                    @endif
                                </li>
    						</ul>
    						<div class="nav__mobile-socials d-lg-none">
    							<div class="socials">
                                    <a href="https://www.facebook.com/WEB-ARTYS-102099831981729" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-facebook" style="color:#686868"></i></a>
    								<a href="https://www.linkedin.com/company/webartys/?viewAsMember=true" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin" style="color:#686868"></i></a>
    							</div>
    						</div>

    					</nav>
    					<div class="nav__socials flex-child d-none d-lg-block">
    						<div class="socials right">
                                <a href="https://www.facebook.com/WEB-ARTYS-102099831981729" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-facebook"></i></a>
    							<a href="https://www.linkedin.com/company/webartys/?viewAsMember=true" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</header>
        <main class="main-wrap">
             @yield('front.content')
     		<footer class="footer bg-dark bg-pattern responsive-footer">
     			<div class="container">
     				<div class="footer__widgets">
     					<div class="row">
                            <div class="col-lg-4 col-md-6">
     							<div class="widget text-center text-md-left responsive-footer">
     								<h3 class="widget-cta__title white mb-32">{{ __('navigation.Write a message') }}</h3>
     								<a href="{{ route('contact') }}" class="btn btn--lg btn--stroke contact-form-trigger">
     									<span>{{ __('navigation.Contact us') }}</span>
     								</a>
     							</div>
     						</div>
     						<div class="col-lg-4 col-md-6">
     							<div class="widget widget-about-us text-center">
     								<span class="widget-about-us__text">{{ __('navigation.Call Us') }}</span>
     								<a href="tel:0665469516" class="widget-about-us__phone"><i class="fas fa-phone-square color-5" style="margin-right:10px"></i>06 65 46 95 16</a>
                                    <span class="widget-about-us__text">{{ __('navigation.Social Networks') }}</span>

     								<div class="socials mt-20">
     									<a href="https://www.linkedin.com/company/webartys/?viewAsMember=true" class="social social-google-plus" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
     									<a href="https://www.facebook.com/WEB-ARTYS-102099831981729" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
     								</div>
     							</div>
     						</div>
     						<div class="col-lg-4 col-md-6">
     							<div class="widget widget-address">
                                    <h4 class="widget-about-us__text">WEB ARTYS</h4>
     								<address class="widget-address__address"><strong style="font-weight:normal">{{ __('navigation.Website') }}</strong> <br>
     								<strong style="font-weight:normal">{{ __('navigation.Conception / Creation') }}</strong><br>
     								<strong style="font-weight:normal">France</strong></address>
     								<a href="https://www.google.com/maps/place/M%C3%A9rindol/@43.7647291,5.1183257,12z/data=!3m1!4b1!4m5!3m4!1s0x12ca048bc91624a5:0x40819a5fd8fc280!8m2!3d43.755673!4d5.202391" class="widget-address__url" target="-_blank">
                                        {{ __('navigation.Get Address') }}
                                    </a>
     							</div>
     						</div>
     					</div>
     				</div>
     			</div>
     			<div class="footer__bottom">
     				<div class="container">
     					<div class="copyright-wrap text-center">
     						<span class="copyright">
     							&copy; {{ date('Y') }} - <strong>WEB ARTYS</strong> - <a href="{{ route('mentions') }}" class="copyright">{{ __('navigation.Legal Information') }}</a>
     						</span>
     					</div>
     				</div>
     			</div>
     		</footer>
            <div class="footer-placeholder" id="contact"></div>
             <div id="back-to-top">
                 <a href="#top"><i class="ui-arrow-up"></i></a>
             </div>
         </main>
         <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
         @include('libs.settings.settings')
         <script type="text/javascript">
             let Url_mentions = "{{ route('mentions') }}";
             let Url_contact = "contact.php";
         </script>
        {{-- <script async type="text/javascript" src="{{ asset('libs/fontawesome/js/all.js') }}"></script> --}}

        {{-- @include('libs.tarteaucitron.script') --}}

        <script defer src="{{ asset('assets/front/js/scripts.min.js') }}"></script>
        <script defer src="{{ asset('libs/settings/js/script.js') }}"></script>
     	<script defer type='text/javascript' src='{{ asset('assets/front/revolution-addons/distortion/js/revolution.addon.distortion.min.js') }}'></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
     	<script defer type="text/javascript" src="{{ asset('assets/front/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script defer type="text/javascript" src="{{ asset('libs/pwa/script.js') }}"></script>
        <script defer type="text/javascript">
            $(document).click(function(event) {
                if(!$(event.target).closest('.navbar').length){
                    $('.navbar-collapse').collapse('hide');
                    }
                });
                document.addEventListener('scroll', function (event) {
                    $('.navbar-collapse').collapse('hide');
            }, true);
        </script>
        <script type="text/javascript">
            var currentLanguage = "{{ app()->getLocale() }}";
            window.tarteaucitronForceLanguage = currentLanguage;
        </script>
        <script type="text/javascript">
            let ImageCookiesUrl = '<img src="{{ asset('libs/tarteaucitron/img/option-57.webp') }}" alt="cookies" />';
        </script>
        <script type="text/javascript" src="{{ asset('libs/tarteaucitron/tarteaucitron.js') }}"></script>
        <script type="text/javascript" src="{{ asset('libs/tarteaucitron/js/script.js') }}"></script>
        @if(Config::get('app.env') === "production")
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=GT-P35NMVR"></script>
            <script >
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag('js', new Date());

                  gtag('config', 'GT-P35NMVR');

                  tarteaucitron.user.gtagUa = 'GT-P35NMVR';
                  // tarteaucitron.user.gtagCrossdomain = ['example.com', 'example2.com'];
                  tarteaucitron.user.gtagMore = function () { /* add here your optionnal gtag() */ };
                  (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
            </script>
            @yield('recaptcha')
        @endif
    </body>
</html>
