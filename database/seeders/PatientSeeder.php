<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = Patient::all();
        if ($patients->isEmpty()) {
            Patient::factory()->count(20)->create();
            return;
        }
        foreach ($patients as $patient) {
            Patient::factory()->count(2)->create([
                'patient_id' => $patient->id,
            ]);
        }
    }
}
