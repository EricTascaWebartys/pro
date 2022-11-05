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
                                <li class="breadcrumb-item"><a href="{{ route('testimonies.list') }}">Liste</a></li>
                                <li class="breadcrumb-item active">@if($testimony->id !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>
                        <h4 class="page-title">@if($testimony->id !== null) Avis de {{ $testimony->full_name() }} @else Ajouter un avis @endif</h4>
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
                        <h5 class="mt-0">Ajouter</h5>
                        <p class="text-muted font-13 mb-4">Avis pour la page d'accueil.</p>
                        <form action="@if($testimony->id !== null) {{ route('testimony.edit.post') }} @else {{ route('testimony.add.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($testimony->id !== null)
                                <input type="hidden" name="token" value="{{ $testimony->token }}">
                            @endif
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-6  mo-b-15">
                                    <label for="lastname">Nom :</label>
                                    <input class="form-control" type="text" id="lastname" placeholder="Nom" name="lastname" value="@if($testimony->id !== null) {{ $testimony->lastname }} @else {{ old('lastname') }} @endif" required>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <label for="lastname">Prénom :</label>
                                    <input class="form-control" type="text" id="firstname" placeholder="Prénom" name="firstname" value="@if($testimony->id !== null) {{ $testimony->firstname }} @else {{ old('firstname') }} @endif" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="lastname">Job :</label>
                                    <input class="form-control" type="text" id="job" placeholder="Fonction" name="job" value="@if($testimony->id !== null) {{ $testimony->job }} @else {{ old('job') }} @endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="text" rows="4" placeholder="Rédiger..." name="text" required>@if($testimony->id !== null) {{ $testimony->text }} @else {{ old('text') }} @endif</textarea>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    @if($testimony->id !== null && $testimony->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $testimony->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            <a href="{{ route("testimony.delete.image", ["token" => $testimony->token]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Image</h5>
                                            <p class="text-muted font-13 mb-4">format (jpeg ou png) 300.300</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($testimony->id !== null)
                        <p class="text-center m-2"><a href="{{ route('testimony.delete', ["token" => $testimony->token]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
