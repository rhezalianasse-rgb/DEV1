<?php

namespace App\Http\Controllers;

use App\Models\auteurs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuteurController extends Controller
{
    public function index(): View
    {
        $aut = auteurs::all();

        return view('auteurs.index', compact('aut'));
    }

    public function create(): View
    {
        return view('auteurs.create');
    }

    public function show(string $id): View
    {
        $auteur = auteurs::with('livres')->findOrFail($id);

        return view('auteurs.show', compact('auteur'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:auteurs,email',
            'date_naissance' => 'nullable|date',
            'nationalite' => 'nullable|string|max:100',
            'actif' => 'boolean',
        ]);
        $validated['actif'] = $request->boolean('actif');

        auteurs::create($validated);

        return redirect()->route('auteurs.index');
    }

    public function edit(string $id): View
    {
        $auteur = auteurs::findOrFail($id);

        return view('auteurs.create', compact('auteur'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $auteur = auteurs::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:auteurs,email,' . $auteur->id,
            'date_naissance' => 'nullable|date',
            'nationalite' => 'nullable|string|max:100',
            'actif' => 'boolean',
        ]);
        $validated['actif'] = $request->boolean('actif');

        $auteur->update($validated);

        return redirect()->route('auteurs.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $auteur = auteurs::findOrFail($id);
        $auteur->delete();

        return redirect()->route('auteurs.index');
    }
}
