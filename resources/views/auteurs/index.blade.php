<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des auteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h1 class="mb-0 text-primary">Liste des auteurs</h1>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Retour au tableau de bord</a>
                <a href="{{ route('auteurs.create') }}" class="btn btn-primary">Ajouter un auteur</a>
                <a href="{{ route('livres.index') }}" class="btn btn-outline-secondary">Liste des livres</a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Date naissance</th>
                                <th>Nationalité</th>
                                <th>Actif</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aut as $a)
                                <tr>
                                    <td>{{ $a->id }}</td>
                                    <td>{{ $a->name }}</td>
                                    <td>{{ $a->prenom }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>{{ $a->date_naissance }}</td>
                                    <td>{{ $a->nationalite }}</td>
                                    <td>
                                        <span class="badge {{ $a->actif ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $a->actif ? 'Oui' : 'Non' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                                            <a href="{{ route('auteurs.show', ['id' => $a->getRouteKey()]) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                            <a href="{{ route('auteurs.edit', $a->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{ route('auteurs.destroy', $a->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
