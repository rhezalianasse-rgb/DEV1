<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'auteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0 mx-auto" style="max-width: 700px;">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <h1 class="h3 mb-0 text-primary">Détails de l'auteur</h1>
                    <a href="{{ route('auteurs.index') }}" class="btn btn-outline-secondary">Retour</a>
                </div>

                <dl class="row mb-4">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $auteur->id }}</dd>

                    <dt class="col-sm-4">Nom</dt>
                    <dd class="col-sm-8">{{ $auteur->name }}</dd>

                    <dt class="col-sm-4">Prénom</dt>
                    <dd class="col-sm-8">{{ $auteur->prenom }}</dd>

                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $auteur->email }}</dd>

                    <dt class="col-sm-4">Date de naissance</dt>
                    <dd class="col-sm-8">{{ $auteur->date_naissance }}</dd>

                    <dt class="col-sm-4">Nationalité</dt>
                    <dd class="col-sm-8">{{ $auteur->nationalite }}</dd>

                    <dt class="col-sm-4">Actif</dt>
                    <dd class="col-sm-8">
                        <span class="badge {{ $auteur->actif ? 'bg-success' : 'bg-secondary' }}">
                            {{ $auteur->actif ? 'Oui' : 'Non' }}
                        </span>
                    </dd>
                </dl>

                <div class="mt-4">
                    <h2 class="h5 mb-3">Livres de cet auteur</h2>
                    @forelse($auteur->livres as $livre)
                        <div class="list-group">
                            <a href="{{ route('livres.show', ['id' => $livre->getRouteKey()]) }}" class="list-group-item list-group-item-action">
                                {{ $livre->titre }}
                            </a>
                        </div>
                    @empty
                        <div class="alert alert-light border mb-0">Aucun livre associé.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
