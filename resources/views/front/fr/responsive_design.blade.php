@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		<section class="section-about pb-72 bg-light" id="about">
			<div class="about"  style="margin-bottom:6rem">
				<div class="about__holder">

					<figure class="about__img-holder">
						<div class="animate">
							<div class="animate-container">
								<img src="{{ asset('img/about/responsive.webp') }}" alt="responsive design">
								{{-- <a href="https://www.youtube.com/watch?v=P5mbnM4UAvw" class="play-btn icon-wave single-video-lightbox mfp-iframe" data-effect="mfp-zoom-in">
								</a> --}}
							</div>
						</div>
					</figure>

					<div class="about__info">
						<div class="animate">
							<div class="animate-container">
								<div class="title-row mb-40">
									<h3 class="section-subtitle section-subtitle--line">Smartphones & Tablettes</h3>
									<h2 class="section-title">Responsive Design</h2>
									<p class="section-description">
										Le <strong class="no-strong">Responsive Design</strong> ou plus précisément le <strong class="no-strong">Responsive Web Design</strong> est une technique de conception d’interface digitale qui fait en sorte que l’affichage d’une quelconque page d’un site s’adapte de façon automatique à la taille de l’écran de l'utilisateur.
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

			<a href="{{ url()->previous() }}" class="btn btn--lg btn--stroke btn--black mb-40"><span>{{ __('navigation.Return') }}</span></a>
		</div>
	</div>

@endsection
