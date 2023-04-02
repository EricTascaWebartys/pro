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
                    <p class="project__hero-description">We bring our commitment to the creation and realisation of your projects.</p>
                </div>
            </div>
        </div> <!-- end project hero -->

        <!-- Project Info -->
        <section class="section-project-info pb-96 bg-light">
            <div class="container">
                <div class="row">

                    <aside class="col-lg-4">
                        @include('front.inc.' . app()->getLocale() . '.website_info')
                    </aside>

                    <div class="col-lg-8">
                        <h2 class="project__info-title">Online Sales</h2>
                        <p class="project__info-description lead">Give people the ultimate shopping experience with our intelligent solutions.</p>

                        <p class="project__info-description lead">With your <strong>e-commerce site</strong>, build customer loyalty with the same features as a physical shop in an online version and manage the prices offered on your products directly on your web platform.</p>
                    </div>

                </div>
            </div>
        </section> <!-- end project info -->
        <section class="section-testimonials bg-white" id="more">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="testimonial testimonial-1">
                            <figure class="testimonial-1__img-holder">
                                <img src="{{  asset('img/website_33.webp') }}" class="testimonial__img testimonial-1__img" alt="site vitrine">
                            </figure>
                            <div class="testimonial__body testimonial-1__body">
                                <p class="testimonial__text testimonial-1__text">“Install your web application directly on your devices with the Progressive Web App”</p>
                                <a href="{{ route('description_3', ["return" => '6']) }}" class="testimonial__name testimonial-1__name color-7">{{ __('navigation.More') }}</a>
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
