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

                                <li class="breadcrumb-item active">@if($application->id !== null) {{ $application->name }} @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($application->id !== null) Editer @else Ajouter @endif l'application</h4>
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
                        <h5 class="mt-0">@if($application->id !== null) {{ $application->name }} @else Ajouter @endif</h5>
                        <p class="text-muted font-13 mb-4">Description de l'application</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if($application->id === null) {{ route('application.add.post') }} @else {{ route('application.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($application->id !== null)
                                <input type="hidden" name="id" value="{{ $application->id }}" >
                            @endif


                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="col-form-label">Nom de l'application</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="name" placeholder="Prénom" name="name" value="@if($application->id !== null) {{ $application->name }} @else {{ old('name') }} @endif" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="price" class="col-form-label">Prix</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="price" placeholder="Prix" name="price" value="@if($application->id !== null) {{ $application->price }} @else {{ old('price') }} @endif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-form-label">url</label>
                                <div class="">
                                    <input class="form-control" type="text" id="url" placeholder="url" name="url" value="@if($application->id !== null) {{ $application->url }} @else {{ old('url') }} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="text">Rédiger description</label>

                                <textarea class="form-control" id="text" rows="4" placeholder="Rédiger..." name="text" required>@if($application->id !== null) {{ $application->text }} @else {{ old('text') }} @endif</textarea>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    @if($application->id !== null && $application->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $application->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            <a href="{{ route("application.delete.image", ["id" => $application->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Image</h5>
                                            <p class="text-muted font-13 mb-4">format jpg ou png (680.490)  , 10 Mo max</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox my-3">
                                <input type="checkbox" class="custom-control-input" id="active" name='active' @if($application->id && $application->active === 1) checked @endif>
                                <label class="custom-control-label" for="active" >Activé</label>
                            </div>


                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($application->id !== null)
                        <p class="text-center m-2"><a href="{{ route('application.delete', ["token" => $application->token]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
