@extends('layouts.front.base')

@section('front.content')

	<div class="content-wrap">
		{{-- @include('front.inc.slider_contact') --}}
		<section class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask" id="intro">
			<div class="container">
				<div class="animate"  id="contact">
					<div class="animate-container">
						<p class="intro__text text-center" style="padding-bottom:30px;color:#fff">
							@if($devis === "devis")
								{{ __('navigation.Request for quotation') }}
							@else
								{{ __('navigation.Contact us') }}
							@endif
						</p>
					</div>
				</div>
				<form action="{{ route('contact.post') }}" method="post" style="color:#fff">
					@if(session('errors'))
					  <div class="text-center" style="padding-bottom:20px;color:red">{{ session('errors')->first('message') }}</div>
					@endif
					{{-- @if ($errors->any())
						<div class="alert alert-danger">
							<ul>
							@foreach ($errors->all() as $error)
								<li class="text-danger">{{ $error }}</li>
							@endforeach
							</ul>
						</div>
					@endif --}}
					@csrf
					<div class="row row-16">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="lastname" style="color:#fff">{{ __('navigation.Last name') }} <abbr>*</abbr></label>
								<input type="text" name="lastname"class="name-form @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="firstname" style="color:#fff">{{ __('navigation.First name') }} <abbr>*</abbr></label>
								<input type="text" name="firstname"class="name-form @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="email" style="color:#fff">{{ __('navigation.Email') }} <abbr>*</abbr></label>
								<input type="email" name="email" class="email-form @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="tel" style="color:#fff">{{ __('navigation.Phone number') }} <abbr>*</abbr></label>
								<input type="tel" name="tel" class="name-form @error('tel') is-invalid @enderror" value="{{ old('tel') }}" required>
							</div>
						</div>
					</div>
					<label for="message" style="color:#fff">@if($devis === "devis") {{ __('navigation.Describe your project') }} @else {{ __('navigation.Write your message') }} @endif<abbr>*</abbr></label>
					<textarea name="message" rows="6" class="text-form  @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
						{{-- <div class="form-group pl-2">
							<div class="g-recaptcha" data-sitekey="6LdS5rEUAAAAADxqjvnrA9G8t-IQ1LYgOhkex9l5"></div>
							<br/>

						</div> --}}

						<input type="hidden" name="recaptcha_response" id="recaptchaResponse" value="">




					<div class="text-center pt-3">
						<input type="submit" class="btn btn--lg btn--color" value="{{ __('navigation.Send') }}">
					</div>
				</form>
				<p class="text-center" style="margin-top:8rem"><a href="{{ route('homepage') }}" class="btn btn--lg btn-return-white"> {{ __('navigation.Return') }}</a> </p>
			</div>
		</section>

	</div>

@endsection

@section('recaptcha')
	<script src="https://www.google.com/recaptcha/api.js?render=6LeYIdMdAAAAAKmKvmx8Fn_lBBLrTOFAXy6lpmii"></script>
	<script>
		grecaptcha.ready(function() {
			grecaptcha.execute('6LeYIdMdAAAAAKmKvmx8Fn_lBBLrTOFAXy6lpmii', {action: 'submit'}).then(function(token) {
			   document.getElementById('recaptchaResponse').value = token
			});
		});
	</script>


@endsection
