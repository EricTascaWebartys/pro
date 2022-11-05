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
                                <li class="breadcrumb-item"><a href="{{ route('user.profile', ["token"=> $user->token]) }}">Editer</a></li>

                                <li class="breadcrumb-item active">Supprimer mon compte</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($user->id !== null) {{ $user->full_name() }} @else Nouvel utilisateur @endif </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="col-md-12 col-lg-6">
                <div class="card ">
                    <div class="card-body">
                        <p class="text-right"><a href="{{ route('user.profile',["token" => $user->token]) }}" class="btn btn-info m-4"><i class="fas fa-eye mr-2"></i> Profil</a></p>

                        <h5 class="mt-0">Suppression définitive de votre compte ?</h5>
                        <p class="text-muted font-13 mb-4">@if($user->id !== null  && $user->role === "ROLE_CLIENT") N° client : {{ $user->client_number }} @endif</p>
                            <p class="text-center mb-5">Toutes vos données seront effacés : nous n'aurez plus accès à votre Espace Pro</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('client.delete.confirm.post') }}" method="post" enctype="multipart/form-data" class="mb-5">
                            @csrf
                            @if($user->id !== null)
                                <input type="hidden" name="id" value="{{ $user->id }}" >
                            @endif
                            <div class="row">
                                <div class="col-md-6 col-12 mx-auto">
                                    <p>
                                        <a href="{{ route('client.edit',['token' => $user->token]) }}" class="btn btn-primary px-4 float-left">Retour</a>
                                        @if(Auth::user()->isDev())
                                            <a href="{{ route('user.delete',['token' => $user->token]) }}" class="btn btn-danger px-4 float-right">OUI</a>
                                        @else
                                            <button type="submit" class="btn btn-danger px-4 float-right">OUI</button>

                                        @endif
                                    </p>

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
