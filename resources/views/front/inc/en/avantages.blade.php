@isset($homepage)
    <section class="section-from-blog pb-96 bg-white">
@else
    <section class="section-from-blog pb-96 pt-40 bg-light">
@endisset
    <div class="container @isset($homepage) bg-white @else bg-light @endif">

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title-row text-center">
                    <h2 class="section-title" id="avantage"  @if(!isset($homepage)) style="color:#686868" @endif>Advantages</h2>
                    <p class="section-description poetsen-one text-dark text-uppercase">Why choose <img src="{{ asset('img/logo/logo-w-green.webp') }}" alt="logo web artys" class="d-inline-block logo-w" loading="lazy"> ?</p>
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
                                    <img src="{{ asset('img/comp-code.webp') }}" class="entry__img hover-shrink--zoom" itemprop="image" alt="web artys conception" loading="lazy">
                                </a>
                            </div>
                            <div class="entry__body">
                                <h4 class="entry__title title-underline">
                                    <a itemprop="headline" href="{{ route('description_1', ['return' => $return]) }}"  @if(!isset($homepage)) style="color:#686868" @endif>Perfect Coding</a>
                                </h4>
                                <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author"  @if(!isset($homepage)) style="color:#fff" @endif>
                                        <span>Your tailor-made web application</span>
                                    </span>
                                </div>
                                {{-- <p class="text-center" style="margin-top:20px"><a class="ml-2 more-info" href="{{ route('description_1', ['return' => $return]) }}">{{ __('navigation.More') }}</a></p> --}}
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
                                    <img src="{{ asset('img/comp-art.webp') }}" class="entry__img hover-shrink--zoom" itemprop="image" alt="web artys art" loading="lazy">
                                </a>
                            </div>
                            <div class="entry__body">
                                <h4 class="entry__title title-underline">
                                    <a href="{{ route('description_2', ['return' => $return]) }}" itemprop="headline"  @if(!isset($homepage)) style="color:#686868" @endif>Web Design</a>
                                </h4>
                                <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author"  @if(!isset($homepage)) style="color:#fff" @endif>
                                        <span>Creation of the visual identity</span>
                                    </span>
                                </div>
                                {{-- <p class="text-center" style="margin-top:20px"><a class="ml-2 more-info" href="{{ route('description_2', ['return' => $return]) }}">{{ __('navigation.More') }}</a></p> --}}
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
                                    <img src="{{ asset('img/comp-pwa.webp') }}" class="entry__img hover-shrink--zoom" itemprop="image" alt="web artys pwa" loading="lazy">
                                </a>
                            </div>
                            <div class="entry__body">
                                <h4 class="entry__title title-underline">
                                    <a itemprop="headline" href="{{ route('description_3', ['return' => $return]) }}"  @if(!isset($homepage)) style="color:#686868" @endif>Progressive Web App</a>
                                </h4>
                                <div class="entry__meta">
                                    <span class="entry__meta-item entry__meta-author"  @if(!isset($homepage)) style="color:#fff" @endif>
                                        <span>App for smartphones & tablets</span>
                                    </span>
                                </div>
                                {{-- <p class="text-center" style="margin-top:20px"><a class="ml-2 more-info" href="{{ route('description_3', ['return' => $return]) }}">{{ __('navigation.More') }}</a></p> --}}
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
