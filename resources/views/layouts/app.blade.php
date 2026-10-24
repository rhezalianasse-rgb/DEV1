<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestion') | Cabinet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">Gestion</a>
            <div class="d-flex align-items-center flex-wrap gap-3">
                @auth
                    <div class="navbar-nav flex-row flex-wrap gap-3">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        <a class="nav-link" href="{{ route('medecins.index') }}">Medecins</a>
                        <a class="nav-link" href="{{ route('patients.index') }}">Patients</a>
                        <a class="nav-link" href="{{ route('auteurs.index') }}">Auteurs</a>
                        <a class="nav-link" href="{{ route('livres.index') }}">Livres</a>
                        @if (auth()->user()->isAdmin())
                            <a class="nav-link" href="{{ route('admin.users.index') }}">Utilisateurs</a>
                        @endif
                    </div>
                    <span class="small text-secondary">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm" type="submit">Se déconnecter</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Créer un compte</a>
                @endauth
            </div>
        </div>
    </nav>
    <main class="container py-4 py-md-5">
        @auth
            @unless (request()->routeIs('dashboard'))
                <a class="btn btn-outline-primary mb-3" href="{{ route('dashboard') }}">
                    &larr; Retour au tableau de bord
                </a>
            @endunless
        @endauth
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
