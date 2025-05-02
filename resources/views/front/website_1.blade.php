@section('meta')
    <title>Web Artys | site vitrine</title>
    <meta name="description"
        content="Web Artys permet la création site internet vitrine.">
    <meta name="keywords"
        content="créer un site internet; créer un site internet pas cher; acheter site internet vitrine">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection
@include('front.' . app()->getLocale() . '.website_1')
