<!-- About -->
<section class="section-about pb-72 bg-dark-light bg-first" id="about">
    <div class="about">
        <div class="about__holder">

            <figure class="about__img-holder">
                <div class="animate">
                    <div class="animate-container">
                        <img src="{{ asset('img/about.webp') }}" alt="about us">
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
                            <p class="h3 section-subtitle section-subtitle--line">About</p>
                            <div><img src="{{ asset('img/logo/logo-w-green.webp') }}" alt="logo web artys" class="d-block logo-w" loading="lazy"></div>
                            <p class="section-description">
                                Customer satisfaction is at the heart of our commitment. We accompany you in your <strong class="no-strong">website</strong> creation project in a simple and direct way.
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
                                                To accompany you in order to concretise your project and create the <strong class="color-7">website</strong> that corresponds in every way to your expectations.
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
                                            <h4 class="accordion__title">Locations</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-2" class="collapse" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-2">
                                        <div class="accordion__body">
                                            <p>
                                                Located in the <strong class="color-7">PACA</strong> region and more precisely in the <strong class="color-7">Vaucluse</strong> department.
                                                You can make an appointment in <strong class="no-strong">Aix-en-Provence</strong>, <strong class="no-strong">Salon-de-Provence</strong>, <strong class="no-strong">Marseille</strong>, <strong class="no-strong">Nîmes</strong>, <strong class="no-strong">Avignon</strong> and also throughout <strong class="color-7">France</strong> and abroad.

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
                                            <h4 class="accordion__title">Customer relationship</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-3" class="collapse" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-3">
                                        <div class="accordion__body">
                                            <p>
                                                {{-- Etre disponible pour nos clients, c'est agir avec vertu. <br> --}}
                                                We are easily reachable and we provide a Pro Space and a dedicated server so that you can test your web application.
                                                You can benefit from our referral system.
                                                For more information <i class="fas fa-long-arrow-alt-right" style="margin:0 0 0 5px"></i> <a href="{{ route('contact') }}"><i class="far fa-envelope color-5" style="margin-left:5px; margin-right:5px"></i>{{ __('navigation.Contact us') }}</a>
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
