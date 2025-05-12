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
                                    <span class="entry__meta-category-url ">Création Graphique</span>
                                </span>
                                <h1 class="blog-page-title__title">Construisons ensemble votre identité visuelle</h1>

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
                                        <p><span class="dropcap">C</span>onstruisons l'identité visuelle qui vous correspond, pour <strong>créer un site internet</strong> à l'<span class="color-7">image</span>
                                         de votre entreprise.</p>

                                        <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                            <p>Donnez une âme à votre site internet.</p>
                                        </blockquote>

                                        <p>Votre <strong>site internet</strong> adapté au smartphones et tablettes grâce au <span class="color-7">responsive design</span>. Le respect de votre <span class="color-7">charte graphique</span>
                                        et notre savoir faire au service de l'entreprise. </p>

                                        <figure class="wp-block-image">
                                            <img src="{{ asset('img/ame.webp') }}" alt="web artys graphic" class="bg-shadow-box">
                                            <figcaption>Création Graphique</figcaption>
                                        </figure>

                                        <p>Une interface qui correspond à vos attentes.</p>

                                        <h3>Compatible smartphones & tablettes</h3>

                                        <p>N'attendez plus, choisissez un design adapté à votre image.</p>
                                        <ul>
                                            <li>Respect de la charte graphique.</li>
                                            <li>
                                                Identité visuelle.
                                                <a href="{{ route('visual.identity',['return' => $return]) }}" class="color-7"><i class="fas fa-long-arrow-alt-right color-7" style="margin: 0 5px"></i> En savoir plus </a>
                                            </li>
                                            <li>
                                                Responsive Design.
                                                <a href="{{ route('responsive',['return' => $return]) }}" class="color-7"><i class="fas fa-long-arrow-alt-right color-7" style="margin: 0 5px"></i> En savoir plus </a>
                                            </li>
                                        </ul>
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
                        <a href="@if($return !== null && $return === "home") {{ route('description_1', ['return'=> $return]) }} @else {{ route('description_1', ['return' => "1"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Précédent</span>
                            <h6 class="entry-navigation__title">Conception de A à Z</h6>
                        </div>
                    </div>

                    <div class="entry-navigation__col entry-navigation--right bg-overlay">
                        <div class="entry-navigation__img bg-pwa-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_3', ['return'=> $return]) }} @else {{ route('description_3', ['return' => "3"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Suivant</span>
                            <h6 class="entry-navigation__title">Progressive Web App</h6>
                        </div>
                    </div>

                </div> <!-- .entry-navigation__row -->
            </nav> <!-- end prev / next post -->
            @include('front.inc.' . app()->getLocale() . '.webartys')

        </div> <!-- end content wrap -->





@endsection
