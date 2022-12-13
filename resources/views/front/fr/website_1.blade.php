@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
                <!-- Project Hero -->
        <div class="project__hero bg-overlay bg-overlay--light">
            <figure class="project__hero-img-holder bg-website_1">
                <img src="{{ asset("img/website_1.webp") }}" alt="site vitrine" class="d-none">
            </figure>
            <div class="container">
                <div class="project__hero-info">
                    <h1 class="project__hero-title">Site Vitrine</h1>
                    <p class="project__hero-description">Nous vous apportons notre engagement dans la création et la réalisation de vos projets.</p>
                </div>
            </div>
        </div> <!-- end project hero -->

        <!-- Project Info -->
        <section class="section-project-info pb-96">
            <div class="container">
                <div class="row">

                    <aside class="col-lg-4">
                        @include('front.inc.' . app()->getLocale() . '.website_info')
                    </aside>

                    <div class="col-lg-8">
                        <h2 class="project__info-title">Web Design</h2>
                        <p class="project__info-description lead"><strong class="">Web Artys</strong> vous accompagne dans tous vos projets de création et refonte web.</p>

                        <p class="project__info-description lead">Nous proposons de créer un site web à votre image pour renforcer votre image. L'objectif d'assurer une interface à la fois ergonomique et agréable aux utilisateurs. <br> Le site doit être le plus efficace et le plus performant possible pour les internautes susceptibles de se convertir en clients.</p>
                    </div>

                </div>
            </div>
        </section> <!-- end project info -->
        <section class="section-testimonials bg-light" id="more">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="testimonial testimonial-1">
                            <figure class="testimonial-1__img-holder">
                                <img src="{{  asset('img/website_11.webp') }}" class="testimonial__img testimonial-1__img" alt="site vitrine">
                            </figure>
                            <div class="testimonial__body testimonial-1__body">
                                <p class="testimonial__text testimonial-1__text">“Nous veillons à ce que l’affichage des pages d’un site s’adapte de façon automatique à la taille de l’écran de l'utilisateur”</p>
                                <a href="{{ route('responsive', ["return" => '4']) }}" class="testimonial__name testimonial-1__name color-7">{{ __('navigation.More') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        @include('front.inc.' . app()->getLocale() . '.avantages')
        {{-- @include('front.inc.btn_return_products') --}}
        @include('front.inc.' . app()->getLocale() . '.webartys')

    </div>

@endsection
