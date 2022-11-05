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
                                @if(isset($multiple))
                                <li class="breadcrumb-item"><a href="{{ route('clients.list') }}">Clients</a></li>
                                @else
                                <li class="breadcrumb-item"><a href="{{ route('user.profile', ["token" => $client->token]) }}">{{ $client->full_name() }}</a></li>

                                @endif
                                <li class="breadcrumb-item active">Email</li>
                            </ol>
                        </div>

                        <h4 class="page-title">Envoyer un email</h4>
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
                        <h5 class="mt-0">Ecrire un message</h5>
                        <p class="text-muted font-13 mb-4">
                            @if(isset($client))
                                Ecrire à {{ $client->full_name() }}
                            @else
                                Envoyer un email à tous les clients
                            @endif
                        </p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if(isset($multiple)){{ route('contact.clients.post') }}@else{{ route('contact.client.post') }}@endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($client))
                                <input type="hidden" name="id" value="{{ $client->id }}">
                            @endif
                            <div class="form-group">
                                <label for="text">Sujet</label>
                                <input type="text" class="form-control" name="subject" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Rédiger..." name="message" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary px-4">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
