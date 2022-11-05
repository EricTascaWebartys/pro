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
                                <li class="breadcrumb-item"><a href="{{ route('applications.list') }}">Liste</a></li>

                                <li class="breadcrumb-item active">Ajouter un abonné</li>
                            </ol>
                        </div>

                        <h4 class="page-title">{{ $application->name}} </h4>
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
                        <h5 class="mt-0">Ajouter un abonné</h5>
                        <p class="text-muted font-13 mb-4">Application : {{ $application->name}} </p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if(isset($application_user) && $application_user->id) {{ route('application.client.edit.post') }} @else {{ route('application.client.add.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($application->id !== null)
                                <input type="hidden" name="application_id" value="{{ $application->id }}" >
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="date-limit" >Fin de l'abonnement </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="@if(isset($application_user) && $application_user->id !== null){{ date("Y-m-d", strtotime($application_user->date_limit)) }}@else {{ old('date_limit') }} @endif" id="date-limit" name="date_limit" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    @isset($client_selected)
                                        <p>Client : {{ $client_selected->full_name() }}</p>
                                        <input type="hidden" name="id" value="{{ $application_user->id }}">
                                    @else
                                        <label for="user_id" >Liste des clients </label>
                                        <select class="form-control" name="user_id">
                                            @foreach ($clients as $key => $client)
                                                <option value="{{ $client->id }}">{{ $client->full_name() }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @isset($client_selected)
                        <p class="text-center m-2"><a href="{{ route('application.client.delete', ["id" => $application_user->id]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
