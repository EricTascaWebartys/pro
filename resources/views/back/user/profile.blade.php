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
                                <li class="breadcrumb-item"><a href="@if($user->isClient()) {{ route('clients.list') }} @else {{ route('users.list') }} @endif">Liste</a></li>
                                @endif
                                <li class="breadcrumb-item active">Mon Profil</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profil</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="card profile">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $user->image_url()}}" alt="eric tasca" class="rounded-circle img-thumbnail thumb-xl">
                                @if($user->is_connected !== null)
                                    <div class="online-circle">
                                        <i class="fa fa-circle text-success"></i>
                                    </div>
                                @endif
                                <h4 class="">{{ $user->full_name() }}</h4>
                                @if(Auth::user()->isDev())
                                    {{-- <a href="{{ route('user.edit',['token' => $user->token]) }}" class="btn btn-pink btn-round px-5">Editer</a> --}}
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="mt-0 mb-3">Service Client</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mt-2"><a href="tel:0665469516"><i class="mdi mdi-phone mr-2 text-success font-18"></i></a>{{ $information->clean_phone($information->phone) }}</li>
                                <li class="mt-2"><a href="mailto:{{ $information->email }}"><i class="mdi mdi-email-outline text-success font-18 mt-2 mr-2"></i></a>{{ $information->email }}</li>
                                <li class="mt-2"><i class="mdi mdi-map-marker text-success font-18 mt-2 mr-2"></i>{{ $information->uppercase($information->country) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <div class="card">
                        <div class="card-body profile">
                            <h5 class="mt-0 mb-4">Vos coordonnées</h5>
                                @if(Auth::user()->isDev())
                                    <p class="text-muted font-13 mb-4">@if($user->role === "ROLE_CLIENT") token_connection : {{ $user->token_connection }} @endif</p>
                                    <div class="text-right">
                                        <a href="{{ route('contact.client', ["id" => $user->id]) }}" class="btn btn-secondary mr-2"><i class="far fa-envelope"></i></a>
                                        <a href="{{ route('admin.user.notification', ['token' => $user->token]) }}" class="btn btn-success mr-2"><i class="fas fa-bell"></i></a>
                                        <a href="sms:{{$user->phone}}" class="btn btn-info mr-2"><i class="fas fa-comment"></i></a>
                                        <a href="tel:{{$user->phone}}" class="btn btn-info mr-2"><i class="fas fa-phone"></i></a>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <i class="far fa-building text-muted mr-2"></i>{{ $user->company_name() }}
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="text-muted font-13">@if($user->role === "ROLE_CLIENT") N° client : {{ $user->client_number }} @endif</p>
                                    </div>
                                </div>

                            <div class="row mb-4">
                                <div class="col-md-6 col-12">
                                    <i class="far fa-id-card text-muted mr-2"></i>siret : {{ $user->siret }}
                                </div>
                                <div class="col-md-6 col-12">
                                    <i class="fas fa-at text-muted"></i> : {{ $user->email }}
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 col-12">
                                    <i class="fas fa-phone text-muted mr-2"></i><span>Tél Fixe : </span> {{ $user->clean_phone($user->phone_home) }}

                                </div>
                                <div class="col-md-6 col-12">
                                    <i class="fas fa-mobile-alt text-muted mr-2"></i><span> Tél Mobile : </span> {{ $user->clean_phone($user->phone) }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p>Adresse</p>
                                    <div class="text-left">
                                        {!! $user->full_address() !!}

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="">
                        <div class="custom-tab tab-profile">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active pb-3 pt-0" data-toggle="tab" href="#projects" role="tab"><i class="fab fa-product-hunt mr-2"></i>Mes Projets</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link pb-3 pt-0" data-toggle="tab" href="#activity" role="tab"><i class="fas fa-suitcase mr-2"></i>Activity</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link pb-3 pt-0" data-toggle="tab" href="#settings" role="tab"><i class="fas fa-cog mr-2"></i>Editer</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content pt-4">
                                <div class="tab-pane active" id="projects" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="mt-0 mb-3">Liste de vos produits</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr class="align-self-center">
                                                                    <th>Nom du Projet</th>
                                                                    <th>Catégorie</th>
                                                                    <th>Date de mise en ligne</th>
                                                                    <th>Garantie</th>
                                                                    <th>Date de paiement</th>
                                                                    <th>PWA</th>
                                                                    <th>Connexion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                  @foreach (Auth::user()->products()->get() as $key => $product)
                                                                    <td>{{ $product->name }}</td>
                                                                    <td>{{ $product->type }}</td>
                                                                    <td>@if($product->date_online === null) N-C @else {{ date("d-m-Y", strtotime($product->date_online)) }} @endif</td>
                                                                    <td>@if($product->date_limit === null) N-C @else {{ $product->package()->first()->name }} - {{ date("d-m-Y", strtotime($product->date_limit)) }} @endif</td>
                                                                    <td>@if($product->date_paid === null) <span class="badge badge-boxed  badge-warning">En attente</span> @else <span class="badge badge-boxed  badge-success">Payé le </span> {{ date("d-m-Y", strtotime($product->date_paid)) }} @endif</td>
                                                                      <td>
                                                                        @if($product->pwa === 1)
                                                                            <i class="fas fa-check text-success"></i>
                                                                        @else
                                                                            <i class="fas fa-minus-circle text-danger"></i>
                                                                        @endif
                                                                      </td>
                                                                      <td class="text-center">
                                                                          @if($product->url !== null)
                                                                              <a href="{{ $product->url }}" target="_blank"><i class="fas fa-eye"></i> </a>
                                                                          @else
                                                                              <i class="fas fa-times-circle text-danger"></i>
                                                                          @endif
                                                                      </td>
                                                                  @endforeach

                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div><!--end table-responsive-->
                                                    {{-- <div class="pt-3 border-top text-right">
                                                        <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12 col-xl-3">
                                            <div class="card">
                                                <img src="assets/images/trophy.svg" alt="" class="img-fluid">
                                                <div class="card-body text-center bg-dark">
                                                    <h4 class="text-primary">" Congratulations For Your New Record "</h4>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                </div>
                                {{-- <div class="tab-pane" id="activity" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="mt-0 mb-3">Activity</h5>
                                                    <div class="activity">
                                                        <i class="mdi mdi-check text-primary"></i>
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">5 minutes ago</div>
                                                                <h5 class="my-0">Task finished</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <img src="assets/images/users/user-8.webp" alt="" class="img-activity">
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">30 minutes ago</div>
                                                                <h5 class="my-0">Task Overdue</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <i class="mdi mdi-alert-outline text-danger"></i>
                                                        <div class="time-item ">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">50 minutes ago</div>
                                                                <h5 class="my-0">Task finished</h5>
                                                                <p class="text-muted font-13">There are many variations of passages of Lorem Ipsum available.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <img src="assets/images/users/user-6.webp" alt="" class="img-activity">
                                                        <div class="time-item ">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">1 Day ago</div>
                                                                <h5 class="my-0">New Comment</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <img src="assets/images/users/user-8.webp" alt="" class="img-activity">
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">3 Day ago</div>
                                                                <h5 class="my-0">Task finished</h5>
                                                                <p class="text-muted font-13 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <i class="mdi mdi-comment-outline text-info"></i>
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">5 minutes ago</div>
                                                                <h5 class="my-0">Task finished</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <img src="assets/images/users/user-8.webp" alt="" class="img-activity">
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">30 minutes ago</div>
                                                                <h5 class="my-0">Task Overdue</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <i class="mdi mdi-check text-primary"></i>
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">5 minutes ago</div>
                                                                <h5 class="my-0">Task finished</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <img src="assets/images/users/user-8.webp" alt="" class="img-activity">
                                                        <div class="time-item">
                                                            <div class="item-info">
                                                                <div class="text-muted text-right font-10">30 minutes ago</div>
                                                                <h5 class="my-0">Task Overdue</h5>
                                                                <p class="text-muted font-13">Lorem ipsum dolor sit amet.
                                                                    <a href="#" class="text-info">[more info]</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="mt-0 mb-3">Photos</h5>
                                                    <p class="text-muted font-13">
                                                        It is a long established fact that a reader will
                                                        be distracted by the readable content of a page
                                                        when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal
                                                        distribution.
                                                    </p>
                                                    <div class="row px-3">
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-4.webp" title="30 min ago">
                                                                <img src="assets/images/small/img-4.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-6.webp" title="yesterday">
                                                                <img src="assets/images/small/img-6.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-7.webp" title="2 day ago">
                                                                <img src="assets/images/small/img-7.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-3.webp" title="last week">
                                                                <img src="assets/images/small/img-3.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-2.webp" title="last month">
                                                                <img src="assets/images/small/img-2.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-5.webp" title="2 month ago">
                                                                <img src="assets/images/small/img-5.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-8.webp" title="3 month ago">
                                                                <img src="assets/images/small/img-8.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-1.webp" title="6 month ago">
                                                                <img src="assets/images/small/img-1.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-6.webp" title="last year">
                                                                <img src="assets/images/small/img-6.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-4.webp" title="last year">
                                                                <img src="assets/images/small/img-4.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-6.webp" title="last year">
                                                                <img src="assets/images/small/img-6.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <a class="mfp-image" href="assets/images/small/img-7.webp" title="last year">
                                                                <img src="assets/images/small/img-7.webp" alt="" class="img-fluid">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="pt-3 text-right">
                                                        <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card">
                                      @if ($errors->any())
                                          <div class="alert alert-danger">
                                              <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                              </ul>
                                          </div>
                                      @endif

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                  <form action="@if(Auth::user()->role === "ROLE_CLIENT") {{ route('client.edit.post') }} @else {{ route('user.edit.post') }} @endif" method="post" enctype="multipart/form-data">
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
                                                                      <option value="ROLE_CLIENT" @if($user->role === "ROLE_CLIENT") selected @endif>client</option>
                                                                      @if(Auth::user()->role ==="ROLE_DEV")
                                                                          <option value="ROLE_STAFF" @if($user->role === "ROLE_STAFF") selected @endif>staff</option>
                                                                          <option value="ROLE_DEV" @if($user->role === "ROLE_DEV") selected @endif>dev</option>
                                                                      @endif
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-12">
                                                                  <label for="siret" class="col-form-label">N° Siret</label>
                                                                  <div class="">
                                                                      <input class="form-control" type="text" id="siret" placeholder="Siret" name="siret" value="@if($user->id !== null) {{ $user->siret }} @else {{ old('siret') }} @endif">
                                                                  </div>
                                                              </div>
                                                          @endif

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
                                                          <div class="form-group col-md-6 col-12">
                                                              <label for="zip" class="col-form-label">Code postal</label>
                                                              <div class="">
                                                                  <input class="form-control" type="text" id="zip" placeholder="code postale" name="zip" value="@if($user->zip !== null) {{ $user->zip }} @else {{ old('zip') }} @endif">
                                                              </div>
                                                          </div>
                                                          <div class="form-group col-md-6 col-12">
                                                              <label for="city" class="col-form-label">Ville</label>
                                                              <div class="">
                                                                  <input class="form-control" type="text" id="city" placeholder="ville" name="city" value="@if($user->city !== null) {{ $user->city }} @else {{ old('city') }} @endif">
                                                              </div>
                                                          </div>

                                                      </div>
                                                      <div class="row">
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
                                                      <p class="text-center m-2"><a href="{{ route('client.delete.confirm', ["token" => $user->token]) }}" class="btn btn-danger">@if(Auth::user()->isDev())Supprimer le compte @else Supprimer mon compte @endif</a></p>
                                                  @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- container -->
        @include('back.inc.footer')
    </div>
    <!-- end page content -->
@endsection
