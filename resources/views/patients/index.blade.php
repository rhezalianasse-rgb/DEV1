@extends('layouts.app')

@section('title', 'Patients')

@section('content')
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Patients</h1>
            <p class="text-secondary mb-0">{{ $patients->total() }} patient(s)</p>
        </div>
        <a class="btn btn-primary" href="{{ route('patients.create') }}">Ajouter un patient</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark"><tr><th>Nom</th><th>Email</th><th>Date de naissance</th><th class="text-end">Actions</th></tr></thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <td>{{ $patient->prenom }} {{ $patient->nom }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ \Illuminate\Support\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}</td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('patients.show', $patient) }}">Voir</a>
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('patients.edit', $patient) }}">Modifier</a>
                                    <form action="{{ route('patients.destroy', $patient) }}" method="POST" onsubmit="return confirm('Supprimer ce patient ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-secondary py-4" colspan="4">Aucun patient enregistre.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $patients->links() }}</div>
@endsection
