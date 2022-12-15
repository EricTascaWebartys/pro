@extends('layouts.front.base')

@section('front.content')
    <div class="content-wrap">
		{{-- @include('front.inc.slider_login') --}}
		<section class="intro bg-dark bg-pattern angle angle--top angle--dark angle-mask">
			<div class="container">
				<div class="animate">
					<div class="animate-container">
						<p class="intro__text text-center" style="padding-bottom:30px;color:#fff">
							{{ __('navigation.Send Password Reset Link') }}
						</p>
					</div>
				</div>

				<form method="POST" action="{{ route('password.email') }}" style="background-color:#fff; padding:40px 20px; margin:0 auto" class="col-md-8 col-12">
                        @if (session('status'))
                            <div class="alert alert-success color-7 text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @csrf
                        <div class="row row-16">
                            <div class="col-md-6 col-12" style="margin:0 auto">
                                <div class="form-group">
                                    {{-- <label for="email">{{ __('navigation.E-Mail Address') }}</label> --}}
                                    <input id="email" placeholder="{{ __('navigation.E-Mail Address') }}" type="email" class="name-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="alert text-danger" style="padding-bottom:20px;color:#ff4747" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn--lg btn--color" value="{{ __('navigation.Send') }}">
                        </div>
                    </form>
                </div>
                @include("front.inc.btn_return")

            </section>
        </div>
@endsection
