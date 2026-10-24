<?php

namespace Database\Seeders;

use App\Models\Specialite;
use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialites = [
            ['name' => 'Médecine générale', 'description' => 'Consultations de médecine générale.'],
            ['name' => 'Cardiologie', 'description' => 'Prévention et traitement des maladies du cœur.'],
            ['name' => 'Dermatologie', 'description' => 'Diagnostic et traitement des maladies de la peau.'],
            ['name' => 'Pédiatrie', 'description' => 'Soins médicaux destinés aux enfants.'],
            ['name' => 'Ophtalmologie', 'description' => 'Diagnostic et traitement des maladies des yeux.'],
        ];
        foreach ($specialites as $specialite) {
            Specialite::updateOrCreate(['name' => $specialite['name']], $specialite);
        }
    }
}
