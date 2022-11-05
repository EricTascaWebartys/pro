@extends('layouts.front.base')

@section('front.content')
        <div class="content-wrap">

            <!-- Page Title -->
            <section class="blog-page-title bg-overlay bg-overlay--light-68 bg-code">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="blog-page-title__holder">
                                <span class="entry__meta-category color-5">
                                    <span class="entry__meta-category-url ">Conception de A à Z</span>
                                </span>
                                <h1 class="blog-page-title__title">Pourquoi choisir un site internet sur mesure ?</h1>
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
                                        <p><span class="dropcap">R</span>éaliser votre <strong>site internet sur mesure</strong>, c'est tout autant le personnaliser que lui intégrer les dernières technologies.
                                            Notre <span class="color-7">priorité</span> est de vous accompagner.</p>

                                        <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                            <p>Optez pour un site fait sur mesure.</p>
                                            {{-- <cite>- Matt Mullenweg, 2017</cite> --}}
                                        </blockquote>

                                        <p>Pour une entreprise ou un entrepreneur, la conception d'un site internet est primordiale. Connaître les avantages de réaliser un site
                                            <span class="color-7">conçu de A à Z</span> est indispensable avant de se lancer. Il faut prendre en compte la possibilité d'évolution sur le long terme. <br>
                                        </p>
                                        <figure class="wp-block-image">
                                            <img src="{{ asset('img/business-lady.jpg') }}" alt="business lady">
                                            <figcaption>Choisissez la sérénité</figcaption>
                                        </figure>
                                        <p>Un <strong>site internet sur mesure</strong> c'est garantir :</p>
                                        <ul>
                                            <li>L'avenir en y ajoutant des fonctionnalités que vous souhaitez.</li>
                                            <li>Une meilleure compatibilité pour les appareils mobiles.</li>
                                            <li>Une <strong class="no-strong">application web</strong> rapide et fluide.</li>
                                            <li>Des fonctionnalités adaptées à vos besoins.</li>
                                            <li>
                                                Un meilleur <strong>référencement</strong> naturel : SEO
                                                <a href="{{ route('seo',['return' => $return]) }}" style="color:#03b7fb"><i class="fas fa-long-arrow-alt-right color-5" style="margin: 0 5px"></i> En savoir plus </a>
                                            </li>
                                            <li>
                                                Une navigation intuitive grâce au Design UX/UI.
                                                <a href="{{ route('fluidity',['return' => $return]) }}" style="color:#03b7fb"><i class="fas fa-long-arrow-alt-right color-5" style="margin: 0 5px"></i> En savoir plus </a>

                                            </li>
                                        </ul>

                                        <p>Inverstir pour le <strong>site internet</strong> de son entreprise, c'est choisir la tranquillité et les possibilités d'évolution avenir. Afin qu'il correspond à vos attentes, il doit être au maximum en accord avec votre société. Un site internet de qualité mettra en avant votre identité.</p>

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
                        <div class="entry-navigation__img bg-graphic-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_2', ['return' => $return]) }} @else {{ route('description_2', ['return' => "2"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Précédent</span>
                            <h6 class="entry-navigation__title">Création Graphique</h6>
                        </div>
                    </div>

                    <div class="entry-navigation__col entry-navigation--right bg-overlay">
                        <div class="entry-navigation__img bg-pwa-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_3', ['return' => $return]) }} @else {{ route('description_3', ['return' => "3"]) }} @endif" class="entry-navigation__url"></a>
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
