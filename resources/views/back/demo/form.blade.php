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

                                <li class="breadcrumb-item active">@if($demo->id !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($demo->id !== null) Editer @else Ajouter @endif une démo</h4>
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
                        <h5 class="mt-0">@if($demo->id !== null) Editer @else Ajouter @endif</h5>
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
                        <form action="@if($demo->id === null) {{ route('demo.add.post') }} @else {{ route('demo.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($demo->id !== null)
                                <input type="hidden" name="id" value="{{ $demo->id }}" >
                            @endif

                            {{-- <div class="form-group ">
                                <label for="title" class="col-form-label">Titre</label>
                                <div class="">
                                    <input class="form-control" type="text" id="title" name="title" placeholder="Titre" value="@if($demo->id !== null) {{ $demo->title }} @else {{ old('title') }} @endif">
                                </div>
                            </div> --}}

                            <div class="form-group ">
                                <label for="category" class="col-form-label">Catégorie</label>
                                <div class="">
                                    <input class="form-control" type="text" id="category" placeholder="Catégorie" name="category" value="@if($demo->id !== null) {{ $demo->category }} @else {{ old('category') }} @endif">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="category_en" class="col-form-label">Catégorie (anglais)</label>
                                <div class="">
                                    <input class="form-control" type="text" id="category_en" placeholder="Catégorie anglais" name="category_en" value="@if($demo->id !== null) {{ $demo->category_en }} @else {{ old('category_en') }} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="text">Rédiger description</label>

                                <textarea class="form-control" id="text" rows="4" placeholder="Rédiger..." name="text" required>@if($demo->id !== null) {{ $demo->text }} @else {{ old('text') }} @endif</textarea>
                            </div>

                            <div class="form-group">
                                <label for="text_en">Rédiger description (anglais)</label>

                                <textarea class="form-control" id="text_en" rows="4" placeholder="Rédiger..." name="text_en" required>@if($demo->id !== null) {{ $demo->text_en }} @else {{ old('text_en') }} @endif</textarea>
                            </div>
                            <div class="form-group ">
                                <label for="link" class="col-form-label">Lien</label>
                                <div class="">
                                    <input class="form-control" type="text" id="link" placeholder="lien" name="link" value="@if($demo->id !== null) {{ $demo->link }} @else {{ old('link') }} @endif">
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox my-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name='target' @if($demo->id && $demo->target === "_blank") checked @endif>
                                <label class="custom-control-label" for="customCheck1" >Target:_blank</label>
                            </div>

                            <div class="custom-control custom-checkbox my-3">
                                <input type="checkbox" class="custom-control-input" id="active" name='active' @if($demo->id && $demo->active === 1) checked @endif>
                                <label class="custom-control-label" for="active" >Visible</label>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    @if($demo->id !== null && $demo->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $demo->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            <a href="{{ route("demo.delete.image", ["id" => $demo->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Image</h5>
                                            <p class="text-muted font-13 mb-4">format jpg ou png (680.490)  , 10 Mo max</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($demo->id !== null)
                        <p class="text-center m-2"><a href="{{ route('demo.delete', ["id" => $demo->id]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
