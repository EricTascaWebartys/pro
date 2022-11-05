@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap" style="padding-top: 4rem">
		<div class="content-wrap">

			<!-- Projects -->
			<section class="section-projects pt-96">
				<div class="container-fluid p-0">

					<!-- Filter -->
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="project-filter">
								<a href="#" class="filter active" data-filter=".featured">Conception de A à Z</a>
								<a href="#" class="filter" data-filter=".product">Création Graphique</a>
								<a href="#" class="filter" data-filter=".branding">Progressive Web App</a>
								{{-- <a href="#" class="filter" data-filter="*">Référencement</a> --}}
							</div>
						</div>
					</div> <!-- end filter -->

					<div id="project-grid" class="project-grid project-grid--2-col">

						{{-- <article class="grid-item project hover-shrink featured branding product">
							<a href="{{ route('homepage') }}#blog" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/08.jpg') }}" class="project__img hover-shrink--zoom" alt="project 1">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('homepage') }}#blog">Site intenet sur mesure</a></h3>
									<span class="project__category">Menu Principal</span>
								</div>
							</div>
						</article> --}}
						<article class="grid-item project hover-shrink featured">
							<a href="{{ route('description_1') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/07.jpg') }}" class="project__img hover-shrink--zoom" alt="project 1">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('description_1') }}">Conception de A à Z</a></h3>
									<span class="project__category">Page Principale</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Conception de A à Z
							</div>
						</article>

						<article class="grid-item project hover-shrink featured">
							<a href="{{ route('fluidity') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/11.jpg') }}" class="project__img hover-shrink--zoom" alt="project 2">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('fluidity') }}">Navigation Fluide et Intuitive</a></h3>
									<span class="project__category">Design UX/UI</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Navigation Fluide et Intuitive
							</div>
						</article>

						<article class="grid-item project hover-shrink featured">
							<a href="{{ route('seo') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/09.jpg') }}" class="project__img hover-shrink--zoom" alt="project 2">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('seo') }}">Référencement Naturel</a></h3>
									<span class="project__category">Search Engine Optimization</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Référencement Naturel
							</div>
						</article>

						<article class="grid-item project hover-shrink product">
							<a href="{{ route('description_2') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/05.jpg') }}" class="project__img hover-shrink--zoom" alt="project 3">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('description_2') }}">Création Graphique</a></h3>
									<span class="project__category">Page Principale</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Création Graphique
							</div>
						</article>

						<article class="grid-item project hover-shrink product">
							<a href="{{ route('responsive') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/06.jpg') }}" class="project__img hover-shrink--zoom" alt="project 3">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('responsive') }}">Responsive Design</a></h3>
									<span class="project__category">Voir la description</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Responsive Design
							</div>
						</article>

						<article class="grid-item project hover-shrink product">
							<a href="{{ route('visual.identity') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/10.jpg') }}" class="project__img hover-shrink--zoom" alt="project 3">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('visual.identity') }}">Identité Visuelle</a></h3>
									<span class="project__category">Voir la description</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Identité Visuelle
							</div>
						</article>

						<article class="grid-item project hover-shrink branding">
							<a href="{{ route('description_3') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/03.jpg') }}" class="project__img hover-shrink--zoom" alt="project 4">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('description_3') }}">Progressive Web App</a></h3>
									<span class="project__category">Page Principale</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Progressive Web App
							</div>
						</article>

						<article class="grid-item project hover-shrink branding">
							<a href="{{ route('pwa.office') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/02.jpg') }}" class="project__img hover-shrink--zoom" alt="project 5">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('pwa.office') }}">Windows et Mac</a></h3>
									<span class="project__category">Vidéo d'installation</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Windows et Mac
							</div>
						</article>

						<article class="grid-item project hover-shrink branding">
							<a href="{{ route('pwa') }}" class="project__url">
								<figure class="project__img-holder hover-shrink--shrink">
									<img src="{{ asset('img/products/04.jpg') }}" class="project__img hover-shrink--zoom" alt="project 6">
								</figure>
							</a>
							<div class="project__description-wrap">
								<div class="project__description">
									<h3 class="project__title"><a href="{{ route('pwa.office') }}">Smarphones & Tablettes</a></h3>
									<span class="project__category">Vidéo d'installation</span>
								</div>
							</div>
							<div style="position:absolute; bottom:0; right:0; padding:5px 10px; margin: 13px; background-color:rgba(255, 255, 255, 0.8); color:#333" class="article-responsive">
								Smarphones & Tablettes
							</div>
						</article>

					</div> <!-- end project grid -->

					<div class="text-center mt-72">
						<a href="{{ route('homepage') }}#avantage" class="btn btn--lg btn--color"><span>Nos Produits</span></a>
					</div>

				</div>
			</section> <!-- end projects -->

		</div> <!-- end content wrap -->

	</div>

@endsection
