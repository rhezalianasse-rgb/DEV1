<?php

namespace Database\Seeders;

use App\Models\livre as Livre;
use Illuminate\Database\Seeder;

class livreSeeder extends Seeder
{
    public function run(): void
    {
        Livre::create([
            'auteur_id' => 1,
            'titre' => 'Livre 1',
            'isbn' => '978-3-16-148410-0',
            'prix' => 19.99,
            'stock' => 10,
            'date_publication' => '2023-01-01',
            'disponible' => true,
        ]);

        Livre::create([
            'auteur_id' => 2,
            'titre' => 'Livre 2',
            'isbn' => '978-1-23-456789-0',
            'prix' => 29.99,
            'stock' => 5,
            'date_publication' => '2023-02-15',
            'disponible' => true,
        ]);

        Livre::create([
            'auteur_id' => 3,
            'titre' => 'Livre 3',
            'isbn' => '978-0-12-345678-9',
            'prix' => 14.99,
            'stock' => 20,
            'date_publication' => '2023-03-10',
            'disponible' => true,
        ]);

        Livre::create([
            'auteur_id' => 4,
            'titre' => 'Livre 4',
            'isbn' => '978-9-87-654321-0',
            'prix' => 24.99,
            'stock' => 8,
            'date_publication' => '2023-04-05',
            'disponible' => true,
        ]);

        Livre::create([
            'auteur_id' => 5,
            'titre' => 'Livre 5',
            'isbn' => '978-8-76-543210-9',
            'prix' => 34.99,
            'stock' => 15,
            'date_publication' => '2023-05-20',
            'disponible' => true,
        ]);

        Livre::create([
            'auteur_id' => 6,
            'titre' => 'Livre 6',
            'isbn' => '978-7-65-432109-8',
            'prix' => 39.99,
            'stock' => 12,
            'date_publication' => '2023-06-15',
            'disponible' => true,
        ]);

        Livre::create([
            'auteur_id' => 1,
            'titre' => 'Livre 7',
            'isbn' => '978-6-54-321098-7',
            'prix' => 44.99,
            'stock' => 7,
            'date_publication' => '2023-07-10',
            'disponible' => true,
        ]);
    }
}
