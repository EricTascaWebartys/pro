@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		<section class="section-about pb-72 bg-light" id="about">
			<div class="about"  style="margin-bottom:6rem">
				<div class="about__holder">

					<figure class="about__img-holder">
						<div class="animate">
							<div class="animate-container">
								<img src="{{ asset('img/about/fluidity.jpg') }}" alt="responsive design">
								{{-- <a href="https://www.youtube.com/watch?v=P5mbnM4UAvw" class="play-btn icon-wave single-video-lightbox mfp-iframe" data-effect="mfp-zoom-in">
								</a> --}}
							</div>
						</div>
					</figure>

					<div class="about__info">
						<div class="animate">
							<div class="animate-container">
								<div class="title-row mb-40">
									<h3 class="section-subtitle section-subtitle--line">Design UX/UI</h3>
									<h2 class="section-title">Navigation Fluide et Intuitive</h2>
									<p class="section-description">
										L'un des avantages d'un <strong class="no-strong">site internet</strong> codé de A à Z est de proposer une <strong class="no-strong">Navigation</strong> rapide et intuitive. <br> La mise en avant de l'expérience utilisateur grâce au <strong class="no-strong">Design UX/UI</strong> permet guider les potentiels clients, de manière agréable, fluide et rassurante.
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
			<a href="{{ url()->previous() }}" class="btn btn--lg btn--stroke mb-40"><span>{{ __('navigation.Return') }}</span></a>
		</div>
	</div>

@endsection
