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
                                <li class="breadcrumb-item"><a href="{{ route('admin.notifications.list') }}">Liste</a></li>

                                <li class="breadcrumb-item">@if($user->id) Notification  {{ $user->full_name() }} @else Notifications @endif</li>
                            </ol>
                        </div>
                        <h4 class="page-title">@if($user->id) Envoyer une notification à  {{ $user->full_name() }} @else Notifier tous les Clients @endif</h4>
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
                        <h5 class="mt-0">Notification</h5>
                        <p class="text-muted font-13 mb-4">Rédiger la notification.</p>
                        <form action="@if($user->id) {{ route('admin.user.notification.post') }} @else {{ route('admin.clients.notification.post') }} @endif" method="post" enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            @if($user->id !== null)
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @endif
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-6  mo-b-15">
                                    <label for="title">Titre :</label>
                                    <input class="form-control" type="text" id="title" placeholder="Titre" name="title" value="@if($notification !== null) {{ $notification->title }} @else {{ old('title') }} @endif" required>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <label for="lastname">Type (icon) :</label>
                                    <select class="form-control" name="type" required>
                                        <option value="message">message</option>
                                        <option value="buy">panier (vert)</option>
                                        <option value="buy-info">panier (bleu)</option>
                                        <option value="alert">alert</option>
                                        <option value="">autre</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="text" rows="4" placeholder="Rédiger..." name="text" required>@if($notification !== null) {{ $notification->text }} @else {{ old('text') }} @endif</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </form>

                    </div>
                </div>
            </div>


        </div><!-- container -->

        @include('back.inc.footer')

    </div>
    <!-- end page content -->


@endsection
