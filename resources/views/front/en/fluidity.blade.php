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
									<h3 class="section-subtitle section-subtitle--line">UX/UI Design</h3>
									<h2 class="section-title">Fluid and Intuitive Navigation</h2>
									<p class="section-description">
										One of the advantages of a <strong class="no-strong">website</strong> coded from scratch is that it is quick and intuitive to <strong class="no-strong">navigate</strong>. <br> The emphasis on user experience through <strong class="no-strong">UX design</strong> allows potential customers to be guided in a pleasant, fluid and reassuring manner.
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
