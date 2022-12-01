<!-- About -->
<section class="section-about pb-72 bg-light" id="about">
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
                            <h3 class="section-subtitle section-subtitle--line">About</h3>
                            <h2 class="section-title">Award-Winning
                            Business Startup</h2>
                            <p class="section-description">We want to tell your brand’s story with
                            quality content that will help you inspire.</p>
                        </div>

                        <!-- Accordion -->
                        <div id="accordion-1">

                            <div class="accordion">
                                <div class="accordion__panel">
                                    <div class="accordion__heading" id="heading-1">
                                        <a data-toggle="collapse" href="#collapse-1" class="accordion__link accordion--is-open" aria-expanded="true" aria-controls="collapse-1">
                                            <span class="accordion__toggle"></span>
                                            <h4 class="accordion__title">Who we are</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-1" class="collapse show" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-1">
                                        <div class="accordion__body">
                                            <p>
                                                We are passionate about creating and delivering high quality work, meeting the business needs of our clients and ensuring the very best user experience for their customers.
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
                                            <h4 class="accordion__title">Our philosophy</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-2" class="collapse" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-2">
                                        <div class="accordion__body">
                                            <p>
                                                We are passionate about creating and delivering high quality work, meeting the business needs of our clients and ensuring the very best user experience for their customers.
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
                                            <h4 class="accordion__title">How we work</h4>
                                        </a>
                                    </div>
                                    <div id="collapse-3" class="collapse" data-parent="#accordion-1" role="tabpanel" aria-labelledby="heading-3">
                                        <div class="accordion__body">
                                            <p>
                                                We are passionate about creating and delivering high quality work, meeting the business needs of our clients and ensuring the very best user experience for their customers.
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
