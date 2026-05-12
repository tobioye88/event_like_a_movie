<?php

namespace Tests\Feature;

use App\Models\Occasion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOccasionFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_regular_user_cannot_access_admin_area(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_can_monitor_and_deactivate_occasions(): void
    {
        $admin = User::factory()->admin()->create();
        $user = User::factory()->create();
        $occasion = $this->createOccasion($user);

        $this->actingAs($admin)
            ->get(route('admin.occasions.show', $occasion))
            ->assertOk()
            ->assertSee($occasion->title)
            ->assertSee($user->email);

        $this->actingAs($admin)
            ->put(route('admin.occasions.update', $occasion), ['status' => 'inactive'])
            ->assertRedirect();

        $this->assertDatabaseHas('occasions', [
            'id' => $occasion->id,
            'status' => 'inactive',
        ]);
    }

    public function test_admin_can_create_occasion_on_behalf_of_user(): void
    {
        $admin = User::factory()->admin()->create();
        $user = User::factory()->create();

        $this->actingAs($admin)
            ->get(route('admin.occasions.create'))
            ->assertOk()
            ->assertSee($user->email);

        $this->actingAs($admin)
            ->post(route('admin.occasions.store'), [
                'user_id' => $user->id,
                'title' => 'Client Gala',
                'theme_color' => '#9b007e',
                'event_at' => '2026-08-12 20:00:00',
                'event_timezone' => 'America/New_York',
                'location_country' => 'Nigeria',
                'location_state' => 'Lagos',
                'location_address' => '14 Marina Road',
                'accommodation' => 'Guest rooms nearby.',
                'dress_code_color_one' => '#111111',
                'dress_code_color_one_name' => 'Black',
                'dress_code_color_two' => '#f8fafc',
                'dress_code_color_two_name' => 'Pearl',
                'custom_message' => 'Created by support.',
                'status_action' => 'publish',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('occasions', [
            'user_id' => $user->id,
            'title' => 'Client Gala',
            'event_timezone' => 'America/New_York',
            'location' => '14 Marina Road, Lagos, Nigeria',
            'status' => 'active',
        ]);

        $occasion = Occasion::where('title', 'Client Gala')->firstOrFail();
        $this->assertSame('2026-08-13 00:00:00', $occasion->event_at->format('Y-m-d H:i:s'));
    }

    public function test_admin_can_manage_user_role_but_not_delete_self(): void
    {
        $admin = User::factory()->admin()->create();
        $user = User::factory()->create();

        $this->actingAs($admin)
            ->put(route('admin.users.update', $user), [
                'name' => 'Support Admin',
                'email' => $user->email,
                'role' => 'admin',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'role' => 'admin',
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.users.destroy', $admin))
            ->assertSessionHasErrors();
    }

    private function createOccasion(User $user): Occasion
    {
        return Occasion::create([
            'user_id' => $user->id,
            'title' => 'Community Dinner',
            'slug' => fake()->unique()->slug(),
            'theme_color' => '#9b007e',
            'event_at' => now()->addMonth(),
            'event_timezone' => 'UTC',
            'location' => 'Lagos Hall',
            'dress_code_color_one' => '#000000',
            'dress_code_color_two' => '#ffffff',
            'status' => 'active',
        ]);
    }
}
