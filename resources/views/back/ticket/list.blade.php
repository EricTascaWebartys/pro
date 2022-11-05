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
                                <li class="breadcrumb-item active">Tickets</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des tickets</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <p class="text-right"><a href="{{ route('ticket.add') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Créer</a></p>

                        <div class="card-body">

                            <h5 class="mt-0">Mes tickets</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">
                                Rédigez un ticket pour nous faire parvenir votre problème technique.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        @if(Auth::user()->isDev())
                                            <th>Client</th>
                                        @endif
                                        <th>Date de création</th>
                                        <th>Numéro</th>
                                        <th>Description</th>
                                        <th>Résolu</th>
                                        <th>Voir</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($tickets as $key => $ticket)
                                            <tr>
                                                @if(Auth::user()->isDev())
                                                    <th>{{ $ticket->user()->first()->full_name() }}</th>
                                                @endif
                                                <td>{{ date("d-m-Y", strtotime($ticket)) }}</td>
                                                <td>
                                                    {{ $ticket->number }}
                                                </td>
                                                <td>{{ $ticket->shorter($ticket->text, 20) }}</td>
                                                <td class="text-center">
                                                    @if($ticket->resolve === 1)
                                                        <i class="fas fa-check text-success"></i> @else <i class="fas fa-minus-circle text-danger"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if(Auth::user()->isDev())
                                                        <a href="{{ route('admin.ticket.edit', ['id' => $ticket->id]) }}">
                                                            <i class="far fa-eye text-info"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('ticket.edit', ['id' => $ticket->id]) }}">
                                                            <i class="far fa-eye text-info"></i>
                                                        </a>
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
