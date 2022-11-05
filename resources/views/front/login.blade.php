@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		{{-- @include('front.inc.slider_login') --}}
		<section class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask" id="intro">
			<div class="container">
				<div class="animate">
					<div class="animate-container">
						<p class="intro__text text-center" style="padding-bottom:30px;color:#fff">
							Espace Pro
						</p>
					</div>
				</div>
				<form action="{{ route('login.post') }}" method="post" style="color:#fff">
					@csrf
					<div class="row row-16">
						<div class="col-md-6 col-12" style="margin:0 auto">
							<div class="form-group">
								<label for="email" style="color:#fff">Login<abbr>*</abbr></label>
								<input type="text" name="email" class="name-form" value="{{ old('email') }}" required="">
							</div>
						</div>
					</div>
					<div class="row row-16">
						<div class="col-md-6 col-12" style="margin:0 auto">
							<div class="form-group">
								<label for="password" style="color:#fff">Mot de passe<abbr>*</abbr></label>
								<input type="password" name="password" class="name-form" value="{{ old('password') }}" required="">
							</div>
						</div>
					</div>
					<div class="row row-16">
						<div class="col-md-6 col-12" style="margin:0 auto">
							<div class="gdpr-checkbox">
								<div class="form-group pl-2">
									{{-- <div class="g-recaptcha" data-sitekey="6LdS5rEUAAAAADxqjvnrA9G8t-IQ1LYgOhkex9l5"></div>
									<br/> --}}
									@if(session('errors'))
									  <div class="alert text-danger" style="padding-bottom:20px;color:#ff4747">
									  	{{ session('errors')->first('message_1') }}
									  	{{ session('errors')->first('email') }}
									  	{{ session('errors')->first('password') }}
									  </div>
									@endif
							</div>
							<div class="text-center">
								<p class="text-right"><a href="{{ route("reset.password") }}">Mot de passe oublié ?</a> </p>
								<input type="submit" class="btn btn--lg btn--color" value="Se connecter">
							</div>
						</form>
						<p class="text-center" style="margin-top:8rem"><a href="{{ route('homepage') }}" class="btn btn--lg btn-return-white"> Retour</a> </p>
					</div>
						</div>
					</div>

		</section>

	</div>

@endsection
