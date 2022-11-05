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
                                <li class="breadcrumb-item"><a href="{{ route('clients.list') }}">Clients</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des clients</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <p class="text-right mt-4">
                            @if(Auth::user()->isDev())
                                <a href="{{ route('contact.clients') }}" class="btn btn-secondary mr-4"><i class="far fa-envelope mr-2"></i>Emails</a>
                                <a href="{{ route('admin.clients.notification') }}" class="btn btn-success mr-4"><i class="fas fa-bell mr-2"></i>Notifications</a>
                            @endif
                            <a href="{{ route('user.add') }}" class="btn btn-info mr-4"><i class="fas fa-user-plus mr-2"></i> Ajouter</a>
                        </p>

                        <div class="card-body">

                            <h5 class="mt-0">Clients</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste clients.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Nom Prénom</th>
                                        <th>Entreprise</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Actif</th>
                                        <th>Voir</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($users as $key => $client)
                                            <tr>
                                                <td><img src="{{ $client->image_url() }}" alt="image" style="width:50px;height:50px;display:block"></td>
                                                <td>
                                                    {{ $client->full_name() }}
                                                    @if($client->is_connected !== null)
                                                            <i class="fa fa-circle text-success ml-2"></i>
                                                    @endif
                                                </td>
                                                <td>{{ $client->company_name() }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->clean_phone($client->phone) }}</td>
                                                <td class="text-center">
                                                    @if($client->active === 1)
                                                        <i class="fas fa-check text-success"></i> @else <i class="fas fa-minus-circle text-danger"></i>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('user.profile', ['token' => $client->token]) }}"><i class="far fa-eye"></i></a>
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
