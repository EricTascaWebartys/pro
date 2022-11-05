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
                                <li class="breadcrumb-item active">Informations</li>
                            </ol>
                        </div>

                        <h4 class="page-title">WEB ARTYS</h4>
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
                        <h5 class="mt-0">Editer</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('informations.edit.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($information->id !== null)
                                <input type="hidden" name="id" value="{{ $information->id }}" >
                            @endif


                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="phone" class="col-form-label">Mobile</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="phone" placeholder="Mobile" name="phone" value="@if($information->id !== null) {{ $information->phone }} @else {{ old('phone') }} @endif" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="phone_fix" class="col-form-label">Téléphone Fixe</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="phone_fix" placeholder="fixe" name="phone_fix" value="@if($information->id !== null) {{ $information->phone_fix }} @else {{ old('phone_fix') }} @endif">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="siret" class="col-form-label">Numéro siret</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="siret" placeholder="siret" name="siret" value="@if($information->id !== null) {{ $information->siret }} @else {{ old('siret') }} @endif" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="email" class="col-form-label">Email</label>
                                    <div class="">
                                        <input class="form-control" type="email" id="email" placeholder="email" name="email" value="@if($information->id !== null) {{ $information->email }} @else {{ old('email') }} @endif" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="days" class="col-form-label">Jours d'ouverture</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="days" placeholder="Du lundi au vendredi" name="days" value="@if($information->id !== null) {{ $information->days }} @else {{ old('days') }} @endif" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="hours" class="col-form-label">Horaires</label>
                                    <div class="">
                                        <input class="form-control" type="hours" id="hours" placeholder="horaires" name="hours" value="@if($information->id !== null) {{ $information->hours }} @else {{ old('hours') }} @endif" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="job" class="col-form-label">Fonction</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="job" placeholder="fonction" name="job" value="@if($information->id !== null) {{ $information->job }} @else {{ old('job') }} @endif" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    @if($information->id !== null && $information->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $information->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            <a href="{{ route("information.delete.image", ["id" => $information->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>

                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Photo</h5>
                                            <p class="text-muted font-13 mb-4">format jpg ou png (400.400)  , 10 Mo max</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>

                            <hr>
                            <h4 class="text-center">Adresse</h4>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="address" class="col-form-label">Rue</label>
                                    <textarea name="address" rows="4" cols="80" class="form-control">@if($information->address !== null) {{ $information->address }} @else {{ old('address') }} @endif</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="zip" class="col-form-label">Code postal</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="zip" placeholder="code postale" name="zip" value="@if($information->zip !== null) {{ $information->zip }} @else {{ old('zip') }} @endif">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="country" class="col-form-label">Pays</label>
                                    <div class="form-group">
                                        <select class="custom-select" name="country" required>
                                            <option value="France" @if($information->country === "France") selected @endif>France</option>
                                            <option value="Suisse" @if($information->country === "Suisse") selected @endif>Suisse</option>
                                            <option value="Royaume-Uni" @if($information->country === "Royaume-Uni") selected @endif>Angleterre</option>
                                            <option value="Italie" @if($information->country === "Italie") selected @endif>Italie</option>
                                            <option value="Espagne" @if($information->country === "Espagne") selected @endif>Espagne</option>
                                            <option value="USA" @if($information->country === "USA") selected @endif>USA</option>
                                            <option value="Canada" @if($information->country === "Canada") selected @endif>Canada</option>
                                            <option value="Luxembourg" @if($information->country === "Luxembourg") selected @endif>Luxembourg</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>

                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
