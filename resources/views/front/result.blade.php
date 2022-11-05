@extends('layouts.front.base')

@section('front.content')


		<div class="content-wrap">
			{{-- @include('front.inc.slider_testimonies') --}}
			<section class="intro" id="intro">
				<div class="container">
					<div class="animate">
						<div class="animate-container">
							<p class="intro__text text-center" style="padding:40px 0;color:#333">
								@if($value === "1")
									{{ __('navigation.Email Sent') }} <br>
								@elseif ($value === "reset_password")
									Email Envoyé<br>
								@elseif ($value === "reset_password_confirm")
									Mot de passe modifié avec succès<br>
								@else
									Oups, une erreur s'est produite<br>
								@endif
							</p>
							<p class="text-center">
								@if($value === '1')
									{{ __('navigation.Your message has been sent successfully.') }}
								@elseif ($value === "reset_password")
									Veuillez consulter votre adresse Email pour réinitialiser votre mot de passe.<br>
									Pensez également à vérifier votre courrier indésirable ou spam.
								@elseif ($value === "reset_password_confirm")
									Vous pouvez vous connecter avec votre nouveau mot de passe.
									<p class="text-center" style="margin-top:8rem"><a href="{{ route('login') }}" class="btn btn--lg btn--stroke"> Se connecter</a> </p>
								@else
									Veuillez essayer de nouveau. En cas de problème, vous pouvez nous contacter.
								@endif
							</p>
						</div>


					</div>
					<p class="text-center" style="margin-top:8rem"><a href="{{ route('homepage') }}" class="btn btn--lg btn--stroke"> {{ __('navigation.Return') }}</a> </p>

			</section>

		</div>





@endsection
