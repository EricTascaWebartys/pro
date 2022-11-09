<div class="row">
    <div class="col-lg-4">
        <div class="animate">
            <div class="animate-container">
                <div class="team" style="padding:10px">
                    <a href="{{ route("description_2") }}">
                        <img src="{{ asset('img/design.jpg') }}" alt="design graphique" class="team__img bg-shadow-box" with="100%" loading="lazy">
                    </a>
                    <h4 class="team__name">@if(app()->getLocale() === "fr") Design graphique @else Graphic Design @endif</h4>
                    <span class="team__position">
                        @if(app()->getLocale() === "fr")
                            Un visuel attrayant
                        @else
                            An attractive visual
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="animate">
            <div class="animate-container">
                <div class="team" style="padding:10px">
                    <a href="{{ route("seo") }}">
                        <img src="{{ asset('img/seo.jpg') }}" alt="design graphique" class="team__img bg-shadow-box" with="100%" loading="lazy">
                    </a>
                    <h4 class="team__name">@if(app()->getLocale() === "fr") SEO @else SEO @endif</h4>
                    <span class="team__position">
                        @if(app()->getLocale() === "fr")
                            Un bon référencement naturel
                        @else
                            A good referencing
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="animate">
            <div class="animate-container">
                <div class="team" style="padding:10px">
                    <a href="{{ route("description_3") }}">
                        <img src="{{ asset('img/pwa.jpg') }}" alt="design graphique" class="team__img bg-shadow-box" with="100%" loading="lazy">
                    </a>
                    <h4 class="team__name">@if(app()->getLocale() === "fr") Responsive design @else Responsive design @endif</h4>
                    <span class="team__position">
                        @if(app()->getLocale() === "fr")
                            Compatible avec tous les appareils
                        @else
                            Compatible with all devices
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
