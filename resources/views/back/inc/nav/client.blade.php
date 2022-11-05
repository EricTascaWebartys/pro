<li>
    <a href="{{ route('client.testimony') }}"><i class="fas fa-pen-fancy"></i><span>Rédiger un avis</span></a>
    {{-- <ul class="nav-second-level" aria-expanded="false">
        <li><a href="maps-google.html">Google Maps</a></li>
        <li><a href="maps-vector.html">Vector Maps</a></li>
    </ul> --}}
</li>

<li>
    <a href="javascript: void(0);"><i class="fas fa-shopping-cart"></i><span>Produits</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('client.products.list', ['token' => Auth::user()->token]) }}">Mes sites</a></li>
        {{-- <li><a href="page-timeline.html">Abonnements</a></li>
        <li><a href="page-tour.html">Applications</a></li> --}}
    </ul>
</li>

<li>
    <a href="javascript:void(0);"><i class="mdi mdi-contact-mail"></i><span>Service Client</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
        <li><a href="{{ route('service.client') }}">Contacter</a></li>
        <li><a href="{{ route('tickets.list',['token' => Auth::user()->token]) }}">Mes tickets</a></li>
    </ul>
</li>
