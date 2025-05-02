@section('meta')
    <title>Web Artys | e-commerce</title>
    <meta name="description"
        content="Web Artys permet la création site e-commerce.">
    <meta name="keywords"
        content="créer un site internet; créer un site internet pas cher; acheter site e-commerce">
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection
@include('front.' . app()->getLocale() . '.website_3')
