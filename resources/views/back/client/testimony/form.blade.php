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
                                @if(Auth::user()->isDev())
                                <li class="breadcrumb-item"><a href="{{ route('testimonies.clients.list') }}">Liste</a></li>
                                @endif
                                <li class="breadcrumb-item active">@if($testimony !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($testimony->id !== null) Avis de {{ $testimony->full_name() }} @else Ajouter un avis @endif</h4>
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
                        <h5 class="mt-0">@if($testimony !== null) Editer @else Ajouter @endif</h5>
                        <p class="text-muted font-13 mb-4">Je donne mon avis</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route(Auth::user()->testimony_post_url()) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($testimony !== null)
                                <input type="hidden" name="token" value="{{ $testimony->token }}">
                            @endif

                            <div class="form-group">
                                <label for="text">Rédiger mon avis (80 mots au maximum)</label>

                                <textarea class="form-control" id="text" rows="4" placeholder="Rédiger..." name="text" required>@if($testimony !== null) {{ $testimony->text }} @else {{ old('text') }} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="note">Note sur 5 étoiles</label>
                                <select class="form-control" name="note">
                                    <option value="5" @if($testimony->id && $testimony->note === "5") selected @endif>5/5</option>
                                    <option value="4.5" @if($testimony->id && $testimony->note === "4.5") selected @endif>4.5/5</option>
                                    <option value="4" @if($testimony->id && $testimony->note === "4") selected @endif>4/5</option>
                                    <option value="3.5" @if($testimony->id && $testimony->note === "3.5") selected @endif>3.5/5</option>
                                    <option value="3" @if($testimony->id && $testimony->note === "3") selected @endif>3/5</option>
                                    <option value="2.5" @if($testimony->id && $testimony->note === "2.5") selected @endif>2.5/5</option>
                                    <option value="2" @if($testimony->id && $testimony->note === "2") selected @endif>2/5</option>
                                    <option value="1.5" @if($testimony->id && $testimony->note === "1.5") selected @endif>1.5/5</option>
                                    <option value="1" @if($testimony->id && $testimony->note === "1") selected @endif>1/5</option>
                                    <option value="0.5" @if($testimony->id && $testimony->note === "0.5") selected @endif>0.5/5</option>
                                    <option value="0" @if($testimony->id && $testimony->note === "0") selected @endif>0/5</option>
                                </select>

                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    @if($testimony->id !== null && $testimony->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $testimony->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            <a href="{{ route("client.testimony.delete.image", ["token" => $testimony->token]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Image</h5>
                                            <p class="text-muted font-13 mb-4">format jpg ou png, 10 Mo max</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            @if(Auth::user()->isDev())
                                <div class="custom-control custom-checkbox my-3">
                                    <input type="checkbox" class="custom-control-input" id="active" name='active' @if($testimony->id && $testimony->active === 1 || $testimony->id === null) checked @endif>
                                    <label class="custom-control-label" for="active" >Actif</label>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($testimony->id !== null)
                        {{-- <p class="text-center m-2"><a href="{{ route('client.testimony.delete', ["token" => $testimony->token]) }}" class="btn btn-danger">Supprimer</a></p> --}}
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
