@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap" id="home">
        <section class="bg-particles bg-techno row">
            <div class="col-lg-5 col-md-7 col-12" style="margin:0 auto;">
                <img src="{{ asset('img/logo/logo-t.webp') }}" alt="web artys" class="d-block mx-auto logo-home" width="100%">
            </div>
            <div class="col-12">
                <p id='head-a-1' class='header text-uppercase text-shadow' style="width:100%;text-align:center">Votre site internet</p>
                <p id='head-a-2' class='header text-uppercase text-shadow' style="width:100%;text-align:center">Conçu pour vous</p>
                <h1 id='head-a-3' class='header text-uppercase text-shadow poetsen-one webartys' style="width:100%;text-align:center">WEB ARTYS</h1>
            </div>
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
                        <p class="intro__text text-center poetsen-one">Creation <strong class="text-gold">Digitale</strong> pour votre entreprise</p>
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
                            <p class="section-title title-home">Creations Digitales</p>
                            <p class="section-description">Découvrez quelques réalisations.</p>
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
                                        <h3 class="project__title"><a href="{{ $demo->link }}" @if($demo->target !== null) target="_blank" @endif>{{ $demo->text }}</a></h3>
                                        <span class="project__category">{{ $demo->category }}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- <div class="text-center mt-40">
                <a href="{{ route('contact') }}" class="btn btn--lg btn--stroke btn--black"><span>Contacter</span></a>
            </div> --}}
        </section>
        {{-- @if($avis !== null)
        <section class="section-testimonials section-testimonials--large-padding bg-pattern" style="">
            <div class="container">

                <div class="row justify-content-center mb-40">
                    <div class="col-lg-7">
                        <div class="title-row text-center">
                            <p class="section-title title-home text-light" style="color: #fff" >Temoignages</p>
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
                                            <span class="testimonial__name" id="avis">{{ $testimony->full_name() }}</span>
                                            <span class="testimonial__company">{{ $testimony->job}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($avis_active->count() > 0)
                        <div style="text-align:center; margin:0 auto;padding-top:40px;">
                            <a href="{{ route('testimonies.show') }}" class="btn btn--lg btn--stroke contact-form-trigger btn--light-border">
                                <span>Voir les avis</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        @endif --}}
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
                            <p class="results__text">Un site internet conçu de A à Z</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">Compatible smartphones & tablettes</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">Navigation simple et rapide</p>
                        </div>
                    </div>
                    <div class="col-lg-3 results-col">
                        <div class="results">
                            <div class="results__counter">
                                <span class="results__number" data-from="0" data-to="100">100</span>
                                <span class="results__suffix">%</span>
                            </div>
                            <p class="results__text">Respect de l'identité visuelle</p>
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
                            <h3 class="section-subtitle section-subtitle--line">ECOUTE - INSPIRATION - QUALITE</h3>
                            <h2 class="section-title webartys-black text-uppercase poetsen-one title-size-bis">Web Artys</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-2">
                        <p class="section-description mt-32">Un site internet performant, qui vous ressemble</p>
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
                                            <span class="team__position">{{ $staff->job }}</span>
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
