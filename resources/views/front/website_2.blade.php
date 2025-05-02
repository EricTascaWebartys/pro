@section('meta')
    <title>Web Artys | site dynamique</title>
    <meta name="description"
        content="Web Artys permet la création site internet dynamique.">
    <meta name="keywords"
        content="créer un site internet; créer un site internet pas cher; acheter site internet dynamique">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection
@include('front.' . app()->getLocale() . '.website_2')
