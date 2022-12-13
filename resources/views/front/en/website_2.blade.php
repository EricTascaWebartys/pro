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
                    <h1 class="project__hero-title">Dynamic Website</h1>
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
                        <h2 class="project__info-title">Dynamic Web Page</h2>
                        <p class="project__info-description lead">We develop content management features to tailor the website to your needs.</p>

                        <p class="project__info-description lead">A <strong>dynamic web page</strong> is a web page generated on demand. The content of a dynamic web page can therefore vary according to information (time, user name, form filled in by the user, etc.) that is only known at the time of its consultation.</p>
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
                                <p class="testimonial__text testimonial-1__text">“A website coded from A to Z benefits from better SEO”</p>
                                <a href="{{ route('seo', ["return" => '5']) }}" class="testimonial__name testimonial-1__name color-7">{{ __('navigation.More') }}</a>
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
