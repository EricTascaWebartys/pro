@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
        <section class="p-0">
            <div class="rev_slider_wrapper">
                <div class="rev_slider" id="slider1" data-version="5.0">
                    <ul>
                        <li data-fstransition="fade"
                            data-transition="parallaxtoright"
                            data-easein="default"
                            data-easeout="default"
                            data-slotamount="1"
                            data-masterspeed="1200"
                            data-delay="8000"
                            data-title="The Art of Design"
                            >

                            <img src="{{ asset('img/introduction.jpg') }}"
                                alt=""
                                data-bgrepeat="no-repeat"
                                data-bgfit="cover"
                                data-bgparallax="7"
                                class="rev-slidebg"
                                width="100%"
                                >
                            <div id="anim-title" class="tp-caption hero-title rs-parallaxlevel-7 color-5"
                                data-x="center"
                                data-y="center"
                                data-voffset="[-30, -30, -60, -80]"
                                data-textAlign="center"
                                data-width="[100%, 100%, 100%, 300px]"
                                data-whitespace="[nowrap, nowrap, nowrap, normal]"
                                data-fontsize="[42, 40, 38, 30]"
                                data-frames='[{
                                    "delay":300,
                                    "split":"chars",
                                    "splitdelay":0.05,
                                    "speed":1000,
                                    "split_direction":"forward",
                                    "frame":"0",
                                    "from":"x:50px;opacity:0;fb:20px;",
                                    "ease":"Power3.easeInOut",
                                    "to":"o:1;fb:0;"
                                    },{
                                    "delay":"wait",
                                    "split":"chars",
                                    "splitdelay":0.02,
                                    "speed":900,
                                    "split_direction":"backward",
                                    "frame":"999",
                                    "to":"opacity:0;","ease":"Power3.easeInOut"
                                }]'
                                style="font-family: 'Myriad Web Pro', sans-serif;font-weight:200;color:#333;z-index:2;"
                            >
                                <div class="text-center w-100">
                                  <img src="{{ asset('img/logo.png') }}" alt="logo" class="d-inline-block logo-homepage">
                                </div>
                                <p style="font-family: 'Azonix';letter-spacing: 0.5px;" class="mt-text-anim"><span style="font-family: 'Azonix'">Web</span> Cre<span class="color-7">a</span>tion</p>
                            </div>
                            <div id="fade-title" class="tp-caption hero-video-play rs-parallaxlevel-7"
                                data-x="center"
                                data-y="center"
                                data-voffset="[60, 60, 20, 30]"
                                data-fontsize="[24]"
                                data-textAlign="center"
                                data-frames='[{
                                    "delay":1200,
                                    "speed":1000,
                                    "frame":"0",
                                    "from":"o:0;",
                                    "to":"o:1;","ease":"Power3.easeInOut"
                                },{
                                    "delay":"wait",
                                    "speed":900,
                                    "frame":"999",
                                    "to":"opacity:0;",
                                    "ease":"Power3.easeInOut"
                                }]'
                                >
                                <a href="#about">
                                    <h1 class="hero-video-play__text color-black">Professional Website</h1>
                                </a>
                            </div>

                        </li>
                    </ul>

                    <div class="local-scroll">
                        <a href="#intro" class="scroll-down">
                            <i class="ui-arrow-scroll-down"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <section id="intro" class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask">
            <div class="container">
                <div class="animate">
                    <div class="animate-container">
                        <p class="intro__text text-center">Evolved <span class="color-5">Digital</span> Emotions</p>
                    </div>
                </div>
            </div>
        </section>
        @include('front.inc.'. app()->getLocale() .'.products')
        @include('front.inc.'. app()->getLocale() .'.services')
        <section class="section-results bg-gradient-bottom bg-results">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">A website designed from A to Z</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">Compatible width smartphones and tablets</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">Simple and fast navigation</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">Respect for the visual identity</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('front.inc.'. app()->getLocale() .'.about')
        <section class="section-works bg-light pt-72" id="works">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title-row text-center">
                            <h2 class="section-title">Digital Works</h2>
                            <p class="section-description">Discover our creations and works.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projects-slider">
                @if($demos->count() >0)
                    @foreach ($demos as $key => $demo)
                        <div class="flickity-slide">
                            <article class="project project-slide hover-shrink">
                                <a href="{{ $demo->link }}" class="project__url" @if($demo->target !== null) target="_blank" @endif>
                                    <figure class="project__img-holder hover-shrink--shrink">
                                        <img src="{{ $demo->image_url() }}" class="project__img hover-shrink--zoom" alt="project 1" width="100%" loading="lazy">
                                    </figure>
                                </a>
                                <div class="project__description-wrap">
                                    <div class="project__description">
                                        <h3 class="project__title"><a href="{{ $demo->link }}" @if($demo->target !== null) target="_blank" @endif>{{ $demo->text_en }}</a></h3>
                                        <span class="project__category">{{ $demo->category_en }}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center mt-40">
                <a href="{{ route('contact') }}" class="btn btn--lg btn--stroke"><span>Contact</span></a>
            </div>
        </section>
        <section class="section-team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="title-row">
                            <h3 class="section-subtitle section-subtitle--line">LISTENING - INSPIRATION - QUALITY</h3>
                            <h2 class="section-title">Web Artys</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-2">
                        <p class="section-description mt-32">A high-performance website that looks like you</p>
                    </div>
                </div>
                @if($team->count() >= 3)
                    <div class="row">
                        @foreach ($team as $key => $staff)
                            <div class="col-lg-4">
                                <div class="animate">
                                    <div class="animate-container">
                                        <div class="team">
                                            <img src="{{ $staff->image_url() }}" alt="{{ $staff->full_name() }}" class="team__img" width="100%" loading="lazy">
                                            <h4 class="team__name">{{ $staff->full_name() }}</h4>
                                            <span class="team__position">{{ $staff->job_en }}</span>
                                            <div class="socials socials--rounded mt-16">
                                                @if($staff->link_1 !== null)
                                                    <a href="{{ $staff->link_1 }}" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
                                                @endif
                                                @if($staff->link_2 !== null)
                                                    <a href="{{ $staff->link_2 }}" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                                @endif
                                                @if($staff->link_3 !== null)
                                                    <a href="{{ $staff->link_3 }}" class="social social-google-plus" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    </div>
                @else
                    @include("front.inc.replace_team")
                @endif
            </div>
        </section>
        @if($avis !== null)
        <section class="section-testimonials section-testimonials--large-padding bg-pattern" style="" id="avis">
            <div class="container">
                <div class="row justify-content-center mb-40">
                    <div class="col-lg-7">
                        <div class="title-row text-center">
                            <p class="title-home text-light">Testimonies</p>
                        </div>
                    </div>
                </div>
                <div class="row row-80">
                    @foreach ($avis as $key => $testimony)
                        <div class="col-lg-6">
                            <div class="animate">
                                <div class="animate-container">
                                    <div class="testimonial mb-md-40">
                                        <img src="{{ $testimony->image_url() }}" class="testimonial__img" alt="{{ $testimony->full_name()}}" width="100%" loading="lazy">
                                        <div class="testimonial__body">
                                            <p class="testimonial__text">
                                                “{{ $testimony->text }}”
                                            </p>
                                            <span class="testimonial__name">{{ $testimony->full_name() }}</span>
                                            <span class="testimonial__company">{{ $testimony->job}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($avis_active->count() > 0)
                        <div style="text-align:center; margin:0 auto;padding-top:40px;">
                            <a href="{{ route('testimonies.show') }}" class="btn btn--lg btn--stroke contact-form-trigger">
                                <span>Read More</span>
                            </a>
                        </div>
                    @endif
                </div>

            </div>
        </section>
        @endif
        @include('front.inc.'. app()->getLocale() .'.avantages')
    </div>
@endsection
