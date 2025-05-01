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
                                <h1 class="blog-page-title__title">Optez pour le Progressive Web App</h1>

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
                                        <p><span class="dropcap">L</span>e progressive Web App permet d'installer votre site internet comme une véritable <strong>application</strong> sur les appareils <span class="color-7">Mobiles, Windows et Mac OS</span>
                                         au moyen du navigateur.</p>

                                        <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                            <p>Une solution tout en un.</p>
                                        </blockquote>

                                        <p>Installer sa propre Application Web sans passer par un <span class="color-7">Store</span>
                                        permet d'y accéder plus facilement. Le <strong>Progressive Web App</strong> est la solution <span class="color-7">tout en un</span> qui vous permettra d'avoir votre véritable application en réduissant les coûts pour les futures mises à jour.</p>

                                        <figure class="wp-block-image">
                                            <img src="{{ asset('img/devices.webp') }}" alt="web artys devices" class="bg-shadow-box">
                                            <figcaption>Progressive Web App</figcaption>
                                        </figure>

                                        <p>N'hésitez plus, optez pour le tout en un.</p>

                                        <h3>Qu'est ce que le Progressive Web App ?</h3>

                                        <p>Les avantages d'une application <strong>PWA</strong> (<strong class="no-strong">Progressive Web App</strong>) :</p>
                                        <ul>
                                            <li>Bénéficier de sa propre <strong class="color-7 no-strong">Application Web</strong> à moindre côut sans passer par un Store.</li>
                                            <li>Une seule maintenance pour une solution tout en un.</li>
                                            <li>Installation sur PC / Mac et les appareils Android / iOS.</li>
                                            {{-- <li>Installation sur Android.
                                                <a href="{{ route('pwa',['return' => 'description']) }}" style="color:#031321"><i class="fas fa-long-arrow-alt-right color-5" style="margin: 0 5px"></i>Vidéo<i class="fab fa-youtube color-youtube" style="margin-left:5px"></i>  </a>
                                            </li>
                                            <li>Installation sur iOS.
                                                <a href="{{ route('pwa.ios',['return' => 'description']) }}" style="color:#031321"><i class="fas fa-long-arrow-alt-right color-5" style="margin: 0 5px"></i>Vidéo<i class="fab fa-youtube color-youtube" style="margin-left:5px"></i></a>
                                            </li>
                                            <li>Installation sur PC / Mac.
                                                <a href="{{ route('pwa.office',['return' => 'description']) }}" style="color:#031321"><i class="fas fa-long-arrow-alt-right color-5" style="margin: 0 5px"></i>Vidéo <i class="fab fa-youtube color-youtube" style="margin-left:5px"></i></a>
                                            </li> --}}
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



            <!-- Related Posts -->

            <!-- Prev / Next post -->
            <nav class="entry-navigation" itemscope>
                <div class="entry-navigation__row clearfix">
                    <div class="entry-navigation__col entry-navigation--left">
                        <div class="entry-navigation__img bg-code-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_1', ['return' => $return]) }} @else {{ route('description_1', ['return' => "1"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Précédent</span>
                            <h6 class="entry-navigation__title">Conception de A à Z</h6>
                        </div>
                    </div>

                    <div class="entry-navigation__col entry-navigation--right bg-overlay">
                        <div class="entry-navigation__img bg-graphic-mini"></div>
                        <a href="@if($return !== null && $return === "home") {{ route('description_2', ['return' => $return]) }} @else {{ route('description_2', ['return' => "2"]) }} @endif" class="entry-navigation__url"></a>
                        <div class="entry-navigation__body">
                            <span class="entry-navigation__label">Suivant</span>
                            <h6 class="entry-navigation__title">Création Graphique</h6>
                        </div>
                    </div>

                </div> <!-- .entry-navigation__row -->
            </nav> <!-- end prev / next post -->
            @include('front.inc.' . app()->getLocale() . '.webartys')

        </div> <!-- end content wrap -->





@endsection
