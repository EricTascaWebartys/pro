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
                                <li class="breadcrumb-item"><a href="{{ route('packages.list') }}">Garanties</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des garanties</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <p class="text-right"><a href="{{ route('package.add') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Ajouter</a></p>

                        <div class="card-body">

                            <h5 class="mt-0">Garanties</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste garanties.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>description</th>
                                        <th>Durée</th>
                                        <th>Prix</th>
                                        <th>Visible</th>
                                        <th>Editer</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($packages as $key => $package)
                                            <tr>
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->shorter($package->description, 30) }}</td>
                                                <td>{{ $package->duration }}</td>
                                                <td>{{ $package->price }}</td>
                                                <td>
                                                    @if($package->active === 1)
                                                        <i class="fas fa-check text-success"></i>
                                                    @else
                                                        <i class="fas fa-minus-circle text-danger"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('package.edit', ['id' => $package->id]) }}"><i class="far fa-edit"></i></a>
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
