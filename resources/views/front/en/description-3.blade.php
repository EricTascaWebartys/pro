@extends('layouts.front.base')

@section('front.content')

        <div class="content-wrap">

            <!-- Page Title -->
            <section class="blog-page-title bg-overlay bg-overlay--light-68 bg-pwa">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="blog-page-title__holder">
                                <span class="entry__meta-category text-gold">
                                    <span class="entry__meta-category-url ">Progressive Web App</span>
                                </span>
                                <h1 class="blog-page-title__title">Opt for the Progressive Web App</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- end page title -->

            <!-- Blog -->
            <section class="section-blog-single pb-96">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-8 blog__content">
                            <article class="entry single-post__entry">
                                <div class="entry__article-wrap">

                                    @include('front.inc.description_social')


                                    <div class="entry__article">
                                        <p><span class="dropcap">T</span>he Progressive Web App allows you to install your website as a real <strong>application</strong> on <span class="color-7">mobile devices, Windows and Mac OS</span> using the browser.</p>

                                        <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                            <p>An all-in-one solution.</p>
                                        </blockquote>

                                        <p>Installing your own <strong>Web Application</strong> without going through a <span class="color-7">Store</span> makes it easier to access. The Progressive Web App is the <span class="color-7">all-in-one</span> solution that will allow you to have your own real application while reducing the costs for future updates.</p>

                                        <figure class="wp-block-image">
                                            <img src="{{ asset('img/devices.webp') }}" alt="web artys devices" class="bg-shadow-box">
                                            <figcaption>Progressive Web App</figcaption>
                                        </figure>

                                        <p>Don't hesitate, opt for the all-in-one solution.</p>

                                        <h3>What is the Progressive Web App ?</h3>

                                        <p>The benefits of an application <strong>PWA</strong> (<strong class="no-strong">Progressive Web App</strong>) :</p>
                                        <ul>
                                            <li>Benefit from your own <strong class="color-7">Web Application</strong> at a lower cost without going through a Store.</li>
                                            <li>A single maintenance for an all-in-one solution.</li>
                                            <li>Installation on PC / Mac and Android / iOS devices.</li>
                                        </ul>
                                        @include('front.inc.videos_link_pwa')
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


            @include('front.inc.'. app()->getLocale() .'.avantages')

            <!-- Prev / Next post -->
            <nav class="entry-navigation" itemscope>
                <div class="entry-navigation__row clearfix">
                    <div class="entry-navigation__col entry-navigation--left">
                        <div class="entry-navigation__img bg-code-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_1', ['return' => $return]) }} @else {{ route('description_1', ['return' => "1"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Previous</span>
                            <h6 class="entry-navigation__title">Perfect Coding</h6>
                        </div>
                    </div>

                    <div class="entry-navigation__col entry-navigation--right bg-overlay">
                        <div class="entry-navigation__img bg-graphic-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_2', ['return' => $return]) }} @else {{ route('description_2', ['return' => "2"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Next</span>
                            <h6 class="entry-navigation__title">Web Design</h6>
                        </div>
                    </div>

                </div> <!-- .entry-navigation__row -->
            </nav> <!-- end prev / next post -->
            @include('front.inc.' . app()->getLocale() . '.webartys')

        </div> <!-- end content wrap -->





@endsection
