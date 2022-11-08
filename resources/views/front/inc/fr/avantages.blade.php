@isset($homepage)
    <section class="section-from-blog pb-96 angle angle--top angle-mask">
@else
    <section class="section-from-blog pb-96 pt-40">
@endisset
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title-row text-center">
                    <p class="section-title h1 font-weight-bold text-black" id="avantage">Avantages</p>
                    <p class="section-description">Pourquoi choisir Web Artys ?</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="animate">
                    <div class="animate-container">
                        <article class="entry" itemscope>
                            <div class="entry__header hover-shrink">
                                <a href="{{ route('description_1', ['return' => $return]) }}" class="entry__img-url hover-shrink--shrink">
                                    <img src="{{ asset('img/comp-code.jpg') }}" class="entry__img hover-shrink--zoom" itemprop="image" alt="web artys conception">
                                </a>
                            </div>
                            <div class="entry__body">
                                <h4 class="entry__title title-underline">
                                    <a itemprop="headline" href="{{ route('description_1', ['return' => $return]) }}">Conception de A à Z</a>
                                </h4>
                                <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author">
                                        <span>Votre application web sur mesure</span>
                                    </span>
                                </div>
                                <p class="text-center" style="margin-top:20px"><a class="ml-2 more-info" href="{{ route('description_1', ['return' => $return]) }}">En savoir plus</a></p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="animate">
                    <div class="animate-container">
                        <article class="entry" itemscope>
                            <div class="entry__header hover-shrink">
                                <a href="{{ route('description_2', ['return' => $return]) }}" class="entry__img-url hover-shrink--shrink">
                                    <img src="{{ asset('img/comp-art.jpg') }}" class="entry__img hover-shrink--zoom" itemprop="image" alt="web artys art">
                                </a>
                            </div>
                            <div class="entry__body">
                                <h4 class="entry__title title-underline">
                                    <a href="{{ route('description_2', ['return' => $return]) }}" itemprop="headline">Création Graphique</a>
                                </h4>
                                <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author">
                                        <span>Création de l'identité visuelle</span>
                                    </span>
                                </div>
                                <p class="text-center" style="margin-top:20px"><a class="ml-2 more-info" href="{{ route('description_2', ['return' => $return]) }}">{{ __('navigation.More') }}</a></p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="animate">
                    <div class="animate-container">
                        <article class="entry" itemscope>
                            <div class="entry__header hover-shrink">
                                <a href="{{ route('description_3', ['return' => $return]) }}" class="entry__img-url hover-shrink--shrink">
                                    <img src="{{ asset('img/comp-pwa.jpg') }}" class="entry__img hover-shrink--zoom" itemprop="image" alt="web artys pwa">
                                </a>
                            </div>
                            <div class="entry__body">
                                <h4 class="entry__title title-underline">
                                    <a itemprop="headline" href="{{ route('description_3', ['return' => $return]) }}">Progressive Web App</a>
                                </h4>
                                <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author">
                                        <span>Application pour smartphones & tablettes</span>
                                    </span>
                                </div>
                                <p class="text-center" style="margin-top:20px"><a class="ml-2 more-info" href="{{ route('description_3', ['return' => $return]) }}">En savoir plus</a></p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="text-center">
            <a href="{{ route('products') }}" class="btn btn--lg btn--color">
                <span>En Savoir Plus</span>
            </a>
        </div> --}}
    </div>
</section> <!-- end from blog -->
