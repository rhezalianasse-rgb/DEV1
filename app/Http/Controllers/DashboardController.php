<?php

namespace App\Http\Controllers;

use App\Models\auteurs as Auteur;
use App\Models\livre as Livre;
use App\Models\Medcine;
use App\Models\Patient;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'stats' => [
                ['label' => 'Patients', 'count' => Patient::count(), 'route' => 'patients.index'],
                ['label' => 'Medecins', 'count' => Medcine::count(), 'route' => 'medecins.index'],
                ['label' => 'Auteurs', 'count' => Auteur::count(), 'route' => 'auteurs.index'],
                ['label' => 'Livres', 'count' => Livre::count(), 'route' => 'livres.index'],
            ],
            'recentPatients' => Patient::latest()->take(5)->get(),
            'recentMedecins' => Medcine::with('specialite')->latest()->take(5)->get(),
        ]);
    }
}
