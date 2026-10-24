<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($livre) ? 'Modifier un livre' : 'Créer un livre' }}</title>
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
                            {{ isset($livre) ? 'Modifier un livre' : 'Créer un livre' }}
                        </h1>

                        <form action="{{ isset($livre) ? route('livres.update', $livre->id) : route('livres.store') }}" method="POST">
                            @csrf
                            @if(isset($livre))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="auteur_id" class="form-label">Auteur</label>
                                <select name="auteur_id" id="auteur_id" class="form-select" required>
                                    <option value="">Choisir un auteur</option>
                                    @foreach(App\Models\auteurs::all() as $auteur)
                                        <option value="{{ $auteur->id }}" @selected(old('auteur_id', $livre->auteur_id ?? '') == $auteur->id)>{{ $auteur->prenom }} {{ $auteur->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $livre->titre ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $livre->isbn ?? '') }}" required>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="prix" class="form-label">Prix</label>
                                    <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ old('prix', $livre->prix ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $livre->stock ?? '') }}" required>
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="date_publication" class="form-label">Date de publication</label>
                                <input type="date" class="form-control" id="date_publication" name="date_publication" value="{{ old('date_publication', isset($livre) && $livre->date_publication ? $livre->date_publication->format('Y-m-d') : '') }}" required>
                            </div>

                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" id="disponible" name="disponible" value="1" @checked(old('disponible', $livre->disponible ?? true))>
                                <label class="form-check-label" for="disponible">Disponible</label>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-between align-items-center">
                                <a href="{{ route('livres.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
                                <button type="submit" class="btn btn-primary px-4">{{ isset($livre) ? 'Modifier' : 'Enregistrer' }}</button>
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
