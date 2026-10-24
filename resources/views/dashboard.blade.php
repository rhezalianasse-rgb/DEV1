@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex align-items-start align-items-md-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <p class="text-uppercase text-secondary small fw-semibold mb-1">Gestion De  Bibliotheque</p>
            <h1 class="h2 mb-1">Dashboard</h1>
            <p class="text-secondary mb-0">Vue d'ensemble de vos donnees.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-primary" href="{{ route('patients.create') }}">Ajouter un patient</a>
            <a class="btn btn-outline-primary" href="{{ route('medecins.create') }}">Ajouter un medecin</a>
        </div>
    </div>

    <section aria-label="Statistiques principales" class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
        @foreach ($stats as $stat)
            <div class="col">
                <a class="card h-100 shadow-sm text-decoration-none" href="{{ route($stat['route']) }}">
                    <div class="card-body">
                        <div class="text-secondary small fw-semibold">{{ $stat['label'] }}</div>
                        <div class="display-6 fw-semibold text-dark my-2">{{ $stat['count'] }}</div>
                        <span class="small text-primary">Consulter la liste &rarr;</span>
                    </div>
                </a>
            </div>
        @endforeach
    </section>

    <section class="row g-3" aria-label="Activite recente">
        <div class="col-12 col-xl-6">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h2 class="h5 mb-0">Patients recents</h2>
                    <a class="small text-decoration-none" href="{{ route('patients.index') }}">Tout voir</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead><tr><th>Patient</th><th>Email</th><th>Date d'ajout</th></tr></thead>
                        <tbody>
                            @forelse ($recentPatients as $patient)
                                <tr>
                                    <td><a class="text-decoration-none" href="{{ route('patients.show', $patient) }}">{{ $patient->prenom }} {{ $patient->nom }}</a></td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->created_at?->format('d/m/Y') ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr><td class="text-center text-secondary py-4" colspan="3">Aucun patient pour le moment.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h2 class="h5 mb-0">Medecins recents</h2>
                    <a class="small text-decoration-none" href="{{ route('medecins.index') }}">Tout voir</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead><tr><th>Medecin</th><th>Specialite</th><th>Telephone</th></tr></thead>
                        <tbody>
                            @forelse ($recentMedecins as $medecin)
                                <tr>
                                    <td><a class="text-decoration-none" href="{{ route('medecins.show', $medecin) }}">{{ $medecin->prenom }} {{ $medecin->nom }}</a></td>
                                    <td>{{ $medecin->specialite?->name ?? '-' }}</td>
                                    <td>{{ $medecin->telephone ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr><td class="text-center text-secondary py-4" colspan="3">Aucun medecin pour le moment.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
