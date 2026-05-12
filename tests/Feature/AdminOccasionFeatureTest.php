<?php

namespace Tests\Feature;

use App\Models\Occasion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    public function test_admin_can_view_all_details_edit_occasion_and_manage_images(): void
    {
        Storage::fake('public');

        $admin = User::factory()->admin()->create();
        $user = User::factory()->create();
        $occasion = $this->createOccasion($user);
        $occasion->update([
            'accommodation' => 'Use the hotel block.',
            'custom_message' => 'Welcome to the celebration.',
            'location_country' => 'Nigeria',
            'location_state' => 'Lagos',
            'location_address' => '14 Marina Road',
            'dress_code_color_one_name' => 'Black',
            'dress_code_color_two_name' => 'Gold',
            'background_image' => '/storage/occasions/backgrounds/original.jpg',
        ]);

        Storage::disk('public')->put('occasions/backgrounds/original.jpg', 'old-image');

        $this->actingAs($admin)
            ->get(route('admin.occasions.show', $occasion))
            ->assertOk()
            ->assertSee('Use the hotel block.')
            ->assertSee('Welcome to the celebration.')
            ->assertSee('Black')
            ->assertSee('Gold')
            ->assertSee('Background Image');

        $this->actingAs($admin)
            ->get(route('admin.occasions.edit', $occasion))
            ->assertOk()
            ->assertSee('Manage Images');

        $this->actingAs($admin)
            ->put(route('admin.occasions.update', $occasion), [
                'user_id' => $user->id,
                'title' => 'Updated Community Dinner',
                'theme_color' => '#123456',
                'event_at' => '2026-09-01 17:00:00',
                'event_timezone' => 'Africa/Lagos',
                'location_country' => 'Nigeria',
                'location_state' => 'Abuja',
                'location_address' => '22 Central Road',
                'accommodation' => 'Updated hotel details.',
                'dress_code_color_one' => '#111111',
                'dress_code_color_one_name' => 'Ebony',
                'dress_code_color_two' => '#facc15',
                'dress_code_color_two_name' => 'Gold',
                'custom_message' => 'Updated message.',
                'status_action' => 'draft',
                'side_image' => UploadedFile::fake()->image('side.jpg'),
            ])
            ->assertRedirect(route('admin.occasions.show', $occasion));

        $this->assertDatabaseHas('occasions', [
            'id' => $occasion->id,
            'title' => 'Updated Community Dinner',
            'location' => '22 Central Road, Abuja, Nigeria',
            'status' => 'inactive',
        ]);

        $occasion->refresh();
        $this->assertStringStartsWith('/storage/occasions/side-images/', $occasion->side_image);

        $this->actingAs($admin)
            ->delete(route('admin.occasions.images.destroy', [$occasion, 'background']))
            ->assertRedirect();

        $this->assertNull($occasion->refresh()->background_image);
        Storage::disk('public')->assertMissing('occasions/backgrounds/original.jpg');
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

    public function test_admin_can_create_and_edit_user(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('admin.users.create'))
            ->assertOk()
            ->assertSee('Create User');

        $this->actingAs($admin)
            ->post(route('admin.users.store'), [
                'name' => 'New Client',
                'email' => 'client@example.com',
                'role' => 'user',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
            ->assertRedirect();

        $user = User::where('email', 'client@example.com')->firstOrFail();

        $this->actingAs($admin)
            ->get(route('admin.users.edit', $user))
            ->assertOk()
            ->assertSee('Edit User');

        $this->actingAs($admin)
            ->put(route('admin.users.update', $user), [
                'name' => 'Updated Client',
                'email' => 'updated-client@example.com',
                'role' => 'user',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Client',
            'email' => 'updated-client@example.com',
        ]);
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
