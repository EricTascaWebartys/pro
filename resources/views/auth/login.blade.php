@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
		{{-- @include('front.inc.slider_login') --}}
		<section class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask" id="intro">
			<div class="container">
				<div class="animate">
					<div class="animate-container">
						<p class="intro__text text-center" style="padding-bottom:30px;color:#fff">
							{{ __('navigation.Pro Area') }}
						</p>
					</div>
				</div>
                    <form method="POST" action="{{ route('login') }}" style="background-color:#fff; padding:40px 20px; margin:0 auto" class="col-md-8 col-12">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-6" style="margin:0 auto">
                                <input id="email" placeholder="{{ __('navigation.E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="alert text-danger" role="alert">
                                        <strong class="color-7">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-6" style="margin:0 auto">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('navigation.Password') }}" required autocomplete="current-password">

                                @error('password')
                                    <span class="alert text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-20">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check" style="margin-bottom:30px">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('navigation.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn--lg btn--color" style="margin-bottom:30px">
                                    {{ __('navigation.Login') }}
                                </button>

                                <br>

                                @if (Route::has('password.request'))
                                    <a class="color-5 ml-20" href="{{ route('password.request') }}" onmouseover="this.style.color='#03b7fb';">
                                        {{ __('navigation.Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

@endsection
