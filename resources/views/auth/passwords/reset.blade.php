@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
		{{-- @include('front.inc.slider_login') --}}
		<section class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask">
			<div class="container">
				<div class="animate">
					<div class="animate-container">
                        <p class="intro__text text-center" style="padding-bottom:30px;color:#fff">
							{{ __('navigation.Reset Password') }}
						</p>
					</div>
				</div>

				<form method="POST" action="{{ route('password.update') }}" style="background-color:#fff; padding:40px 20px; margin:0 auto" class="col-md-8 col-12">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-6" style="margin:0 auto">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('navigation.E-Mail Address') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-6" style="margin:0 auto">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('navigation.Password') }}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-6" style="margin:0 auto">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('navigation.Confirm Password') }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn--lg btn--color">
                                    {{ __('navigation.Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
@endsection
