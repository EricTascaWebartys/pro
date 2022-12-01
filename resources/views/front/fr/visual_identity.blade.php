@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		<section class="section-about pb-72 bg-light" id="about">
			<div class="about"  style="margin-bottom:6rem">
				<div class="about__holder">

					<figure class="about__img-holder">
						<div class="animate">
							<div class="animate-container">
								<img src="{{ asset('img/about/visual_identity.webp') }}" alt="responsive design">
								{{-- <a href="https://www.youtube.com/watch?v=P5mbnM4UAvw" class="play-btn icon-wave single-video-lightbox mfp-iframe" data-effect="mfp-zoom-in">
								</a> --}}
							</div>
						</div>
					</figure>

					<div class="about__info">
						<div class="animate">
							<div class="animate-container">
								<div class="title-row mb-40">
									<h3 class="section-subtitle section-subtitle--line">Création</h3>
									<h2 class="section-title">Identité Visuelle</h2>
									<p class="section-description">
										Votre entreprise ou votre marque est à la recheche d'une suite d'éléments <strong class="no-strong">visuels graphiques</strong> tel que le <strong class="no-strong">logo</strong>, les polices ou les couleurs ? <br> Nous proposons en complément la création de votre <strong class="no-strong">Charte Graphique</strong>.
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
