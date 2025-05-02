@extends('layouts.front.base')
@section('meta')
    <title>Web Artys | Création de site internet</title>
    <meta name="description"
        content="Web Artys permet aux particuliers et aux professionnels de leur site internet.">
    <meta name="keywords"
        content="créer un site internet; créer un site internet pas cher; acheter site internet; entreprise; responsive">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('front.content')
    @include('front.' . app()->getLocale() . '.index')
@endsection
