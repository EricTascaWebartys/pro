@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
                <!-- Project Hero -->
        <div class="project__hero bg-overlay bg-overlay--light">
            <figure class="project__hero-img-holder bg-website_2">
                <img src="{{ asset("img/website_2.webp") }}" alt="site vitrine" class="d-none">
            </figure>
            <div class="container">
                <div class="project__hero-info">
                    <h1 class="project__hero-title">Site Dynamique</h1>
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
                        <h2 class="project__info-title">Page Web Dynamique</h2>
                        <p class="project__info-description lead">Nous développons des fonctionnalités permettant de gérer du contenu pour adapter le site internet à vos besoins.</p>

                        <p class="project__info-description lead">Une <strong>page web dynamique</strong> est une page web générée à la demande. Le contenu d'une page web dynamique peut donc varier en fonction d'informations (heure, nom de l'utilisateur, formulaire rempli par l'utilisateur, etc.) qui ne sont connues qu'au moment de sa consultation.</p>
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
                                <img src="{{  asset('img/website_22.webp') }}" class="testimonial__img testimonial-1__img" alt="site vitrine">
                            </figure>
                            <div class="testimonial__body testimonial-1__body">
                                <p class="testimonial__text testimonial-1__text">“Un site internet codé de A à Z bénéficie d'un meilleur référencement naturel (SEO)”</p>
                                <a href="{{ route('seo', ["return" => '5']) }}" class="testimonial__name testimonial-1__name">{{ __('navigation.More') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        @include('front.inc.' . app()->getLocale() . '.avantages')
        @include('front.inc.btn_return_products')
        @include('front.inc.' . app()->getLocale() . '.webartys')

    </div>

@endsection
