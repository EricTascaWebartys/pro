@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
                <!-- Project Hero -->
        <div class="project__hero bg-overlay bg-overlay--light">
            <figure class="project__hero-img-holder bg-website_1">
                <img src="{{ asset("img/website_1.jpg") }}" alt="site vitrine" class="d-none">
            </figure>
            <div class="container">
                <div class="project__hero-info">
                    <h1 class="project__hero-title">Showcase Website</h1>
                    <p class="project__hero-description">We bring our commitment to the creation and realisation of your projects.</p>
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
                        <p class="project__info-description lead"><strong class="">Web Artys</strong> supports you in all your web design and redesign projects.</p>

                        <p class="project__info-description lead">We propose to create a website with your image to reinforce your image. The objective is to ensure an interface that is both ergonomic and user-friendly. <br> The site must be as effective and efficient as possible for Internet users who are likely to convert into customers.</p>
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
                                <img src="{{  asset('img/website_11.jpg') }}" class="testimonial__img testimonial-1__img" alt="site vitrine">
                            </figure>
                            <div class="testimonial__body testimonial-1__body">
                                <p class="testimonial__text testimonial-1__text">“We ensure that the display of a site's pages automatically adapts to the user's screen size”</p>
                                <a href="{{ route('responsive', ["return" => '4']) }}" class="testimonial__name testimonial-1__name">{{ __('navigation.More') }}</a>
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