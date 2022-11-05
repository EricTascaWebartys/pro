@extends('layouts.front.base')

@section('front.content')
    @include('front.' . app()->getLocale() . '.index')
@endsection
