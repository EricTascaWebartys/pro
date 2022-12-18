@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		{{-- @include('front.inc.slider_testimonies') --}}
		<section class="intro" id="intro">
			<div class="container">
				<div class="animate">
					<div class="animate-container">
						<p class="intro__text text-center title-home mb-5">
							{{ __('navigation.Golden book')}}
						</p>
					</div>
						@foreach ($testimonies as $key => $testimony)
							<div class="row">
								<div class="col-lg-1 col-md-2 text-center" >
									<div style="width:5rem;height:5rem; border-radius:50%; border: solid 1px #03b7fb;overflow:hidden; background-color:#686868">
										<img src="{{ $testimony->image_url() }}" alt="web artys avis" style="height:100%; width:auto; ">

									</div>

								</div>
								<div class="col-lg-11 col-md-10 text-left" style="margin-top:1.2rem">


									<span>{{ $testimony->short_name() }}</span>

								</div>
							</div>
								<p class="text-left" style="margin-top:1rem">
									<img src="{{ $testimony->image_note() }}" alt="avis" width="15%" style="display:inline-block">
								</p>
								<p>{{ $testimony->text }}</p>

								@if(!isset($loop->last))
						            <hr class="wp-block-separator is-style-dots">
						        @endif
								@if ($loop->last)

								@else
									<hr class="wp-block-separator is-style-dots">
								@endif

						@endforeach
						<div class="text-center">
							{{ $testimonies->links() }}
						</div>
						<p class="text-center" style="margin-top:8rem"><a href="{{ route('homepage') }}#avis" class="btn btn--lg btn--stroke btn--black"> {{ __('navigation.Return')}}</a> </p>

				</div>

		</section>

	</div>

@endsection
