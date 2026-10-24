<?php

namespace Database\Seeders;

use App\Models\Medcine;
use App\Models\Specialite;
use Illuminate\Database\Seeder;

class ExempleMedecinsSeeder extends Seeder
{
    public function run(): void
    {
        $medecins = [
            [
                'prenom' => 'Salma',
                'nom' => 'Benali',
                'telephone' => '0600000001',
                'tarif' => 300,
                'specialite' => 'Cardiologie',
            ],
            [
                'prenom' => 'Youssef',
                'nom' => 'Amrani',
                'telephone' => '0600000002',
                'tarif' => 250,
                'specialite' => 'Dermatologie',
            ],
            [
                'prenom' => 'Nadia',
                'nom' => 'El Idrissi',
                'telephone' => '0600000003',
                'tarif' => 280,
                'specialite' => 'Pédiatrie',
            ],
        ];

        foreach ($medecins as $attributes) {
            $specialite = Specialite::where('name', $attributes['specialite'])->firstOrFail();
            unset($attributes['specialite']);

            Medcine::firstOrCreate(
                [
                    'prenom' => $attributes['prenom'],
                    'nom' => $attributes['nom'],
                    'specialite_id' => $specialite->id,
                ],
                $attributes,
            );
        }
    }
}
