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
                                <li class="breadcrumb-item"><a href="{{ route("admin.notifications.list") }}">Liste</a></li>

                                <li class="breadcrumb-item active">Supprimer les notifications</li>
                            </ol>
                        </div>

                        <h4 class="page-title">Suppression </h4>
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

                        <h5 class="mt-0 mb-4">Suppression des notifications non lues ?</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route("admin.clients.notifications.delete.post") }}" method="post" enctype="multipart/form-data" class="mb-5">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12 mx-auto">
                                    <p>
                                        <a href="{{ route("admin.notifications.list") }}" class="btn btn-primary px-4 float-left">Retour</a>
                                        <button type="submit" class="btn btn-danger px-4 float-right">OUI</button>
                                    </p>

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
