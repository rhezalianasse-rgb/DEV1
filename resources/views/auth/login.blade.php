@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h3 mb-4">Connexion</h1>
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">Adresse e-mail</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required autocomplete="current-password">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="remember" name="remember" type="checkbox" value="1">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Se connecter</button>
                    </form>
                    <p class="text-secondary small mt-3 mb-0">Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
