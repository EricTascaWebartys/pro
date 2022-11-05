@extends('layouts.front.base')

@section('front.content')
		<div class="content-wrap">
			<section class="section-works bg-light pt-72">
				<div class="container">
					<div class="animate">
						<div class="animate-container">
							<p class="text-center" style="font-size:24px;color:#333"> {{ __('navigation.Legal Information') }}</p>
						</div>
					</div>
					@if(app()->getLocale() === "fr")
						@include('front.inc.mentions_fr')
					@else
						@include('front.inc.mentions_en')
					@endif
				</div>
			</section> <!-- end intro -->
		</div> <!-- end content wrap -->
@endsection
