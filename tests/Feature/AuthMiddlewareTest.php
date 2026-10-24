<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login_for_protected_pages(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));

        $this->get(route('patients.index'))
            ->assertRedirect(route('login'));
    }

    public function test_login_and_registration_pages_are_available_to_guests(): void
    {
        $this->get(route('login'))->assertOk();
        $this->get(route('register'))->assertOk();
    }

    public function test_registration_creates_user_and_authenticates_them(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Aline Martin',
            'email' => 'aline@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Aline Martin',
            'email' => 'aline@example.com',
        ]);
        $this->assertTrue(Hash::check('secure-password', User::where('email', 'aline@example.com')->firstOrFail()->password));
    }

    public function test_existing_user_can_log_in(): void
    {
        $user = User::factory()->create([
            'email' => 'aline@example.com',
            'password' => Hash::make('secure-password'),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => 'aline@example.com',
            'password' => 'secure-password',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_credentials_do_not_authenticate(): void
    {
        User::factory()->create([
            'email' => 'aline@example.com',
            'password' => Hash::make('secure-password'),
        ]);

        $this->from(route('login'))
            ->post(route('login.store'), [
                'email' => 'aline@example.com',
                'password' => 'incorrect-password',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_logout_ends_the_authenticated_session(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
