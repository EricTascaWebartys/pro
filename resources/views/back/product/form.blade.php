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
                                <li class="breadcrumb-item"><a href="{{ route('products.list') }}">Liste</a></li>

                                <li class="breadcrumb-item active">@if($product->id !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($product->id !== null) Editer @else Ajouter @endif un produit</h4>
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
                        <h5 class="mt-0">@if($product->id !== null) Editer @else Ajouter @endif</h5>
                            <p class="text-muted font-13 mb-4">Description du produit</p>
                            @isset($product->id)
                                <p class="text-muted font-13 mb-4">Token : {{ $product->token }}</p>
                            @endisset
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if($product->id === null) {{ route('product.add.post') }} @else {{ route('product.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($product->id !== null)
                                <input type="hidden" name="id" value="{{ $product->id }}" >
                            @endif


                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="col-form-label">Nom du produit</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="name" placeholder="Prénom" name="name" value="@if($product->id !== null) {{ $product->name }} @else {{ old('name') }} @endif" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    @if($product->id === null)
                                        <div class="form-group">
                                            <label for="clients">Clients</label>
                                            <select class="form-control" name="client_id">
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}" @if($product->id !== null && $client->id  === $product->user()->first()->id) selected @endif>{{ $client->full_name() }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    @else
                                        <label for="lastname" class="col-form-label">Nom du client</label>
                                        <div class="">
                                            @if($product->user()) {{ $product->user()->first()->full_name() }} @else utilisateur supprimé @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url" class="col-form-label">url</label>
                                <div class="">
                                    <input class="form-control" type="text" id="url" placeholder="url" name="url" value="@if($product->id !== null) {{ $product->url }} @else {{ old('url') }} @endif">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="price" class="col-form-label">Prix</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="price" placeholder="Prix" name="price" value="@if($product->id !== null) {{ $product->price }} @else {{ old('price') }} @endif" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="clients">Type</label>
                                        <select class="form-control" name="type">
                                            <option value="site vitrine" @if($product->id !== null && $product->type  === "site vitrine") selected @endif>Site vitrine</option>
                                            <option value="site e-commerce" @if($product->id !== null && $product->type  === "site e-commerce") selected @endif>Site e-commerce</option>
                                            <option value="application web" @if($product->id !== null && $product->type  === "application web") selected @endif>Application Web</option>
                                            <option value="application" @if($product->id !== null && $product->type  === "application") selected @endif>Autre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="clients">garantie</label>
                                        <select class="form-control" name="package_id">
                                            @foreach($packages as $package)
                                                <option value="{{ $package->id }}" @if($product->id !== null && $package->id  === $product->Package()->first()->id) selected @endif>{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox my-3">
                                            <input type="checkbox" class="custom-control-input" id="pwa" name='pwa' @if($product->id && $product->pwa === 1 || $product->id === null) checked @endif>
                                            <label class="custom-control-label" for="pwa" >Progressive Web App</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="form-group row">
                                <label for="date-online" class="col-sm-2 col-form-label">Mise en ligne </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="week" value="@if($product->id !== null){{ date("Y", strtotime($product->date_online)) . "-W" . date("W", strtotime($product->date_online)) }}@else {{ old('date_online') }} @endif" id="date-online" name="date_online">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date-limit" class="col-sm-2 col-form-label">Fin de garantie </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="week" value="@if($product->id !== null){{ date("Y", strtotime($product->date_limit)) . "-W" . date("W", strtotime($product->date_limit)) }}@else {{ old('date_limit') }} @endif" id="date-limit" name="date_limit">
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="date-online" class="col-sm-2 col-form-label">Mise en ligne </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" @value="@if($product->id !== null && $product->date_online !== null){{ date("Y-m-d", strtotime($product->date_online)) }}@else {{ old('date_online') }} @endif" id="date-online" name="date_online">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date-limit" class="col-sm-2 col-form-label">Fin de garantie </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" value="@if($product->id !== null && $product->date_limit !== null){{ date("Y-m-d", strtotime($product->date_limit)) }}@else {{ old('date_limit') }} @endif" id="date-limit" name="date_limit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_paid" class="col-sm-2 col-form-label">Date de règlement </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" value="@if($product->id !== null && $product->date_paid !== null){{ date("Y-m-d", strtotime($product->date_paid)) }}@else {{ old('date_paid') }} @endif" id="date_paid" name="date_paid">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($product->id !== null)
                        <p class="text-center m-2"><a href="{{ route('product.delete', ["token" => $product->token]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
