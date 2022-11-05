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
                                <li class="breadcrumb-item"><a href="{{ route('admin.notifications.list') }}">Notifications</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des notifications</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <p class="text-right">@if($notifications->count() > 0)<a href="{{ route('admin.clients.notifications.delete') }}" class="btn btn-danger"><i class="fas fa-trash mr-2"></i> Supprimer</a>@endif<a href="{{ route('admin.clients.notification') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Ajouter</a></p>

                        <div class="card-body">

                            <h5 class="mt-0">Notifications</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste notifications.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Message</th>
                                        <th>Date de création</th>
                                        <th>Destinataire</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($notifications as $key => $notification)
                                            <tr>
                                                <td>{{ $notification->title }}</td>
                                                <td>{{ $notification->text }}</td>
                                                <td>{{ date("d-m-Y", strtotime($notification->created_at)) }}</td>
                                                <td>{{ $notification->user()->first()->full_name() }}</td>
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
