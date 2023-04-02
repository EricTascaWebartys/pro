@extends('layouts.front.base')

@section('front.content')

        <div class="content-wrap">

            <!-- Page Title -->
            <section class="blog-page-title bg-overlay bg-overlay--light-68 bg-graphic">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="blog-page-title__holder">
                                <span class="entry__meta-category text-gold">
                                    <span class="entry__meta-category-url ">Web Design</span>
                                </span>
                                <h1 class="blog-page-title__title">Let's build your visual identity together</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- end page title -->

            <!-- Blog -->
            <section class="section-blog-single angle angle--top  angle-mask pb-96">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-8 blog__content">
                            <article class="entry single-post__entry">
                                <div class="entry__article-wrap">

                                    @include('front.inc.description_social')


                                    <div class="entry__article">
                                        <p><span class="dropcap">L</span>et's build the visual identity that suits you, to create a <strong>website</strong> that reflects your <span class="color-7">company</span>'s image.</p>

                                        <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                            <p>Give a soul to your website.</p>
                                        </blockquote>

                                        <p>Your <strong>website</strong> adapted to smartphones and tablets thanks to <span class="color-7">responsive design</span>. The respect of your graphic charter and our knowledge to serve the company. </p>

                                        <figure class="wp-block-image">
                                            <img src="{{ asset('img/ame.webp') }}" alt="web artys graphic" class="bg-shadow-box">
                                            <figcaption>Graphic Design</figcaption>
                                        </figure>

                                        <p>An interface that meets your expectations.</p>

                                        <h3>Smartphone & tablet compatible</h3>

                                        <p>Don't wait any longer, choose a design adapted to your image.</p>
                                        <ul>
                                            <li>Respect of the graphic charter.</li>
                                            <li>
                                                Visual identity.
                                                <a href="{{ route('visual.identity',['return' => $return]) }}" class="color-7"><i class="fas fa-long-arrow-alt-right color-7" style="margin: 0 5px"></i> {{ __('navigation.More') }} </a>
                                            </li>
                                            <li>
                                                Responsive Design.
                                                <a href="{{ route('responsive',['return' => $return]) }}" class="color-7"><i class="fas fa-long-arrow-alt-right color-7" style="margin: 0 5px"></i> {{ __('navigation.More') }} </a>
                                            </li>
                                        </ul>
                                        <hr class="wp-block-separator is-style-dots">
                                        @include('front.inc.' . app()->getLocale() . '.common_description_1')

                                    </div>

                                </div>
                            </article>

                            @include('front.inc.btn_avantage')

                        </div> <!-- end blog content -->

                    </div>
                </div>
            </section> <!-- end blog -->



            <!-- Related Posts -->

            <!-- Prev / Next post -->
            <nav class="entry-navigation" itemscope>
                <div class="entry-navigation__row clearfix">
                    <div class="entry-navigation__col entry-navigation--left">
                        <div class="entry-navigation__img bg-code-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_1', ['return'=> $return]) }} @else {{ route('description_1', ['return' => "1"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Previous</span>
                            <h6 class="entry-navigation__title">Perfect Coding</h6>
                        </div>
                    </div>

                    <div class="entry-navigation__col entry-navigation--right bg-overlay">
                        <div class="entry-navigation__img bg-pwa-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_3', ['return'=> $return]) }} @else {{ route('description_3', ['return' => "3"]) }} @endif" class="entry-navigation__url"></a>
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
