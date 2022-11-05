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
                                    <li class="breadcrumb-item"><a href="@if($user->role !== null && $user->role === "ROLE_CLIENT") {{ route('clients.list') }} @else {{ route('users.list') }} @endif">Liste</a></li>
                                @endif
                                <li class="breadcrumb-item active">@if($user->id !== null) Editer @else Ajouter @endif</li>
                            </ol>
                        </div>

                        <h4 class="page-title">@if($user->id !== null) {{ $user->full_name() }} @else Nouvel utilisateur @endif </h4>
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
                        @if($user->id)
                        <p class="text-right"><a href="{{ route('user.profile',["token" => $user->token]) }}" class="btn btn-info m-4"><i class="fas fa-eye mr-2"></i> Profil</a></p>
                    @endif
                        <h5 class="mt-0">@if($user->id !== null) Editer @else Ajouter @endif</h5>
                        <p class="text-muted font-13 mb-4">@if($user->id !== null  && $user->role === "ROLE_CLIENT") N° client : {{ $user->client_number }} @endif</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if($user->id === null) {{ route('user.add.post') }} @elseif(Auth::user()->role === "ROLE_CLIENT") {{ route('client.edit.post') }} @else {{ route('user.edit.post') }} @endif" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($user->id !== null)
                                <input type="hidden" name="id" value="{{ $user->id }}" >
                            @endif


                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="lastname" class="col-form-label">Nom</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="lastname" placeholder="Nom" name="lastname" value="@if($user->id !== null) {{ $user->lastname }} @else {{ old('lastname') }} @endif" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="firstname" class="col-form-label">Prénom</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="firstname" placeholder="Prénom" name="firstname" value="@if($user->id !== null) {{ $user->firstname }} @else {{ old('firstname') }} @endif" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="gender" value="1" @if($user->id !== null && $user->gender === 1 || $user->id === null) checked @endif>
                                        <label class="custom-control-label" for="customControlValidation2">Homme</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="gender" value="0" @if($user->id !== null && $user->gender === 0) checked @endif>
                                        <label class="custom-control-label" for="customControlValidation3">Femme</label>
                                    </div>
                                </div>
                                @if(Auth::user()->isDev())
                                    <div class="form-group col-md-6 col-12">
                                        <label for="role" class="col-form-label">Role</label>
                                        <div class="form-group">
                                            <select class="custom-select" name="role" required>
                                            <option value="ROLE_CLIENT" @if($user->id !== null && $user->role === "ROLE_CLIENT") selected @endif>client</option>
                                            @if(Auth::user()->role ==="ROLE_DEV")
                                                <option value="ROLE_STAFF" @if($user->id !== null && $user->role === "ROLE_STAFF") selected @endif>staff</option>
                                                <option value="ROLE_DEV" @if($user->id !== null && $user->role === "ROLE_DEV") selected @endif>dev</option>
                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                @endif
                                <div class="form-group col-12">
                                    <label for="siret" class="col-form-label">N° Siret</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="siret" placeholder="Siret" name="siret" value="@if($user->id !== null) {{ $user->siret }} @else {{ old('siret') }} @endif">
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->isDev())
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="email" class="col-form-label">Email</label>
                                    <div class="">
                                        <input class="form-control" type="email" id="email" placeholder="email" name="email" value="@if($user->email !== null) {{ $user->email }} @else {{ old('email') }} @endif" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="password" class="col-form-label">Mot de passe</label>
                                    <div class="">
                                        <input class="form-control" type="password" id="password" placeholder="password" name="password">
                                    </div>

                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="client_id" class="col-form-label">Téléphone fixe</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="phone_home" placeholder="phone_home" name="phone_home" value="@if($user->phone_home !== null) {{ $user->phone_home }} @else {{ old('phone_home') }} @endif">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="phone" class="col-form-label">Téléphone mobile</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="phone" placeholder="phone" name="phone" value="@if($user->phone !== null) {{ $user->phone }} @else {{ old('phone') }} @endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="company" class="col-form-label">Entreprise</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="company" placeholder="entreprise" name="company" value="@if($user->company !== null) {{ $user->company }} @else {{ old('company') }} @endif">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="website" class="col-form-label">Site internet</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="website" placeholder="lien" name="website" value="@if($user->website !== null) {{ $user->website }} @else {{ old('website') }} @endif">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h4 class="text-center">Adresse</h4>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="address" class="col-form-label">Rue</label>
                                    <textarea name="address" rows="4" cols="80" class="form-control">@if($user->address !== null) {{ $user->address }} @else {{ old('address') }} @endif</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="address" class="col-form-label">Ville</label>
                                    <input type="text" name="city" value="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="zip" class="col-form-label">Code postal</label>
                                    <div class="">
                                        <input class="form-control" type="text" id="zip" placeholder="code postale" name="zip" value="@if($user->zip !== null) {{ $user->zip }} @else {{ old('zip') }} @endif">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="country" class="col-form-label">Pays</label>
                                    <div class="form-group">
                                        <select class="custom-select" name="country" required>
                                            <option value="France" @if($user->country === "France") selected @endif>France</option>
                                            <option value="Suisse" @if($user->country === "Suisse") selected @endif>Suisse</option>
                                            <option value="Royaume-Uni" @if($user->country === "Royaume-Uni") selected @endif>Angleterre</option>
                                            <option value="Italie" @if($user->country === "Italie") selected @endif>Italie</option>
                                            <option value="Espagne" @if($user->country === "Espagne") selected @endif>Espagne</option>
                                            <option value="USA" @if($user->country === "USA") selected @endif>USA</option>
                                            <option value="Canada" @if($user->country === "Canada") selected @endif>Canada</option>
                                            <option value="Luxembourg" @if($user->country === "Luxembourg") selected @endif>Luxembourg</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xl-6">
                                    @if($user->id !== null && $user->image !== null)

                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ $user->image_url() }}" alt="image" style="display:inline-block;width:60px;height:60px;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="mt-0">Supprimer l'image</h5>
                                            @if(Auth::user()->isClient())
                                                <a href="{{ route("client.delete.image", ["id" => $user->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            @else
                                                <a href="{{ route("user.delete.image", ["id" => $user->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0">Photo</h5>
                                            <p class="text-muted font-13 mb-4">format jpg ou png (400.400)  , 10 Mo max</p>
                                            <input type="file" id="input-file-now-custom-1" name="image"/>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            @if(Auth::user()->isDev())
                                <div class="custom-control custom-checkbox my-3">
                                    <input type="checkbox" class="custom-control-input" id="active" name='active' @if($user->id && $user->active === 1 || $user->id === null) checked @endif>
                                    <label class="custom-control-label" for="active" >Actif</label>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>
                        @if($user->id !== null && $user->isClient())
                            <p class="text-center m-2"><a href="{{ route('client.delete.confirm', ["token" => $user->token]) }}" class="btn btn-danger">Supprimer</a></p>
                        @endif
                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
