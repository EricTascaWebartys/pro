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
                                <li class="breadcrumb-item"><a href="{{ route('products.list') }}">Produits</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des produits</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <p class="text-right"><a href="{{ route('product.add') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Ajouter</a></p>

                        <div class="card-body">

                            <h5 class="mt-0">Produits</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste produits.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Nom</th>
                                        <th>Type</th>
                                        <th>Livraison</th>
                                        <th>Garantie</th>
                                        <th>Payé le</th>
                                        <th>PWA</th>
                                        <th>Editer</th>
                                        <th>Lien</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>@if($product->user()) <a href="{{route('user.profile', ["token" => $product->user()->first()->token])}}">{{ $product->user()->first()->full_name() }}</a> @else utilisateur supprimé @endif</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->type }}</td>
                                                <td>@if($product->date_online === null) N-C @else {{ date("d-m-Y", strtotime($product->date_online)) }} @endif</td>
                                                <td>@if($product->date_limit === null) N-C @else {{ $product->package()->first()->name }} - {{ date("d-m-Y", strtotime($product->date_limit)) }} @endif</td>
                                                <td>@if($product->date_paid === null) N-C @else {{ date("d-m-Y", strtotime($product->date_paid)) }} @endif</td>
                                                <td>
                                                    @if($product->pwa === 1)
                                                        <i class="fas fa-check text-success"></i>
                                                    @else
                                                        <i class="fas fa-minus-circle text-danger"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('product.edit', ['token' => $product->token]) }}"><i class="far fa-edit"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    @if($product->url !== null)
                                                        <a href="{{ $product->url }}" target="_blank"><i class="far fa-eye"></i></a>
                                                    @else
                                                        <i class="fas fa-minus-circle text-danger"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div><!-- container -->

        @include('back.inc.footer')
    </div>
    <!-- end page content -->
@endsection
