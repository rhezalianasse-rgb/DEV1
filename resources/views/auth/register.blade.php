@extends('layouts.app')

@section('title', 'Créer un compte')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h3 mb-4">Créer un compte</h1>
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Nom</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Adresse e-mail</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required autocomplete="new-password">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirmer le mot de passe</label>
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password">
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Créer mon compte</button>
                    </form>
                    <p class="text-secondary small mt-3 mb-0">Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
