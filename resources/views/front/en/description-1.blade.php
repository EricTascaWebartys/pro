@extends('layouts.front.base')

@section('front.content')
        <div class="content-wrap">

            <!-- Page Title -->
            <section class="blog-page-title bg-overlay bg-overlay--light-68 bg-code">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="blog-page-title__holder">
                                <span class="entry__meta-category text-gold">
                                    <span class="entry__meta-category-url ">Perfect Coding</span>
                                </span>
                                <h1 class="blog-page-title__title">Why choose a custom website ?</h1>
                                {{-- <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author">
                                        <span>by</span>
                                        <a href="#" class="entry__meta-author-url">
                                            <span class="entry__meta-author-name" itemprop="author">Camille Alforque</span>
                                        </a>
                                    </span>
                                    <span class="entry__meta-item entry__meta-date" itemprop="datePublished" content="2019-11-13">Sep 18, 2020</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- end page title -->

            <!-- Blog -->
            <section class="section-blog-single angle angle--top angle-mask pb-96">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-8 blog__content">
                            <article class="entry single-post__entry">
                                <div class="entry__article-wrap">

                                    @include('front.inc.description_social')

                                    <div class="entry__article">
                                        <p><span class="dropcap">M</span>aking your <strong>website to measure</strong> means customising it as much as integrating the latest technologies. Our <span class="color-7">priority</span> is to accompany you.</p>

                                        <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                            <p>Opt for a tailor-made website.</p>
                                            {{-- <cite>- Matt Mullenweg, 2017</cite> --}}
                                        </blockquote>

                                        <p>For a company or an entrepreneur, the design of a website is essential. Knowing the advantages of <strong class="no-strong color-7">creating a website</strong> designed from scratch is essential before taking the plunge. The possibility of long-term development must be taken into account. <br>
                                        </p>
                                        <figure class="wp-block-image">
                                            <img src="{{ asset('img/business-lady.webp') }}" alt="business lady">
                                            <figcaption>Choose serenity</figcaption>
                                        </figure>
                                        <p>A tailor-made <strong>website</strong> is to ensure :</p>
                                        <ul>
                                            <li>The future by adding features you want.</li>
                                            <li>Better compatibility for mobile devices.</li>
                                            <li>A <strong class="no-strong">web application</strong> fast and fluid.</li>
                                            <li>Features tailored to your needs.</li>
                                            <li>
                                                A best <strong>Search Engine Optimization</strong> :
                                                <a href="{{ route('seo',['return' => $return]) }}"><i class="fas fa-long-arrow-alt-right" style="margin: 0 5px"></i> {{ __('navigation.More') }} </a>
                                            </li>
                                            <li>
                                                Une navigation intuitive grâce au Design UX/UI.
                                                <a href="{{ route('fluidity',['return' => $return]) }}"><i class="fas fa-long-arrow-alt-right" style="margin: 0 5px"></i> {{ __('navigation.More') }} </a>

                                            </li>
                                        </ul>

                                        <p>To choose a <strong>website</strong> for your company is to choose peace of mind and the possibility of future development. In order for it to correspond to your expectations, it must be as much in line with your company as possible. A quality website will highlight your identity.</p>

                                        <hr class="wp-block-separator is-style-dots">
                                        @include('front.inc.' . app()->getLocale() . '.common_description_1')

                                    </div>

                                </div>
                            </article>

                            {{-- @include('front.inc.btn_avantage') --}}

                        </div> <!-- end blog content -->

                    </div>
                </div>
            </section> <!-- end blog -->


            <!-- Related Posts -->


            <!-- Prev / Next post -->
            <nav class="entry-navigation" itemscope>
                <div class="entry-navigation__row clearfix">
                    <div class="entry-navigation__col entry-navigation--left">
                        <div class="entry-navigation__img bg-graphic-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_2', ['return' => $return]) }} @else {{ route('description_2', ['return' => "2"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Previous</span>
                            <h6 class="entry-navigation__title">Web Design</h6>
                        </div>
                    </div>

                    <div class="entry-navigation__col entry-navigation--right bg-overlay">
                        <div class="entry-navigation__img bg-pwa-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_3', ['return' => $return]) }} @else {{ route('description_3', ['return' => "3"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Next</span>
                            <h6 class="entry-navigation__title">Progressive Web App</h6>
                        </div>
                    </div>

                </div> <!-- .entry-navigation__row -->
            </nav> <!-- end prev / next post -->
            @include('front.inc.' . app()->getLocale() . '.webartys')

        </div> <!-- end content wrap -->


@endsection
