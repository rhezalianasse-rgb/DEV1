
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h1 class="mb-0 text-primary">Liste des livres</h1>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Retour au tableau de bord</a>
                <a href="{{ route('livres.create') }}" class="btn btn-primary">Ajouter un livre</a>
                <a href="{{ route('auteurs.index') }}" class="btn btn-outline-secondary">Liste des auteurs</a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Auteur</th>
                                <th>Titre</th>
                                <th>ISBN</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Date publication</th>
                                <th>Disponible</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($livres as $livre)
                                <tr>
                                    <td>{{ $livre->id }}</td>
                                    <td>{{ $livre->auteur ? $livre->auteur->prenom . ' ' . $livre->auteur->name : 'N/A' }}</td>
                                    <td>{{ $livre->titre }}</td>
                                    <td>{{ $livre->isbn }}</td>
                                    <td>{{ $livre->prix }}</td>
                                    <td>{{ $livre->stock }}</td>
                                    <td>{{ $livre->date_publication }}</td>
                                    <td>
                                        <span class="badge {{ $livre->disponible ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $livre->disponible ? 'Oui' : 'Non' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                                            <a href="{{ route('livres.show', ['id' => $livre->getRouteKey()]) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                            <a href="{{ route('livres.edit', ['id' => $livre->getRouteKey()]) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{ route('livres.destroy', ['id' => $livre->getRouteKey()]) }}" method="POST" class="d-inline">
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