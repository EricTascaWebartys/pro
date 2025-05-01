<!-- Service Boxes -->
<section id="services" class="pb-72 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="title-row animate">
                    <div class="animate-container">
                        <span class="section-subtitle section-subtitle--line h3">Nos Services</span>
                        <p class="section-title title-home mt-2">Services</p>
                        <p class="section-description">Création de <strong class="no-strong">site internet</strong> et d'<strong class="no-strong">application web</strong> sur mesure pour répondre au besoin de l'entreprise.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="animate">
                    <div class="animate-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="service">
                                    <i class="service__icon o-edit-window-1 color-7"></i>
                                    <p class="service__title h4 font-weight-bold text-black">Design UX/UI </p>
                                    <p class="service__text">L'expérience des utilisateurs au centre de la conception.
                                        <i class="fas fa-long-arrow-alt-right" style="margin:0 5px"></i> <a href="{{ route('fluidity',["return" => 'home']) }}" style="color:#41b6b5"> {{ __('navigation.More') }}</a>
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="service">
                                    <i class="service__icon o-source-code-1 color-7"></i>
                                    <p class="service__title h4 font-weight-bold text-black">Progressive Web App</p>
                                    <p class="service__text">
                                        <strong class="no-strong">Application web</strong> adaptée aux tablettes et mobiles.
                                        <i class="fas fa-long-arrow-alt-right" style="margin:0 5px"></i> <a href="{{ route('pwa',["return" => 'home']) }}" style="color:#41b6b5"><i class="fab fa-youtube color-5" style="margin-left:10px"></i> {{ __('navigation.Video') }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="service">
                                    <i class="service__icon o-call-contact-1 color-7"></i>
                                    <p class="service__title h4 font-weight-bold text-black">Hotline</p>
                                    <p class="service__text">
                                        Disponible du lundi au vendredi <br>
                                        9h - 19h. <i class="fas fa-long-arrow-alt-right" style="margin:0 5px"></i> <a href="tel:0665469516" style="color:#41b6b5"><i class="fas fa-mobile-alt color-5" style="margin-left:10px"></i> 06 65 46 95 16</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="service">
                                    <i class="service__icon o-strategy-1 color-7"></i>
                                    <p class="service__title h4 font-weight-bold text-black">Référencement Naturel</p>
                                    <p class="service__text">
                                        Optimisation pour les moteurs de recherche.
                                        <i class="fas fa-long-arrow-alt-right" style="margin:0 5px"></i> <a href="{{ route('seo',["return" => 'home']) }}" style="color:#41b6b5"> {{ __('navigation.More') }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> <!-- end service boxes -->
