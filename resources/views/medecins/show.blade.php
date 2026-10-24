@extends('layouts.app')

@section('title', 'Fiche medecin')

@section('content')
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <a class="link-secondary text-decoration-none" href="{{ route('medecins.index') }}">&larr; Medecins</a>
            <h1 class="h2 mt-3 mb-0">{{ $medecin->prenom }} {{ $medecin->nom }}</h1>
        </div>
        <a class="btn btn-primary" href="{{ route('medecins.edit', $medecin) }}">Modifier</a>
    </div>
    <div class="card shadow-sm"><div class="card-body p-4">
        <dl class="row mb-0">
            <dt class="col-sm-3">Specialite</dt><dd class="col-sm-9">{{ $medecin->specialite?->name ?? '-' }}</dd>
            <dt class="col-sm-3">Telephone</dt><dd class="col-sm-9">{{ $medecin->telephone ?? '-' }}</dd>
            <dt class="col-sm-3">Tarif</dt><dd class="col-sm-9">{{ number_format((float) $medecin->tarif, 2, ',', ' ') }}</dd>
        </dl>
    </div></div>
@endsection
