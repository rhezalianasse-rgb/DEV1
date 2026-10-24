<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_cannot_view_user_information(): void
    {
        config(['app.admin_email' => 'admin@example.com']);

        $this->actingAs(User::factory()->create(['email' => 'user@example.com']))
            ->get(route('admin.users.index'))
            ->assertForbidden();
    }

    public function test_configured_admin_can_view_safe_user_information(): void
    {
        config(['app.admin_email' => 'admin@example.com']);
        $admin = User::factory()->create(['email' => 'admin@example.com']);
        $user = User::factory()->create([
            'name' => 'Aline Martin',
            'email' => 'aline@example.com',
            'password' => 'private-password',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.users.index'))
            ->assertOk()
            ->assertSee('Aline Martin')
            ->assertSee('aline@example.com')
            ->assertDontSee('private-password')
            ->assertSee('Utilisateurs');

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertDontSee(route('admin.users.index'));
    }

    public function test_no_admin_is_allowed_when_admin_email_is_not_configured(): void
    {
        config(['app.admin_email' => null]);

        $this->actingAs(User::factory()->create(['email' => 'admin@example.com']))
            ->get(route('admin.users.index'))
            ->assertForbidden();
    }

    public function test_admin_email_match_is_case_insensitive(): void
    {
        config(['app.admin_email' => 'ADMIN@example.com']);

        $this->actingAs(User::factory()->create(['email' => 'admin@example.com']))
            ->get(route('admin.users.index'))
            ->assertOk();
    }
}
