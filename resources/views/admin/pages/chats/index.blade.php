@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')

    @include('admin.layouts.partials.header.sidebar')

    <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card wow mb-4">
                    <div class="card-body">
                     <div class="d-flex justify-content-between">
                      <h4 style="font-size: 20px;" class="mb-0">Tous les clients</h4>
                      <div class="group-btn">
                        {{-- <button class="btn btn-primary"><i class="fas fa-sort-alpha-up"></i></button>
                      <button class="btn btn-primary"><i class="fas fa-sort-alpha-down"></i></button> --}}
                      </div>
                      {{-- <div class="form-group w-25 d-flex mb-0">
                        <input type="text" class="form-control" placeholder="Recherche ici..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <button class="btn btn-primary btn-sm" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                          <i class="fas fa-search"></i>
                        </button>
                      </div> --}}
                     </div>
                     <div class="row mt-3">
                       <div class="col-lg-12">
                        <table class="table table-striped table-responsive-sm">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nom complet</th>
                              <th scope="col">Messages</th>
                              <th scope="col">Date</th>
                              {{-- <th scope="col">Etat</th> --}}
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $key => $user)
                                  {{-- @if ($user->clients?->first()?->chats?->count() > 0) --}}
                                  <tr >
                                    <a href="{{route('admin.chats.show',$user->client?->id)}}">
                                        <td>
                                          <a href="{{route('admin.chats.show',$user->client?->id)}}">
                                                {{-- <td><img src="{{ asset('assets/images/users/'.$user->image) }}" alt=""></td> --}}
                                              {{ $key + 1 }}
                                          </a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.chats.show',$user->client?->id)}}">
                                                {{ $user->client?->user->nom.' '.$user->client?->user->postnom.' '.$user?->client?->user->prenom }}
                                            </a>
                                        </td>
                                        <td>
                                          <a href="{{route('admin.chats.show',$user->client?->id)}}">
                                            {{ Str::substr($user->message,0,10)  }}
                                          </a>
                                        </td>
                                        <td>
                                          <a href="{{route('admin.chats.show',$user->client?->id)}}">
                                            {{ $user->created_at?->diffForHumans() }}</td>
                                          </a>
                                        {{-- <td>
                                            @if ($user->statut_id == '1')
                                                <span class="badge badge-success">
                                            @elseif ($user->statut_id == '2')
                                                <span class="badge badge-warning">
                                            @else
                                                <span class="badge badge-danger">
                                            @endif
                                                    {{ $user->statut->libelle }}
                                                </span>
                                      </td> --}}
                                    </a>
                                  </tr>
                                  {{-- @endif --}}
                              @endforeach
                          </tbody>
                        </table>
                       </div>
                     </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="col-lg-4">
                  <div class="card wow">
                    <div class="card-body">
                     <h4 style="font-size: 20px;"> Ajouter un produit </h4>
                     <hr>
                    <form method="post" action="{{ route('admin.produits.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="nom">Nom du médicament</label>
                            <input type="text" class="form-control" placeholder="Entrez le nom du produit" name="nom">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="categorie_id">Catégories</label>
                            <select name="categorie_id" id="categorie_id" class="form-control">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="description">Description du produit</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Entrez la description du produit"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="posologie">Posologie du produit</label>
                            <textarea name="posologie" id="posologie" class="form-control" placeholder="Entrez la posologie du produit"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <label for="statut">Statut</label>
                            <select name="statut_id" id="statut" class="form-control">
                                <option value="1"> Actif </option>
                                <option value="2"> Inactif </option>
                                <option value="3"> En attente </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                              <label for="category">Image</label>
                            </div>
                            <div class="col-lg-12">
                              <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input form-control" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">Selectionnez une image</label>
                              </div>
                            </div>
                          </div>
                        <div class="form-group row">
                          <div class="col-lg-12">
                            <button class="btn btn-primary w-50">Valider</button>
                          </div>
                        </div>
                     </form>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

      @foreach ($users as $key => $user)
        <div class="modal fade" id="ModalUser_{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Détails du user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body detail-act">
                  <div class="card">
                    <div class="card-img">
                      <img src="{{ asset('assets/images/users/'.$user->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body">
                      <div class="text-left">
                        <h4><span>{{ $user->libelle }}</span></h4>
                        <div class="date">
                          <i class="fas fa-calendar mr-2"></i> {{ $user->created_at->format('d-m-Y') }}
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-white pl-0 d-flex justify-content-between">
                        <div class="custom-control custom-switch">
                            <a href="{{ route('admin.clients.edit', [$user->id]) }}" class="btn btn-default btn-delete">Modifier le user</a>
                        </div>
                    <div class="group-btn">
                        <a href="{{ route('admin.clients.delete', [$user->id]) }}" class="btn btn-default btn-delete">Supprimer le user</a>
                    </div>
                    </div>
                    <div class="sm-badge">
                      <div class="icon-sm">
                        <i class="fas fa-question"></i>
                      </div>
                      <div class="text-left">
                        <span>Voulez-vous vraiment supprimer ?</span>
                        <button class="btn btn-default btn-sm text-success"><i class="fas fa-check"></i> Oui</button>
                        <button class="btn btn-default btn-sm text-danger btn-no"><i class="fas fa-times"></i> Non</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endforeach

@endsection

@section('script')
@endsection
