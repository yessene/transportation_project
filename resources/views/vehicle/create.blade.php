@extends('layouts.master')
@section('menu')

@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add vehicule</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('add-vehicule') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row formtype">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>N° Immatriculation</label>
                                            <input type="text" class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" value="{{ old('matricule') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Premiére Mise en Ciculation</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('date_circulation') is-invalid @enderror" name="date_circulation" value="{{ old('date_circulation') }}"> 
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>M.C au Maroc</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('mc') is-invalid @enderror" name="mc" value="{{ old('mc') }}"> 
                                            </div>                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mutation le</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('mutation') is-invalid @enderror" name="mutation" value="{{ old('mutation') }}"> 
                                            </div>                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date de validité</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker @error('validite_date') is-invalid @enderror" name="validite_date" value="{{ old('validite_date') }}"> 
                                            </div>                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Propriétaire</label>
                                            <input type="text" class="form-control @error('proprietaire') is-invalid @enderror" id="proprietaire" name="proprietaire" value="{{ old('proprietaire') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Marque</label>
                                            <input type="text" class="form-control @error('marque') is-invalid @enderror" id="marque" name="marque" value="{{ old('marque') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre">
                                                <option value="" disabled selected>Select Genre</option>
                                                <option value="remorque" {{ old('genre') === 'remorque' ? 'selected' : '' }}>Remorque</option>
                                                <option value="forgon" {{ old('genre') === 'forgon' ? 'selected' : '' }}>Forgon</option>
                                                <option value="conteneur" {{ old('genre') === 'conteneur' ? 'selected' : '' }}>Conteneur</option>
                                                <option value="camion" {{ old('genre') === 'camion' ? 'selected' : '' }}>Camion</option>
                                                <option value="tracteur" {{ old('genre') === 'tracteur' ? 'selected' : '' }}>Tracteur</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Modele</label>
                                            <input type="text" class="form-control @error('modele') is-invalid @enderror" id="modele" name="modele" value="{{ old('modele') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Carburant</label>
                                            <select class="form-control @error('carburant') is-invalid @enderror" id="carburant" name="carburant">
                                                <option value="" disabled selected>Select Carburant</option>
                                                <option value="Diesel" {{ old('carburant') === 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                                <option value="Essence" {{ old('carburant') === 'Essence' ? 'selected' : '' }}>Essence</option>
                                                <option value="Carburants gazeux" {{ old('carburant') === 'Carburants gazeux' ? 'selected' : '' }}>Carburants gazeux</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>N° du chassis</label>
                                            <input type="text" class="form-control @error('n_chassis') is-invalid @enderror" id="n_chassis" name="n_chassis" value="{{ old('n_chassis') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nbre cylindres</label>
                                            <input type="number" class="form-control @error('nbre_cylindres') is-invalid @enderror" id="nbre_cylindres" name="nbre_cylindres" value="{{ old('nbre_cylindres') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Puissance fiscale</label>
                                            <input type="number" class="form-control @error('puissance') is-invalid @enderror" id="puissance" name="puissance" value="{{ old('puissance') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>P.T.A.C</label>
                                            <input type="text" class="form-control @error('ptac') is-invalid @enderror" id="ptac" name="ptac" value="{{ old('ptac') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Poids à vide</label>
                                            <input type="number" class="form-control @error('poids') is-invalid @enderror" id="poids" name="poids" value="{{ old('poids') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>P.T.M.C.T</label>
                                            <input type="number" class="form-control @error('ptmct') is-invalid @enderror" id="ptmct" name="ptmct" value="{{ old('ptmct') }}">
                                        </div>
                                    </div>
                                    

                                 
                                
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Create Vehicule</button>
            </form>
        </div>
    </div>
@endsection 