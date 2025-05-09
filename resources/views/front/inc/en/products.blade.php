<!-- Blog -->
        {{-- <section class="section-blog-single angle angle--top pb-0"> --}}
        <section class="section-blog-single bg-light">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-10 blog__content mb-0">
                        <article class="entry single-post__entry">
                            <div class="entry__article-wrap" id="blog">

                                {{-- @include('front.inc.description_social') --}}

                                <div class="entry__article">
                                    <p><span class="dropcap">B</span>uilding a customised <strong>website</strong> means ensuring that the <a href="{{ route('description_2') }}"><strong class="color-7">graphic design</strong></a> is adapted to your business</p>


                                    <blockquote style="text-align:center" class="wp-block-quote is-style-default">
                                        <p>Our main motivation is the satisfaction of our customers.</p>
                                        {{-- <cite>Eric Tasca</cite> --}}
                                    </blockquote>

                                    <h3 class="text-center"> Our Products</h3>

                                    <div class="blocks-gallery-item is-cropped row">
                                        <div class="blocks-gallery-item col-md-4 col-12">
                                            <a href="{{ route('website_1', ['return' => "1"]) }}">
                                                <figure class="figure-product">
                                                    <img src="{{ asset('img/product_1.webp') }}" alt="site vitrine">
                                                    <figcaption style="position:relative; bottom:35px; color:#fff;margin:0 auto" class="h3 text-uppercase font-weight-bold"><span class="figure-text">Showcase Website</span></figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="blocks-gallery-item col-md-4 col-12">
                                            <a href="{{ route('website_2', ['return' => "2"]) }}">
                                                <figure class="figure-product">
                                                    <img src="{{ asset('img/product_2.webp') }}" alt="site dynamique">
                                                    <figcaption style="position:relative; bottom:35px; color:#fff;margin:0 auto" class="h3 text-uppercase font-weight-bold"><span class="figure-text">Dynamic Website</span></figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="blocks-gallery-item col-md-4 col-12">
                                            <a href="{{ route('website_3', ['return' => "3"]) }}">
                                                <figure class="figure-product">
                                                    <img src="{{ asset('img/product_3.webp') }}" alt="site ecommerce">
                                                    <figcaption style="position:relative; bottom:35px; color:#fff;margin:0 auto" class="h3 text-uppercase font-weight-bold"><span class="figure-text">E-Commerce</span></figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h5>After Sales Service</h5>
                                            <p>We provide online services and maintenance. We offer our services on a long or short term basis depending on your needs.</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h5>Consulting expertise</h5>
                                            <p>We support you and design our websites from A to Z to provide the best user experience.</p>
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
