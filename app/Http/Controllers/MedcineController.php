<?php

namespace App\Http\Controllers;

use App\Models\Medcine;
use App\Models\Specialite;
use Illuminate\Http\Request;

class MedcineController extends Controller
{
    public function index()
    {
        $medecins = Medcine::with('specialite')
            ->orderBy('nom')
            ->paginate(10);

        return view('medecins.index', compact('medecins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialites = Specialite::orderBy('name')->get();

        return view('medecins.create', compact('specialites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'telephone' => 'nullable|string|max:20',
            'tarif' => 'required|numeric|min:0',
            'specialite_id' => 'required|exists:specialites,id',
        ]);

        Medcine::create($validated);

        return redirect()
            ->route('medecins.index')
            ->with('success', 'Medecin cree avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medcine $medecin)
    {
        $medecin->load('specialite');

        return view('medecins.show', compact('medecin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medcine $medecin)
    {
        $specialites = Specialite::orderBy('name')->get();

        return view('medecins.edit', compact('medecin', 'specialites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medcine $medecin)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'telephone' => 'nullable|string|max:20',
            'tarif' => 'required|numeric|min:0',
            'specialite_id' => 'required|exists:specialites,id',
        ]);

        $medecin->update($validated);

        return redirect()
            ->route('medecins.show', $medecin)
            ->with('success', 'Medecin modifie avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medcine $medecin)
    {
        $medecin->delete();

        return redirect()
            ->route('medecins.index')
            ->with('success', 'Medecin supprime avec succes.');
    }
}
