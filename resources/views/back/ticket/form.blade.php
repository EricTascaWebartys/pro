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
                                <li class="breadcrumb-item"><a href="{{ route('tickets.list',['token' => Auth::user()->token]) }}">Liste</a></li>

                                <li class="breadcrumb-item active">@if($ticket->id !== null) Ticket - {{ $ticket->number}} @else Ticket @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($ticket->id !== null) Répondre @else Créer @endif </h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="col-12">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="mt-0">@if($ticket->id !== null) Ticket - {{ $ticket->number }} @else Nouveau Ticket @endif</h5>
                            <p class="text-muted font-13 mb-4">Description du problème</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($ticket->id !== null && $tickets->count() > 0)
                            <div class="row">
                                @foreach ($tickets as $key => $t)
                                        @if(Auth::user()->id === $t->user()->first()->id)
                                            <div style="width:100%" class="mb-2">
                                                <div class="bg-info text-light pt-4 pb-2 pl-4 pr-4 rounded" style="width:49%; float:left">
                                                    {{ $t->text }}
                                                    <p class="text-right" style="font-size:10px">{{ date('d/m/Y H:i', strtotime($t->created_at)) }}</p>
                                                </div>
                                            </div>

                                        @else
                                            <div style="width:100%" class="mb-2">

                                                <div class="bg-light text-dark pt-4 pb-2 pl-4 pr-4  rounded" style="width:49%; float:right">>
                                                    {{ $t->text }}
                                                    <p class="text-right" style="font-size:10px">{{ date('d/m/Y H:i', strtotime($t->created_at)) }}</p>
                                                </div>
                                            </div>
                                        @endif


                                @endforeach
                            </div>

                            <hr>
                        @endif
                        <form action="@if($ticket->id === null) {{ route('ticket.add.post') }} @elseif(Auth::user()->isDev()) {{ route('admin.ticket.edit.post') }} @else {{ route('ticket.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($ticket->id!== null)
                                <input type="hidden" name="number" value="{{ $ticket->number }}" >
                                <input type="hidden" name="id" value="{{ $ticket->id }}" >
                            @endif

                            <div class="row">
                                @if($ticket->resolve === null || Auth::user()->isDev())
                                    <div class="form-group col-12">
                                        <label for="text">Ecrire</label>
                                        <textarea class="form-control" name="text" rows="8" cols="80"></textarea>
                                    </div>
                                @else
                                    <div class="form-group col-12">
                                        <h3 class="text-success text-center">Résolu</h3>
                                    </div>
                                @endif

                            </div>
                            @if(Auth::user()->isDev())
                                <div class="custom-control custom-checkbox my-3">
                                    <input type="checkbox" class="custom-control-input" id="resolve" name='resolve' @if($ticket->id && $ticket->resolve=== 1 || $ticket->id === null) checked @endif>
                                    <label class="custom-control-label" for="resolve" >Résolu</label>
                                </div>
                            @endif
                            @if(Auth::user()->isDev() || $ticket->id !== null && $ticket->resolve === null)
                                <button type="submit" class="btn btn-primary px-4">@if($ticket->id === null) Créer @else Répondre @endif</button>
                            @else
                                <button type="submit" class="btn btn-primary px-4">Créer</button>
                            @endif

                            @if(Auth::user()->isDev() && $ticket->id !== null && $ticket->resolve !== null)
                                <p class="text-center mt-5"><a class="btn btn-danger" href="{{ route('admin.ticket.delete', ["id" => $ticket->id]) }}">Supprimer</a> </p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
