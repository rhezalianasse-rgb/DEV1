<?php

namespace Database\Seeders;

use App\Models\auteurs as Auteur;
use Illuminate\Database\Seeder;

class AuteurSeeder extends Seeder
{
    public function run(): void
    {
        Auteur::create([
            'name' => 'ANASSE',
            'prenom' => 'RHEZALI',
            'email' => 'anasse.rhezali@example.com',
            'date_naissance' => '1980-01-01',
            'nationalite' => 'Marocaine',
            'actif' => true,
        ]);

        Auteur::create([
            'name' => 'OUMAIMA',
            'prenom' => 'BE',
            'email' => 'oumaima.rhezali@example.com',
            'date_naissance' => '2005-01-11',
            'nationalite' => 'MARROCAINE',
            'actif' => true,
        ]);

        Auteur::create([
            'name' => 'OHTMANE',
            'prenom' => 'MAOULOUA',
            'email' => 'ohtmane.maouloua@example.com',
            'date_naissance' => '2003-11-14',
            'nationalite' => 'MARROCAINE',
            'actif' => true,
        ]);

        Auteur::create([
            'name' => 'RACHID',
            'prenom' => 'ELKHAOUI',
            'email' => 'rachid.elkhaoui@example.com',
            'date_naissance' => '1990-05-20',
            'nationalite' => 'MARROCAINE',
            'actif' => true,
        ]);

        Auteur::create([
            'name' => 'YASSINE',
            'prenom' => 'ELKHAOUI',
            'email' => 'yassine.elkhaoui@example.com',
            'date_naissance' => '1995-08-15',
            'nationalite' => 'MARROCAINE',
            'actif' => true,
        ]);

        Auteur::create([
            'name' => 'Nolan',
            'prenom' => 'Christopher',
            'email' => 'christopher@example.com',
            'date_naissance' => '1970-07-30',
            'nationalite' => 'Britannique',
            'actif' => true,
        ]);
    }
}
