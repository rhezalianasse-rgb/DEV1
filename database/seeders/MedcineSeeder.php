<?php

namespace Database\Seeders;

use App\Models\Medcine;
use App\Models\Specialite;
use Illuminate\Database\Seeder;

class MedcineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialites = Specialite::all();

        if ($specialites->isEmpty()) {
            Medcine::factory()->count(10)->create();

            return;
        }

        foreach ($specialites as $specialite) {
            Medcine::factory()->count(2)->create([
                'specialite_id' => $specialite->id,
            ]);
        }
    }
}
