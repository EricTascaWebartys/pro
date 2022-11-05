<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>webartys</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    </head>
    <body>
        <div style="width:14rem;height: 8rem;margin:0 auto;margin-top:3rem">
            <img src="{{ asset('img/logo.png') }}" width="100%" height="auto" style="display:inline-block">

        </div>
        <div style="text-align:center;margin-bottom:3rem">
            <h2  style="padding-bottom:30px;color:#333">
                {{ $error }}
            </h2>
            <p class="text-center">
                {{-- {{ __('navigation.Oops, something unexpected happened!') }} --}}
                0ops!
            </p>
        </div>
        <div style="width:14rem;height: 14rem;margin:0 auto;">
            <a href="{{ route('homepage') }}">
                <img src="{{ asset('img/default/anim/dog.gif') }}" width="100%" height="100%" style="display:inline-block">

            </a>

        </div>

        <p style="margin-top:4rem;text-align:center"><a href="{{ route('homepage') }}" style="border:solid 1px #a252a3; color:#a252a3; padding: 10px 15px;text-decoration:none "> {{ __('navigation.Return') }}</a> </p>

    </body>
</html>
