<!-- Related Projects -->
{{-- <section class="section-related-projects pb-96">
    <div class="container"> --}}

        <div class="row justify-content-center" id="videos">
            <div class="col-lg-6">
                <div class="title-row text-center">
                    <h2 class="section-title">Vidéos PWA</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <article class="related-project">
                    <div class="related-project__header hover-shrink">
                        <a href="{{ route('pwa',['return' => $return]) }}" class="d-block hover-shrink--shrink">
                            <img src="{{ asset('img/about/pwa-mini.webp') }}" class="related-project__img hover-shrink--zoom" itemprop="image" alt="pwa android">
                        </a>
                    </div>
                    <div class="related-project__body">
                        <h4 class="related-project__title title-underline">
                            <a href="{{ route('pwa',['return' => $return]) }}" itemprop="headline" style="color:#000">Android</a>
                        </h4>
                        <a href="{{ route('pwa',['return' => $return]) }}" class="related-project__category" style="color:#41b6b5">{{ __('navigation.Watch Video') }}</a>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article class="related-project">
                    <div class="related-project__header hover-shrink">
                        <a href="{{ route('pwa.ios',['return' => $return]) }}" class="d-block hover-shrink--shrink">
                            <img src="{{ asset('img/about/pwa-ios-mini.webp') }}" class="related-project__img hover-shrink--zoom" itemprop="image" alt="pwa ios">
                        </a>
                    </div>
                    <div class="related-project__body">
                        <h4 class="related-project__title title-underline">
                            <a href="{{ route('pwa.ios',['return' => $return]) }}" itemprop="headline" style="color:#000">iPhone & iPad</a>
                        </h4>
                        <a href="{{ route('pwa.ios',['return' => $return]) }}" class="related-project__category" style="color:#41b6b5">{{ __('navigation.Watch Video') }}</a>
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <article class="related-project">
                    <div class="related-project__header hover-shrink">
                        <a href="{{ route('pwa.office',['return' => $return]) }}" class="d-block hover-shrink--shrink">
                            <img src="{{ asset('img/about/pwa-office-mini.webp') }}" class="related-project__img hover-shrink--zoom" itemprop="image" alt="pwa office">
                        </a>
                    </div>
                    <div class="related-project__body">
                        <h4 class="related-project__title title-underline">
                            <a href="{{ route('pwa.office',['return' => $return]) }}" itemprop="headline" style="color:#000">PC & Mac</a>
                        </h4>
                        <a href="{{ route('pwa.office',['return' => $return]) }}" class="related-project__category" style="color:#41b6b5">{{ __('navigation.Watch Video') }}</a>
                    </div>
                </article>
            </div>
        </div>
    {{-- </div>
</section> <!-- end related projects --> --}}
