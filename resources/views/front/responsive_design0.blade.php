@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">

		<!-- Project Hero -->
		<div class="project__hero bg-overlay bg-overlay--light">
			<figure class="project__hero-img-holder" style="background-image: url({{ asset('img/responsive.jpg') }});">
				<img src="{{ asset('img/responsive.jpg') }}" alt="responsive design" class="d-none">
			</figure>
			<div class="container">
				<div class="project__hero-info">
					<h1 class="project__hero-title">Responsive Design</h1>
					<p class="project__hero-description">Le Responsive Design adapte la mise en page d’un site en fonction de la résolution d’écran.</p>
				</div>
			</div>
		</div> <!-- end project hero -->
		<section class="section-project-info pb-96">
			<div class="container">
				<div class="row">

					<aside class="col-lg-4">
					<div class="project__info">
						<ul class="project__info-list">
							<li class="project__info-list-item">
								<span class="project__info-list-label">Suivez-nous</span>
								<div class="socials">
									<a href="https://www.facebook.com/WEB-ARTYS-102099831981729" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
									<a href="https://www.linkedin.com/company/webartys/?viewAsMember=true" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
								</div>
							</li>
						</ul>
					</div>
					</aside>

					<div class="col-lg-8">
						<h2 class="project__info-title">Adapté à tous les types d'écrans</h2>
						<p class="project__info-description lead">
							Le <strong class="no-strong">Responsive Design</strong> ou plus précisément le <strong class="no-strong">Responsive Web Design</strong> est une technique de conception d’interface digitale qui fait en sorte que l’affichage d’une quelconque page d’un site s’adapte de façon automatique à la taille de l’écran de l'utilisateur.
						</p>
						<p class="project__info-description lead">
							Plus de 70% des appareils utilisés pour surfer sur internet sont des smartphones ou tablettes.
						</p>
					</div>

				</div>
			</div>
		</section>
		<!-- Project Process -->
		@include('front.inc.webartys')

		{{-- @include('front.inc.webartys') --}}

		<div class="bg-white text-center pt-40 mb-40">
			<a href="@if($return !== null && $return === "description") {{ route('description_3') }} @else {{ route('products') }} @endif" class="btn btn--lg btn--stroke mb-40"><span>Retour</span></a>
		</div>
	</div>

@endsection
