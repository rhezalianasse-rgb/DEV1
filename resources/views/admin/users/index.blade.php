@extends('layouts.app')

@section('title', 'Utilisateurs')

@section('content')
    <div class="mb-4">
        <h1 class="h2 mb-1">Informations des utilisateurs</h1>
        <p class="text-secondary mb-0">{{ $users->total() }} compte(s)</p>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Adresse e-mail</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at?->format('d/m/Y H:i') ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-secondary py-4" colspan="3">Aucun utilisateur.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $users->links() }}</div>
@endsection
