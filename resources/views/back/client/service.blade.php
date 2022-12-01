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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                                {{-- <li class="breadcrumb-item">Avis</li> --}}
                                @if(Auth::user()->isDev())
                                <li class="breadcrumb-item"><a href="{{ route('clients.list') }}">Utilisateurs</a></li>
                                @endif
                                <li class="breadcrumb-item active">Mon Profil</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Service Client</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="card profile">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('img/default/erict.webp') }}" alt="eric tasca" class="rounded-circle img-thumbnail thumb-xl">
                                <div class="online-circle">
                                    <i class="fa fa-circle text-success"></i>
                                </div>
                                <h4 class="">{{ $information->full_name() }}</h4>
                                <p class="text-muted font-12">{{ $information->job }}</p>
                                <a href="tel:{{ $information->phone }}" class="btn btn-pink btn-round px-5" target="_blank">Appeler</a>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="mt-0 mb-3">Web Artys</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mt-2">{{ $information->days }}</li>
                                <li class="mt-2"><i class="far fa-clock text-success font-18 mr-2"></i>{{ $information->hours }}</li>
                                <li class="mt-2"><a href="tel:0665469516"><i class="mdi mdi-phone mt-2 mr-2 text-success font-18"></i></a>{{ $information->clean_phone($information->phone) }}</li>
                                <li class="mt-2"><a href="mailto:{{ $information->email }}"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i></a>{{ $information->email }}</li>
                                <li class="mt-2"><i class="mdi mdi-map-marker text-success font-18 mt-2 mr-2"></i>{{ $information->uppercase($information->country) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <div class="card">
                        <div class="card-body profile">
                            <h5 class="mt-0 mb-4">Nos coordonnées</h5>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <i class="far fa-building text-muted mr-2"></i>WEB ARTYS
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="text-muted font-13">@if(Auth::user()->role === "ROLE_CLIENT") Votre n° client : {{ Auth::user()->client_number }} @endif</p>
                                    </div>
                                </div>

                            <div class="row mb-4">
                                <div class="col-md-6 col-12">
                                    <i class="far fa-id-card text-muted mr-2"></i>siren : {{ $information->siren() }}
                                </div>
                                <div class="col-md-6 col-12">
                                    <i class="fas fa-at text-muted"></i> : {{ $information->email }}
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 col-12">
                                    <i class="fas fa-phone text-muted mr-2"></i><span>Tél Fixe : </span> {{ $information->phone_fix }}

                                </div>
                                <div class="col-md-6 col-12">
                                    <i class="fas fa-mobile-alt text-muted mr-2"></i><span> Tél Mobile : </span> {{ $information->phone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p>Adresse</p>
                                    <div class="text-left">
                                        {!! $information->full_address() !!}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- container -->
        @include('back.inc.footer')
    </div>
    <!-- end page content -->
@endsection
