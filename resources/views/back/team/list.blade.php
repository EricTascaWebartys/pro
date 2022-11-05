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
                                <li class="breadcrumb-item"><a href="{{ route('team.list') }}">Liste</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste de la team</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if($staffs->count() < 3)
                            <p class="text-right"><a href="{{ route('team.add') }}" class="btn btn-info m-4"><i class="fas fa-plus mr-2"></i> Ajouter</a></p>
                        @endif
                        <div class="card-body">

                            <h5 class="mt-0">Team</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste de l'équipe.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>nom</th>
                                        <th>job</th>
                                        <th>Editer</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($staffs as $key => $s)
                                            <tr>
                                                <td><img src="{{ $s->image_url() }}" alt="image" style="width:50px;height:50px;display:block"></td>
                                                <td>{{ $s->full_name() }}</td>
                                                <td>{{ $s->job }}</td>
                                                <td>
                                                    <a href="{{ route('team.edit', ['id' => $s->id]) }}"><i class="far fa-edit"></i></a>
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
