@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap" style="padding-top: 4rem">
		<div class="content-wrap">

			<section class="section-about pb-72 bg-light" id="about">
				<div class="about"  style="margin-bottom:6rem">
					<div class="about__holder">

						<figure class="about__img-holder">
							<div class="animate">
								<div class="animate-container">
									<img src="{{ asset('img/about/pwa.webp') }}" alt="pwa office">
									<a href="https://www.youtube.com/watch?v=P5mbnM4UAvw" class="play-btn icon-wave single-video-lightbox mfp-iframe" data-effect="mfp-zoom-in">
									</a>
								</div>
							</div>
						</figure>

						<div class="about__info">
							<div class="animate">
								<div class="animate-container">
									<div class="title-row mb-40">
										<h3 class="section-subtitle section-subtitle--line">Progressive Web App</h3>
										<h2 class="section-title">Smartphones & Tablets</h2>
										<p class="section-description">Install your Web Application on smartphones and tablets</p>
									</div>

								</div>
							</div>
						</div> <!-- end about__info -->

					</div>
				</div>

				{{-- @include('front.inc.webartys') --}}

				<div class="text-center mt-40 pt-40">
					{{-- <a href="@if($return !== null && $return === "description") {{ route('description_3') }}#videos @elseif($return !== null && $return === "home") {{ route('homepage') }}#services @else {{ route('products') }} @endif" class="btn btn--lg btn--stroke"><span>Retour</span></a> --}}
					<a href="{{ url()->previous() }}" class="btn btn--lg btn--stroke btn--black"><span>{{ __('navigation.Return') }}</span></a>
				</div>
			</section> <!-- end about -->

		</div> <!-- end content wrap -->

	</div>

@endsection
