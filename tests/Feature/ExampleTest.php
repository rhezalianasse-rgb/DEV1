<?php

namespace Tests\Feature;

use App\Models\Medcine;
use App\Models\Patient;
use App\Models\Specialite;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ExempleMedecinsSeeder;
use Database\Seeders\MedcineSeeder;
use Database\Seeders\SpecialiteSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk()->assertViewIs('dashboard');
    }

    public function test_dashboard_shows_live_resource_counts(): void
    {
        Patient::factory()->count(2)->create();
        Medcine::factory()->create();

        $response = $this->get(route('dashboard'));

        $response->assertOk()->assertViewHas('stats', function (array $stats): bool {
            return $stats[0]['count'] === 2
                && $stats[1]['count'] === 1;
        });
    }

    public function test_livres_table_has_auteur_id_column(): void
    {
        $this->assertTrue(Schema::hasColumn('livres', 'auteur_id'));
    }

    public function test_author_list_has_a_button_back_to_dashboard(): void
    {
        $this->get(route('auteurs.index'))
            ->assertOk()
            ->assertSee('Retour au tableau de bord')
            ->assertSee(route('dashboard'));
    }

    public function test_book_list_has_a_button_back_to_dashboard(): void
    {
        $this->get(route('livres.index'))
            ->assertOk()
            ->assertSee('Retour au tableau de bord')
            ->assertSee(route('dashboard'));
    }

    public function test_medcine_seeder_creates_medecins_linked_to_specialites(): void
    {
        $this->seed([SpecialiteSeeder::class, MedcineSeeder::class]);

        $this->assertDatabaseCount('medecins', 10);
        $this->assertDatabaseHas('medecins', ['specialite_id' => 1]);
    }

    public function test_example_medecins_seeder_creates_three_idempotent_records(): void
    {
        $this->seed(SpecialiteSeeder::class);
        $this->seed(ExempleMedecinsSeeder::class);
        $this->seed(ExempleMedecinsSeeder::class);

        $this->assertDatabaseCount('medecins', 3);
        $this->assertDatabaseHas('medecins', [
            'prenom' => 'Salma',
            'nom' => 'Benali',
            'telephone' => '0600000001',
            'tarif' => 300,
        ]);
    }

    public function test_medcine_store_persists_a_valid_record(): void
    {
        $specialite = Specialite::factory()->create();

        $response = $this->post(route('medecins.store'), [
            'nom' => 'Martin',
            'prenom' => 'Aline',
            'telephone' => '0600000000',
            'tarif' => 80,
            'specialite_id' => $specialite->id,
        ]);

        $response->assertRedirect(route('medecins.index'));
        $this->assertDatabaseHas('medecins', [
            'nom' => 'Martin',
            'specialite_id' => $specialite->id,
        ]);
    }

    public function test_database_seeder_populates_application_data(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertDatabaseCount('auteurs', 6);
        $this->assertDatabaseCount('livres', 7);
        $this->assertDatabaseCount('specialites', 5);
        $this->assertDatabaseCount('medecins', 10);
        $this->assertDatabaseCount('patients', 20);
    }

    public function test_medecin_resource_pages_render(): void
    {
        $medecin = Medcine::factory()->create();

        $this->get(route('medecins.index'))
            ->assertOk()
            ->assertSee('Retour au tableau de bord');
        $this->get(route('medecins.create'))->assertOk();
        $this->get(route('medecins.show', $medecin))->assertOk();
        $this->get(route('medecins.edit', $medecin))->assertOk();
    }

    public function test_patient_resource_pages_render(): void
    {
        $patient = Patient::factory()->create();

        $this->get(route('patients.index'))->assertOk();
        $this->get(route('patients.create'))->assertOk();
        $this->get(route('patients.show', $patient))->assertOk();
        $this->get(route('patients.edit', $patient))->assertOk();
    }
}
