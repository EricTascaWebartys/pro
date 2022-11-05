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
                                <li class="breadcrumb-item"><a href="{{ route('packages.list') }}">Liste</a></li>

                                <li class="breadcrumb-item active">@if($package->id !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($package->id !== null) Editer @else Ajouter @endif une garanties</h4>
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
                        <h5 class="mt-0">@if($package->id !== null) Editer @else Ajouter @endif</h5>
                            <p class="text-muted font-13 mb-4">Description de la garantie</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if($package->id === null) {{ route('package.add.post') }} @else {{ route('package.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($package->id !== null)
                                <input type="hidden" name="id" value="{{ $package->id }}" >
                            @endif


                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="col-form-label">Nom du la garantie</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="name" placeholder="Prénom" name="name" value="@if($package->id !== null) {{ $package->name }} @else {{ old('name') }} @endif" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="price" class="col-form-label">Prix</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="price" placeholder="Prix" name="price" value="@if($package->id !== null) {{ $package->price }} @else {{ old('price') }} @endif" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="8" cols="80">@if($package->id){{ $package->description }}@endif</textarea>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="clients">Durée</label>
                                        <select class="form-control" name="type">
                                            <option value="1-month" @if($package->id !== null && $package->duration  === "1-month") selected @endif>1 mois</option>
                                            <option value="3-month" @if($package->id !== null && $package->duration  === "3-month") selected @endif>3 mois</option>
                                            <option value="6-month" @if($package->id !== null && $package->duration  === "6-month") selected @endif>6 mois</option>
                                            <option value="1-year" @if($package->id !== null && $package->duration  === "1-year") selected @endif>1 an</option>
                                            <option value="3-years" @if($package->id !== null && $package->duration  === "3-years") selected @endif>2 ans</option>
                                            <option value="6-years" @if($package->id !== null && $package->duration  === "6-years") selected @endif>3 ans</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="custom-control custom-checkbox my-3">
                                        <input type="checkbox" class="custom-control-input" id="active" name='active' @if($package->id && $package->active === 1 || $user->id === null) checked @endif>
                                        <label class="custom-control-label" for="active" >Actif</label>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($package->id !== null)
                            @if($package->products()->get()->count() === 0)
                                <p class="text-center m-2"><a href="{{ route('package.delete', ["id" => $package->id]) }}" class="btn btn-danger">Supprimer</a></p>
                            @else
                                <h5 class="text-center mt-4 mb-4">Produits associés</h5>
                                @foreach ($package->products()->get() as $key => $product)
                                    <p class="text-center m-2">{{ $product->name }} - ({{ $product->user()->first()->full_name() }})</p>
                                    @if ($loop->last)

                                    @else
                                        <hr>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
