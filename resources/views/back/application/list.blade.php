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
                                <li class="breadcrumb-item"><a href="{{ route('products.list') }}">Application</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des applications</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <p class="text-right"><a href="{{ route('application.add') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Ajouter</a></p>

                        <div class="card-body">

                            <h5 class="mt-0">Applications</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste applications.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Abonnés</th>
                                        <th>visible</th>
                                        <th>Editer</th>
                                        <th>Client</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @if($applications->count() >0)
                                            @foreach ($applications as $key => $application)
                                                <tr>
                                                    <td>{{ $application->name }}</td>
                                                    <td>
                                                            {{-- {{ dd($application->application_users()->first()) }} --}}
                                                        @foreach ($application->application_users()->get() as $key => $app)
                                                                <p class="text-muted"><a href="{{ route('application.client.edit',['id' => $app->id]) }}">{{ $app->user()->first()->full_name() }}</a> - Prend fin le : {{ date("d-m-Y", strtotime($app->date_limit)) }} <i class="fas fa-hourglass-half mr-2 ml-2 {{ $app->color() }}"></i></p>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        @if($application->active === 1)
                                                            <i class="fas fa-check text-success"></i> @else <i class="fas fa-minus-circle text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('application.edit', ['token' => $application->token]) }}"><i class="far fa-edit"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- <a href="{{ $product->url }}"><i class="far fa-eye"></i></a> --}}
                                                        <a href="{{ route('application.client.add', ['token' => $application->token]) }}"><i class="fas fa-plus"></i> </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
