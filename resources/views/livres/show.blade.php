<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0 mx-auto" style="max-width: 700px;">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <h1 class="h3 mb-0 text-primary">Détails du livre</h1>
                    <a href="{{ route('livres.index') }}" class="btn btn-outline-secondary">Retour</a>
                </div>

                <dl class="row mb-0">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $livre->id }}</dd>

                    <dt class="col-sm-4">Titre</dt>
                    <dd class="col-sm-8">{{ $livre->titre }}</dd>

                    <dt class="col-sm-4">Auteur</dt>
                    <dd class="col-sm-8">
                        @if($livre->auteur)
                            <a href="{{ route('auteurs.show', ['id' => $livre->auteur->getRouteKey()]) }}">
                                {{ $livre->auteur->prenom }} {{ $livre->auteur->name }}
                            </a>
                        @else
                            N/A
                        @endif
                    </dd>

                    <dt class="col-sm-4">ISBN</dt>
                    <dd class="col-sm-8">{{ $livre->isbn }}</dd>

                    <dt class="col-sm-4">Prix</dt>
                    <dd class="col-sm-8">{{ $livre->prix }}</dd>

                    <dt class="col-sm-4">Stock</dt>
                    <dd class="col-sm-8">{{ $livre->stock }}</dd>

                    <dt class="col-sm-4">Date de publication</dt>
                    <dd class="col-sm-8">{{ $livre->date_publication }}</dd>

                    <dt class="col-sm-4">Disponible</dt>
                    <dd class="col-sm-8">
                        <span class="badge {{ $livre->disponible ? 'bg-success' : 'bg-secondary' }}">
                            {{ $livre->disponible ? 'Oui' : 'Non' }}
                        </span>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
