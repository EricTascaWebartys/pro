<!-- Blog -->
        {{-- <section class="section-blog-single angle angle--top pb-0"> --}}
        <section class="section-blog-single bg-light">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-8 blog__content mb-0">
                        <article class="entry single-post__entry">
                            <div class="entry__article-wrap" id="blog">

                                @include('front.inc.description_social')

                                <div class="entry__article">
                                    <p><span class="dropcap">C</span>onstuire un <strong>site internet sur mesure</strong>, c'est s'assurer d'avoir une <a href="{{ route('description_2') }}"><strong class="no-strong">conception graphique</strong></a> adaptée à votre business.</p>


                                    <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                        <p>Notre principale motivation est la satisfaction de nos clients.</p>
                                        {{-- <cite>Eric Tasca</cite> --}}
                                    </blockquote>

                                    <h3 class="text-center">Produits</h3>

                                    <div class="blocks-gallery-item is-cropped row">
                                        <div class="blocks-gallery-item col-md-4 col-12">
                                            <a href="{{ route('website_1', ['return' => "1"]) }}">
                                                <figure class="figure-product">
                                                    <img src="{{ asset('img/product_1.jpg') }}" alt="site vitrine">
                                                    <figcaption style="position:relative; bottom:35px; color:#fff;margin:0 auto">Site Vitrine</figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="blocks-gallery-item col-md-4 col-12">
                                            <a href="{{ route('website_2', ['return' => "2"]) }}">
                                                <figure class="figure-product">
                                                    <img src="{{ asset('img/product_2.jpg') }}" alt="site dynamique">
                                                    <figcaption style="position:relative; bottom:35px; color:#fff;margin:0 auto" >Site Dynamique</figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="blocks-gallery-item col-md-4 col-12">
                                            <a href="{{ route('website_3', ['return' => "3"]) }}">
                                                <figure class="figure-product">
                                                    <img src="{{ asset('img/product_3.jpg') }}" alt="site ecommerce">
                                                    <figcaption style="position:relative; bottom:35px; color:#fff;margin:0 auto">E-Commerce</figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h5>Service Après-Vente</h5>
                                            <p>Nous assurons la mise en ligne et l'entretien. Nous proposons nos services à plus ou moins long terme selon votre convenance.</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h5>Expertises en Conseil</h5>
                                            <p>Nous vous accompagnons et concevons nos sites internet de A à Z afin de proposer la meilleure expérience aux utilisateurs.</p>
                                        </div>
                                    </div>

                                    {{-- <hr class="wp-block-separator is-style-dots"> --}}


                                </div>

                            </div>
                        </article>


                    </div> <!-- end blog content -->

                </div>
            </div>
        </section> <!-- end blog -->