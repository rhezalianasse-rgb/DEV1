<?php

namespace App\Http\Controllers;

use App\Models\livre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LivreController extends Controller
{
    public function index(): View
    {
        $livres = livre::with('auteur')->get();

        return view('livres.index', compact('livres'));
    }

    public function show(string $id): View
    {
        $livre = livre::with('auteur')->findOrFail($id);

        return view('livres.show', compact('livre'));
    }

    public function create(): View
    {
        return view('livres.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'auteur_id' => 'required|exists:auteurs,id',
            'titre' => 'required|string|max:200',
            'isbn' => 'required|string|max:20|unique:livres,isbn',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'date_publication' => 'required|date',
            'disponible' => 'nullable|boolean',
        ]);

        $validated['disponible'] = $request->boolean('disponible');

        livre::create($validated);

        return redirect()->route('livres.index');
    }

    public function edit(string $id): View
    {
        $livre = livre::findOrFail($id);

        return view('livres.create', compact('livre'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $livre = livre::findOrFail($id);

        $validated = $request->validate([
            'auteur_id' => 'required|exists:auteurs,id',
            'titre' => 'required|string|max:200',
            'isbn' => 'required|string|max:20|unique:livres,isbn,' . $livre->id,
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'date_publication' => 'required|date',
            'disponible' => 'nullable|boolean',
        ]);

        $validated['disponible'] = $request->boolean('disponible');

        $livre->update($validated);

        return redirect()->route('livres.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $livre = livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('livres.index');
    }
}

