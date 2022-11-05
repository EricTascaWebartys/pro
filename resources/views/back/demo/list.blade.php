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
                                <li class="breadcrumb-item"><a href="{{ route('demos.list') }}">Liste</a></li>
                                <li class="breadcrumb-item active">liste</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des démos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <p class="text-right">
                            <a href="{{ route('demo.position') }}" class="btn btn-info m-4"><i class="fas fa-order mr-2"></i> Position</a>
                        </p>
                        <div class="card-body">

                            <h5 class="mt-0">Démo</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Liste des démos.
                            </p>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Categorie</th>
                                        <th>Texte</th>
                                        <th>Statut</th>
                                        <th>Editer</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($demos as $key => $d)
                                            <tr>
                                                <td><img src="{{ $d->image_url() }}" alt="image" style="width:50px;height:50px;display:block"></td>
                                                <td>{{ $d->category }}</td>
                                                <td>{{ $d->shorter($d->text, 10) }}</td>
                                                <td>
                                                    @if($d->active === 1)
                                                        <i class="fas fa-check text-success"></i>
                                                    @else
                                                        <i class="fas fa-minus-circle text-danger"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('demo.edit', ['id' => $d->id]) }}"><i class="far fa-edit"></i></a>
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
