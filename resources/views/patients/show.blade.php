@extends('layouts.app')

@section('title', 'Fiche patient')

@section('content')
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <a class="link-secondary text-decoration-none" href="{{ route('patients.index') }}">&larr; Patients</a>
            <h1 class="h2 mt-3 mb-0">{{ $patient->prenom }} {{ $patient->nom }}</h1>
        </div>
        <a class="btn btn-primary" href="{{ route('patients.edit', $patient) }}">Modifier</a>
    </div>
    <div class="card shadow-sm"><div class="card-body p-4">
        <dl class="row mb-0">
            <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $patient->email }}</dd>
            <dt class="col-sm-3">Date de naissance</dt><dd class="col-sm-9">{{ \Illuminate\Support\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}</dd>
        </dl>
    </div></div>
@endsection
