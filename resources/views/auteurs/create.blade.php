<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($auteur) ? 'Modifier l\'auteur' : 'Créer un auteur' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3 mb-4 text-center text-primary">
                            {{ isset($auteur) ? 'Modifier l\'auteur' : 'Créer un auteur' }}
                        </h1>

                        <form action="{{ isset($auteur) ? route('auteurs.update', $auteur->id) : route('auteurs.store') }}" method="POST">
                            @csrf
                            @if(isset($auteur))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $auteur->name ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $auteur->prenom ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $auteur->email ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', isset($auteur) && $auteur->date_naissance ? $auteur->date_naissance->format('Y-m-d') : '') }}">
                            </div>

                            <div class="mb-3">
                                <label for="nationalite" class="form-label">Nationalité</label>
                                <input type="text" class="form-control" id="nationalite" name="nationalite" value="{{ old('nationalite', $auteur->nationalite ?? '') }}">
                            </div>

                            <div class="form-check form-switch mb-4">
                                <input type="hidden" name="actif" value="0">
                                <input class="form-check-input" type="checkbox" id="actif" name="actif" value="1" {{ old('actif', $auteur->actif ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="actif">Actif</label>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-between align-items-center">
                                <a href="{{ route('auteurs.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
                                <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
