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
                        <h4 class="page-title">Position des démos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="mt-0">Démo</h5>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <p class="text-muted font-13 mb-4">Changer la position.
                            </p>
                            <ul id="sortable" class="mb-4">
                                @foreach ($demos as $key => $demo)
                                    <li class="ui-state-default sortable" data-id="{{ $demo->id }}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $demo->text }}</li>

                                @endforeach
                            </ul>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div><!-- container -->

        @include('back.inc.footer')
    </div>
    <!-- end page content -->
@endsection
