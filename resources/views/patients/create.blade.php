@extends('layouts.app')

@section('title', 'Ajouter un patient')

@section('content')
    <div class="mb-4">
        <a class="link-secondary text-decoration-none" href="{{ route('patients.index') }}">&larr; Patients</a>
        <h1 class="h2 mt-3">Ajouter un patient</h1>
    </div>
    <div class="card shadow-sm"><div class="card-body p-4">
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="prenom">Prenom</label>
                    <input class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    @error('prenom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="nom">Nom</label>
                    <input class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                    @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="date_naissance">Date de naissance</label>
                    <input class="form-control @error('date_naissance') is-invalid @enderror" id="date_naissance" name="date_naissance" type="date" max="{{ now()->subDay()->toDateString() }}" value="{{ old('date_naissance') }}" required>
                    @error('date_naissance')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
                <a class="btn btn-outline-secondary" href="{{ route('patients.index') }}">Annuler</a>
            </div>
        </form>
    </div></div>
@endsection
