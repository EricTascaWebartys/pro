@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		<section class="section-about pb-72 bg-light" id="about">
			<div class="about"  style="margin-bottom:6rem">
				<div class="about__holder">

					<figure class="about__img-holder">
						<div class="animate">
							<div class="animate-container">
								<img src="{{ asset('img/about/seo.jpg') }}" alt="responsive design">
								{{-- <a href="https://www.youtube.com/watch?v=P5mbnM4UAvw" class="play-btn icon-wave single-video-lightbox mfp-iframe" data-effect="mfp-zoom-in">
								</a> --}}
							</div>
						</div>
					</figure>

					<div class="about__info">
						<div class="animate">
							<div class="animate-container">
								<div class="title-row mb-40">
									<h3 class="section-subtitle section-subtitle--line">Search Engine Optimization</h3>
									<h2 class="section-title">Référencement Naturel</h2>
									<p class="section-description">
										Le <strong class="no-strong">Référencement</strong> naturel (SEO) peut être défini comme l'art de positionner un site, une page web ou une application dans les premiers résultats naturels des moteurs de recherche. <br>
										Un site codé de A à Z a pour avantage de bénéficier d'un meilleur référencement.
									</p>
								</div>

							</div>
						</div>
					</div> <!-- end about__info -->

				</div>
			</div>
		<!-- Project Process -->
		{{-- @include('front.inc.webartys') --}}

		{{-- @include('front.inc.webartys') --}}

		<div class="text-center pt-40 mb-40">
			{{-- @if($return !== null && $return === "description")
				<a href="{{ route('description_1') }}" class="btn btn--lg btn--stroke mb-40"><span>Retour</span></a>
			@elseif($return !== null && $return === "home")
				<a href="{{ route('homepage') }}#services" class="btn btn--lg btn--stroke mb-40"><span>Retour</span></a>
			@elseif($return !== null && $return === "5")
				<a href="{{ route('website_2', ['return' => "2"]) }}#more" class="btn btn--lg btn--stroke mb-40"><span>Retour</span></a>
			@else
				<a href="{{ url()->previous() }}" class="btn btn--lg btn--stroke mb-40"><span>Retour</span></a>
			@endif --}}
			<a href="{{ url()->previous() }}" class="btn btn--lg btn--stroke mb-40"><span>{{ __('navigation.Return') }}</span></a>
		</div>
	</div>

@endsection
