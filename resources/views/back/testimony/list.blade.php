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
                                <li class="breadcrumb-item"><a href="{{ route('testimonies.list') }}">Avis</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des avis</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if($testimonies->count() < 2 && isset($homepage_testimonies))
                            <p class="text-right"><a href="{{ route('testimony.add') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Ajouter</a></p>
                        @endif
                        <div class="card-body">

                            <h5 class="mt-0">Avis</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Paramétrer les avis @if(isset($homepage_testimonies)) de la page d'accueil @else clients @endif.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>fonction</th>
                                        <th>text</th>
                                        <th>image</th>
                                        @if(!isset($homepage_testimonies))
                                                <th>statut</th>
                                        @endif
                                        <th>Editer</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($testimonies as $key => $testimony)
                                            <tr>
                                                <td>{{ $testimony->lastname }}</td>
                                                <td>{{ $testimony->firstname }}</td>
                                                <td>{{ $testimony->job }}</td>
                                                <td>{{ $testimony->shorter($testimony->text, 40) }}</td>
                                                <td><img src="{{ $testimony->image_url() }}" alt="image" style="width:50px;height:50px;display:block"></td>
                                                 @if(!isset($homepage_testimonies))
                                                        <td>
                                                            @if($testimony->active === 1) <i class="fas fa-check text-success"></i> @else <i class="fas fa-minus-circle text-danger"></i>
                                                            @endif
                                                        </td>
                                                @endif
                                                <td>
                                                    @if(isset($homepage_testimonies))
                                                    <a href="{{ route('testimony.edit', ['id' => $testimony->id]) }}"><i class="far fa-edit"></i></a>
                                                    @else
                                                    <a href="{{ route('client.testimony', ['token' => $testimony->token]) }}"><i class="far fa-edit"></i></a>
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
