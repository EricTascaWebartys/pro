@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		{{-- @include('front.inc.slider_login') --}}
		<section class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask" id="intro">
			<div class="container">
				<div class="animate">
					<div class="animate-container">
						<p class="intro__text text-center" style="padding-bottom:30px;color:#fff">
							Réinitialiser mon mot de passe
						</p>
					</div>
				</div>
				<form action="{{ route('reset.password.form.post') }}" method="post" style="color:#fff">
					@csrf
					<input type="hidden" name="reset_token" value="{{ $reset_token }}">
					<div class="row row-16">
						<div class="col-md-6 col-12" style="margin:0 auto">
							<div class="form-group">
								<label for="password" style="color:#fff">Nouveau mot de passe (8 caractères minimum)<abbr>*</abbr></label>
								<input type="password" name="password" class="name-form" value="{{ old('password') }}" required>
							</div>
						</div>
					</div>
					<div class="row row-16">
						<div class="col-md-6 col-12" style="margin:0 auto">
							<div class="form-group">
								<label for="password_confirm" style="color:#fff">Confirmer le mot de passe<abbr>*</abbr></label>
								<input type="password" name="password_confirm" class="name-form" value="" required>
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
										  {{ session('errors')->first('password') }}
									  		@if(session('errors')->first('password_confirm')) Les deux mots de passe doivent être identiques @endif
									  </div>
									@endif
							</div>
							<div class="text-center">
								<input type="submit" class="btn btn--lg btn--color" value="Envoyer">
							</div>
						</form>
						<p class="text-center" style="margin-top:8rem"><a href="{{ route('homepage') }}" class="btn btn--lg btn-return-white"> Retour</a> </p>
					</div>
						</div>
					</div>

		</section>

	</div>

@endsection
