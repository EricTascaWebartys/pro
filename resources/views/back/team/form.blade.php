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
                                <li class="breadcrumb-item"><a href="{{ route('demos.list') }}">Liste</a></li>

                                <li class="breadcrumb-item active">@if($staff->id !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($staff->id !== null) Editer @else Ajouter @endif un membre</h4>
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
                        <h5 class="mt-0">@if($staff->id !== null) Editer @else Ajouter @endif</h5>
                        <p class="text-muted font-13 mb-4">Description de la démo</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if($staff->id === null) {{ route('team.add.post') }} @else {{ route('team.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($staff->id !== null)
                                <input type="hidden" name="id" value="{{ $staff->id }}" >
                            @endif


                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="firstname" class="col-form-label">Prénom</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="firstname" placeholder="Prénom" name="firstname" value="@if($staff->id !== null) {{ $staff->firstname }} @else {{ old('firstname') }} @endif">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="lastname" class="col-form-label">Nom</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="lastname" placeholder="Nom" name="lastname" value="@if($staff->id !== null) {{ $staff->lastname }} @else {{ old('lastname') }} @endif">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="job" class="col-form-label">Fonction</label>
                                <div class="">
                                    <input class="form-control" type="text" id="job" placeholder="job" name="job" value="@if($staff->id !== null) {{ $staff->job }} @else {{ old('job') }} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="job_en" class="col-form-label">Fonction (anglais)</label>
                                <div class="">
                                    <input class="form-control" type="text" id="job_en" placeholder="job anglais" name="job_en" value="@if($staff->id !== null) {{ $staff->job_en }} @else {{ old('job_en') }} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link_1" class="col-form-label">Twitter</label>
                                <div class="">
                                    <input class="form-control" type="text" id="link_1" placeholder="twitter" name="link_1" value="@if($staff->id !== null) {{ $staff->link_1 }} @else {{ old('link_1') }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link_2" class="col-form-label">Facebook</label>
                                <div class="">
                                    <input class="form-control" type="text" id="link_2" placeholder="facebook" name="link_2" value="@if($staff->id !== null) {{ $staff->link_2 }} @else {{ old('link_2') }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link_3" class="col-form-label">Linkdln</label>
                                <div class="">
                                    <input class="form-control" type="text" id="link_3" placeholder="linkdln" name="link_3" value="@if($staff->id !== null) {{ $staff->link_3 }} @else {{ old('link_3') }} @endif">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    @if($staff->id !== null && $staff->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $staff->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            <a href="{{ route("team.delete.image", ["id" => $staff->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Image</h5>
                                            <p class="text-muted font-13 mb-4">format jpg ou png (400.400)  , 10 Mo max</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($staff->id !== null)
                        <p class="text-center m-2"><a href="{{ route('team.delete', ["id" => $staff->id]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
