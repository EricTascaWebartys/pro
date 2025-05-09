<!-- About -->
<section class="section-about pb-72 bg-dark-light bg-first" id="about">
    <div class="about">
        <div class="about__holder">

            <figure class="about__img-holder">
                <div class="animate">
                    <div class="animate-container">
                        <img src="{{ asset('img/about.webp') }}" alt="about us" width="100%">
                        @if($video !== null)
                            <a href="https://www.youtube.com/watch?v=2GdzNhSB6-0" class="play-btn icon-wave single-video-lightbox mfp-iframe" data-effect="mfp-zoom-in">
                            </a>
                        @endif
                    </div>
                </div>
            </figure>

            <div class="about__info">
                <div class="animate">
                    <div class="animate-container">
                        <div class="title-row mb-40">
                            <p class="section-subtitle section-subtitle--line h3">Présentation</p>
                            <div><img src="{{ asset('img/logo/logo-w-green.webp') }}" alt="logo web artys" class="d-block logo-w" loading="lazy"></div>
                            <p class="section-description">
                                Votre projet de <strong class="text-gold">site web</strong>, on le construit avec vous, simplement, sans détour et sans intermédiaire. Ce qui compte pour nous, c’est que vous soyez pleinement satisfait, du début à la fin.

                            </p>
                            <p class="text-center">
                                <a href="tel:0665469516" class="btn btn--lg btn--stroke contact-form-trigger btn--green d-inline-block">
                                    <i class="fa fa-phone mr-2 text-dark"></i>
                                   <span>Appeler</span>
                                </a>
                            </p>

                        </div>

                        <!-- Accordion -->
                        <div id="accordion-1">

                            <div class="accordion">
                                <div class="accordion__panel">
                                    <div class="accordion__heading" id="heading-1">
                                        <a data-toggle="collapse" href="#collapse-1" class="accordion__link accordion--is-open" aria-expanded="true" aria-controls="collapse-1">
                                            <span class="accordion__toggle"></span>
                                            <h4 class="accordion__title">Mission</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-1" class="collapse show" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-1">
                                        <div class="accordion__body">
                                            <p>
                                                Vous accompagner afin de concrétiser votre projet pour créer le <strong class="color-7">site internet</strong> qui correspond en tous points à vos attentes.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion">
                                <div class="accordion__panel">
                                    <div class="accordion__heading" id="heading-2">
                                        <a data-toggle="collapse" href="#collapse-2" class="accordion__link" aria-expanded="true" aria-controls="collapse-2">
                                            <span class="accordion__toggle"></span>
                                            <h4 class="accordion__title">Lieux</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-2" class="collapse" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-2">
                                        <div class="accordion__body">
                                            <p>
                                                Implanté dans la région <strong class="color-7">PACA</strong> et plus précisement dans le département du <strong class="color-7">Vaucluse</strong>.<br>
                                                Vous pouvez prendre rendez-vous sur <strong class="no-strong">Aix-en-Provence</strong>, <strong class="no-strong">Salon-de-Provence</strong>, <strong class="no-strong">Marseille</strong>, <strong class="no-strong">Nîmes</strong>, <strong class="no-strong">Avignon</strong>
                                                et également dans toute la <strong class="color-7">France</strong> et à l'étranger.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion">
                                <div class="accordion__panel">
                                    <div class="accordion__heading" id="heading-3">
                                        <a data-toggle="collapse" href="#collapse-3" class="accordion__link" aria-expanded="true" aria-controls="collapse-3">
                                            <span class="accordion__toggle"></span>
                                            <h4 class="accordion__title">Relation client</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-3" class="collapse" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-3">
                                        <div class="accordion__body">
                                            <p>
                                                {{-- Etre disponible pour nos clients, c'est agir avec vertu. <br> --}}
                                                Nous sommes facilement joignable et nous mettons à disposition un <span class="color-7">Espace Pro</span> ainsi qu'un serveur dédié afin que vous puissiez tester votre <strong class="color-7">application web</strong>. <br>
                                                Vous pouvez bénéficier de notre système de parrainage. <br>
                                                Pour plus d'informations <i class="fas fa-long-arrow-alt-right" style="margin:0 0 0 5px"></i> <a href="{{ route('contact') }}"><i class="far fa-envelope color-5" style="margin-left:5px; margin-right:5px"></i>{{ __('navigation.Contact us') }}</a>
                                                {{-- Envoyer un message : <br> <i class="fas fa-long-arrow-alt-right" style="margin:0 5px"></i> <a href="{{ route('contact') }}"><i class="far fa-envelope color-5" style="margin-left:10px; margin-right:10px"></i>Contacter</a> <br>
                                                joignable par téléphone : <br> <i class="fas fa-long-arrow-alt-right" style="margin:0 5px"></i> <a href="tel:0665469516"><i class="fas fa-mobile-alt color-5" style="margin-left:10px; margin-right:10px"></i>06 65 46 95 16</a> --}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end accordion -->

                    </div>
                </div>

            </div> <!-- end about__info -->

        </div>
    </div>
</section> <!-- end about -->
