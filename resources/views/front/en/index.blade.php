@extends('layouts.front.base')
@section('front.content')
    <div class="content-wrap" id="home">
        <section class="row background-green bg-particles">
                <div class="background"></div>
                <div class="col-lg-4 col-md-7 col-12" style="margin:0 auto">
                    <img src="{{ asset('img/logo/logo-middle.webp') }}" alt="web artys" class="d-block mx-auto logo-home" id="animatedImage">
                </div>
                <div class="col-12" style="display: flex">
                    <h1 class="title text-uppercase text-shadow" id="title" style="margin: 0 auto"></h1>
                </div>

                    {{-- <p id='head5' class='header font-weight-bold mb-3'></p> --}}
                    <div class="local-scroll">
                        <a href="#about" class="scroll-down btn-introduction" style="font-size: 2rem">
                            <i class="ui-arrow-scroll-down text-gold"></i>
                        </a>
                    </div>
        </section>
        <section id="intro" class="bg-introduction-bottom-2">
            <div class="bg-introduction-bottom-1"></div>
            <div class="container">
                <div class="animate">
                    <div class="animate-container">
                        <p class="intro__text text-center poetsen-one">Evolved <strong class="text-gold">Digital</strong> Emotions</p>
                    </div>
                </div>
            </div>
        </section>
        @include('front.inc.'. app()->getLocale() .'.about')
        @include('front.inc.'. app()->getLocale() .'.products')
        @include('front.inc.'. app()->getLocale() .'.services')
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
            {{-- <div class="text-center mt-40">
                <a href="{{ route('contact') }}" class="btn btn--lg btn--stroke btn--black"><span>Contact</span></a>
            </div> --}}
        </section>
        @include('front.inc.'. app()->getLocale() .'.avantages')
        <section class="section-results bg-gradient-bottom bg-results">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text text-shadow poetsen-one">A website designed from A to Z</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text text-shadow poetsen-one">Compatible smartphones & tablets</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text text-shadow poetsen-one">Simple and fast navigation</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text text-shadow poetsen-one">Respect for the visual identity</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-team bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="title-row">
                            <span class="h3 section-subtitle section-subtitle--line">LISTENING - INSPIRATION - QUALITY</span>
                            <span class="h2 section-title webartys-black text-uppercase poetsen-one title-size-bis">Web Artys</span>
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
    </div>
@endsection

@section('title-animation.js')
    <script src="{{ asset("libs/title/title.js") }}"></script>
@endsection
