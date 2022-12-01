@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
                <!-- Project Hero -->
        <div class="project__hero bg-overlay bg-overlay--light">
            <figure class="project__hero-img-holder bg-website_3">
                <img src="{{ asset("img/website_3.webp") }}" alt="site vitrine" class="d-none">
            </figure>
            <div class="container">
                <div class="project__hero-info">
                    <h1 class="project__hero-title">E-Commerce</h1>
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
                        <h2 class="project__info-title">Vente En Ligne</h2>
                        <p class="project__info-description lead">Offrez aux internautes l'expérience d'achat ultime grâce à nos solutions intelligentes.</p>

                        <p class="project__info-description lead">Grâce à votre site <strong>e-commerce</strong>, fidélisez votre clientèle avec les mêmes caractéristiques qu’une boutique physique dans une version en ligne et gérez les tarifs proposés sur vos produits directement sur votre plateforme web.</p>
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
                                <img src="{{  asset('img/website_33.webp') }}" class="testimonial__img testimonial-1__img" alt="site vitrine">
                            </figure>
                            <div class="testimonial__body testimonial-1__body">
                                <p class="testimonial__text testimonial-1__text">“Installez directement votre application web sur vos appareils grâce au Progressive Web App”</p>
                                <a href="{{ route('description_3', ["return" => '6']) }}" class="testimonial__name testimonial-1__name">En Savoir Plus</a>
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
