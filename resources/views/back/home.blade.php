@extends('layouts.back.base')

@section('back.content')

    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Web Artys</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="card profile">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $information->image_url() }}" alt="" class="rounded-circle img-thumbnail thumb-xl">
                                @if($dev_connected !== null)
                                    <div class="online-circle">
                                        <i class="fas fa-circle text-success"></i>
                                    </div>
                                @endif
                                <h4 class="">{{ $information->full_name() }}</h4>
                                <p class="text-muted font-12">{{ $information->job }}</p>
                                <p class="font-13 text-muted">{{ $information->welcome }}</p>
                                <a href="mailto:{{ $information->email }}" class="btn btn-pink btn-round px-5">Me contacter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <a class="float-right text-muted font-13" href="{{ route('client.testimony') }}"><i class="fas fa-pen-fancy"></i></a>
                            <ul class="list-unstyled text-muted mb-1">
                                <li class="list-inline-item font-13">Je donne mon avis</li>
                            </ul>
                            <div class="text-center">
                                <a href="{{ route('client.testimony') }}"><img src="{{ asset('img/redaction.png')}}" alt="book" width="100px"></a>
                            </div>
                            <h5 class="pt-2 text-center">Donnez votre avis </h5>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mt-0 mb-3">Programme de parrainage</h5>
                            <p>
                                Bénéficiez d'une réduction de 150 € grâce au parrainage <br>
                            </p>
                            <p class="text-muted text-center">Offre valable avant la livraison du produit</p>

                            <ul class="list-unstyled text-center text-muted mb-0 mt-2">
                                <li class="list-inline-item font-16">Ecoute</li>
                                <li class="list-inline-item font-16">Inspiration</li>
                                <li class="list-inline-item font-16">Qualité</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 align-self-center">
                                    <div class="icon-info">
                                        {{-- <i class="mdi mdi-playlist-check text-success"></i> --}}
                                        @if(Auth::user()->profile_complete() === 100)
                                            <span class="badge badge-soft-success mt-1 shadow-none"><i class="fas fa-smile"></i></span>
                                         @else
                                             <span class="badge badge-soft-warning mt-1 shadow-none"><i class="far fa-smile"></i></span>
                                         @endif
                                         <span class="mb-3 ml-2"> Complété à</span>
                                    </div>

                                </div>
                                <div class="col-8 align-self-center text-center">
                                    <div class="ml-2 text-right">
                                        <p class="mb-0 text-muted font-13">Mon profil</p>
                                        <span class="mt-0 font-20"><strong class="mr-2">{{ $percent_profil }} %</strong></span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress mt-2" style="height:3px;">
                                <div class="progress-bar progress-animated  @if($percent_profil === 100) bg-success @else bg-warning @endif" role="progressbar" style="max-width: ""{{ $percent_profil }}""%;" aria-valuenow="{{ $percent_profil }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="text-center text-muted">
                                <a class="btn btn-sm  btn-primary text-white px-3 mt-2 mb-0" href="{{ route('user.profile', ["token" => Auth::user()->token]) }}">@if($percent_profil === 100) modifier @else compléter @endif</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mt-0 mb-3">A propos</h5>
                            <h5 class="text-dark"><span class="text-muted">{{ Auth::user()->full_name() }}</span></h5>

                            <h5 class="text-primary pt-2"><small class="text-muted mr-2">Membre depuis le  </small> {{ date("d/m/Y", strtotime(Auth::user()->created_at)) }}</h5>

                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-8">
                    @if(Auth::user()->isDev() || Auth::user()->isAdmin())
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0 mb-3 text-center">Liste des produits</h5>
                                @foreach ($products as $key => $product)
                                    <div>
                                        <h5 class="text-dark pt-2">{{ $product->name }}</h5>
                                        <p>{{ $product->user()->first()->full_name() }}</p>
                                        <small class="text-muted">Date de mise en ligne</small>
                                        <h5 class="text-primary">@if($product->date_online !== null){{ date("d/m/Y", strtotime($product->date_online)) }}@endif</h5>
                                    </div>
                                    @if ($loop->last)

                                    @else
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mt-0 mb-3 text-center">Mes produits</h5>
                                @foreach (Auth::user()->products()->get() as $key => $product)
                                    <div>
                                        <h5 class="text-dark pt-2">{{ $product->name }}</h5>
                                        <small class="text-muted">Date de mise en ligne</small>
                                        <h5 class="text-primary">@if($product->date_online !== null){{ date("d/m/Y", strtotime($product->date_online)) }}@endif</h5>
                                    </div>
                                    @if ($loop->last)

                                    @else
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        @if(Auth::user()->isDev() || Auth::user()->isAdmin())
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-diamond text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 align-self-center text-center">
                                            <div class="ml-2 text-right">
                                                <p class="mb-1 text-muted font-13">Projets</p>
                                                <h4 class="mt-0 mb-1 font-20">{{ $number_products }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar progress-animated  bg-warning" role="progressbar" style="max-width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-account-multiple text-purple"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 align-self-center text-center">
                                            <div class="ml-2 text-right">
                                                <p class="mb-1 text-muted font-13">Membres</p>
                                                <h4 class="mt-0 mb-1 font-20">{{ $members }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar progress-animated  bg-purple" role="progressbar" style="max-width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="col-md-6">
                                <a href="{{ route('user.profile', ['token' => Auth::user()->token]) }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 align-self-center">
                                                    <div class="icon-info">
                                                        <i class="mdi mdi-diamond text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="ml-2 text-right">
                                                        <p class="mb-1 text-muted font-13">Produits</p>
                                                        <h4 class="mt-0 mb-1 font-20">{{ Auth::user()->products()->count() }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress mt-2" style="height:3px;">
                                                <div class="progress-bar progress-animated  bg-warning" role="progressbar" style="max-width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.profile', ['token' => Auth::user()->token]) }}">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 align-self-center">
                                                    <div class="icon-info">
                                                        <i class="mdi mdi-account text-purple"></i>
                                                    </div>
                                                </div>
                                                    <div class="col-8 align-self-center text-center">
                                                        <div class="ml-2 text-right">
                                                            <p class="mb-1 text-muted font-13">Mon Profil</p>
                                                            <p class="mt-0 mb-1 font-20 text-muted"><i class="far fa-address-card"></i></p>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="progress mt-2" style="height:3px;">
                                                <div class="progress-bar progress-animated  bg-purple" role="progressbar" style="max-width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endif
                        {{-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-playlist-check text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 align-self-center text-center">
                                            <div class="ml-2 text-right">
                                                <p class="mb-0 text-muted font-13">Tasks</p>
                                                <span class="mt-0 font-20"><strong>40</strong></span>
                                                <span class="badge badge-soft-success mt-1 shadow-none">Active</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar progress-animated  bg-success" role="progressbar" style="max-width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-4 align-self-center">
                                            <div class="icon-info">
                                                <i class="mdi mdi-coin text-pink"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-8 align-self-center text-center">
                                            <div class="ml-2 text-right">
                                                <p class="mb-1 text-muted font-13">Budget</p>
                                                <h4 class="mt-0 mb-1 font-20">$18090</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-2" style="height:3px;">
                                        <div class="progress-bar progress-animated  bg-pink" role="progressbar" style="max-width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
