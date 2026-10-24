@extends('layouts.app')

@section('title', 'Medecins')

@section('content')
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Medecins</h1>
            <p class="text-secondary mb-0">{{ $medecins->total() }} medecin(s)</p>
        </div>
        <a class="btn btn-primary" href="{{ route('medecins.create') }}">Ajouter un medecin</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr><th>Nom</th><th>Specialite</th><th>Telephone</th><th>Tarif</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                    @forelse ($medecins as $medecin)
                        <tr>
                            <td>{{ $medecin->prenom }} {{ $medecin->nom }}</td>
                            <td>{{ $medecin->specialite?->name ?? '-' }}</td>
                            <td>{{ $medecin->telephone ?? '-' }}</td>
                            <td>{{ number_format((float) $medecin->tarif, 2, ',', ' ') }}</td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('medecins.show', $medecin) }}">Voir</a>
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('medecins.edit', $medecin) }}">Modifier</a>
                                    <form action="{{ route('medecins.destroy', $medecin) }}" method="POST" onsubmit="return confirm('Supprimer ce m\u00e9decin ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="text-center text-secondary py-4" colspan="5">Aucun medecin enregistre.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $medecins->links() }}</div>
@endsection
