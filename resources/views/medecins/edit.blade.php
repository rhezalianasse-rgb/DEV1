@extends('layouts.app')

@section('title', 'Modifier un medecin')

@section('content')
    <div class="mb-4">
        <a class="link-secondary text-decoration-none" href="{{ route('medecins.show', $medecin) }}">&larr; Fiche du medecin</a>
        <h1 class="h2 mt-3">Modifier {{ $medecin->prenom }} {{ $medecin->nom }}</h1>
    </div>
    <div class="card shadow-sm"><div class="card-body p-4">
        <form action="{{ route('medecins.update', $medecin) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="prenom">Prenom</label>
                    <input class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom', $medecin->prenom) }}" required>
                    @error('prenom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="nom">Nom</label>
                    <input class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $medecin->nom) }}" required>
                    @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="telephone">Telephone</label>
                    <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', $medecin->telephone) }}">
                    @error('telephone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="tarif">Tarif</label>
                    <input class="form-control @error('tarif') is-invalid @enderror" id="tarif" name="tarif" type="number" min="0" step="0.01" value="{{ old('tarif', $medecin->tarif) }}" required>
                    @error('tarif')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label" for="specialite_id">Specialite</label>
                    <select class="form-select @error('specialite_id') is-invalid @enderror" id="specialite_id" name="specialite_id" required>
                        <option value="">Choisir une specialite</option>
                        @foreach ($specialites as $specialite)
                            <option value="{{ $specialite->id }}" @selected(old('specialite_id', $medecin->specialite_id) == $specialite->id)>{{ $specialite->name }}</option>
                        @endforeach
                    </select>
                    @error('specialite_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary" type="submit">Enregistrer les modifications</button>
                <a class="btn btn-outline-secondary" href="{{ route('medecins.show', $medecin) }}">Annuler</a>
            </div>
        </form>
    </div></div>
@endsection
