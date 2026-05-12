<?php

namespace Tests\Feature;

use App\Mail\OccasionRsvpConfirmation;
use App\Models\Occasion;
use App\Models\OccasionRsvp;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserOccasionFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_create_occasion(): void
    {
        $this->post('/register', [
            'name' => 'Tobi',
            'email' => 'tobi@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticated();

        $this->post(route('occasions.store'), $this->occasionPayload([
            'title' => 'Birthday Dinner',
        ]))->assertRedirect();

        $this->assertDatabaseHas('occasions', [
            'title' => 'Birthday Dinner',
            'slug' => 'birthday-dinner',
            'event_timezone' => 'Africa/Lagos',
            'location_country' => 'Nigeria',
            'location_state' => 'Lagos',
            'location_address' => 'Lagos Hall',
            'dress_code_color_one_name' => 'Black',
            'dress_code_color_two_name' => 'White',
            'status' => 'active',
        ]);
    }

    public function test_user_can_save_occasion_as_draft(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('occasions.store'), $this->occasionPayload([
                'title' => 'Draft Dinner',
                'status_action' => 'draft',
            ]))
            ->assertRedirect();

        $this->assertDatabaseHas('occasions', [
            'title' => 'Draft Dinner',
            'status' => 'inactive',
        ]);
    }

    public function test_user_can_only_manage_own_occasions(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $occasion = $this->createOccasion($owner);

        $this->actingAs($otherUser)
            ->get(route('occasions.show', $occasion))
            ->assertForbidden();
    }

    public function test_guest_details_are_hidden_until_rsvp_and_confirmation_email_is_sent(): void
    {
        Mail::fake();

        $occasion = $this->createOccasion(User::factory()->create(), [
            'title' => 'Private Supper',
            'location' => '12 Party Road, Lagos, Nigeria',
            'location_country' => 'Nigeria',
            'location_state' => 'Lagos',
            'location_address' => '12 Party Road',
            'custom_message' => 'Bring your dancing shoes.',
            'dress_code_color_one_name' => 'Emerald',
            'dress_code_color_two_name' => 'Gold',
        ]);

        $this->get(route('invites.show', $occasion))
            ->assertOk()
            ->assertSee('Private Supper')
            ->assertDontSee('12 Party Road')
            ->assertDontSee('Bring your dancing shoes.');

        $this->post(route('invites.rsvp.store', $occasion), [
            'name' => 'Guest One',
            'email' => 'guest@example.com',
            'phone' => '08012345678',
            'response' => 'yes',
            'note' => 'Excited',
        ])->assertRedirect(route('invites.show', $occasion));

        $this->assertDatabaseHas('occasion_rsvps', [
            'occasion_id' => $occasion->id,
            'email' => 'guest@example.com',
            'response' => 'yes',
        ]);

        Mail::assertSent(OccasionRsvpConfirmation::class);

        $this->withCookie('occasion_rsvp_' . $occasion->id, '1')
            ->get(route('invites.show', $occasion))
            ->assertOk()
            ->assertSee('12 Party Road')
            ->assertSee('Bring your dancing shoes.')
            ->assertSee('Emerald')
            ->assertSee('Gold');
    }

    public function test_duplicate_guest_email_updates_existing_rsvp(): void
    {
        Mail::fake();

        $occasion = $this->createOccasion(User::factory()->create());

        $payload = [
            'name' => 'Guest One',
            'email' => 'guest@example.com',
            'phone' => '08012345678',
            'response' => 'yes',
            'note' => null,
        ];

        $this->post(route('invites.rsvp.store', $occasion), $payload);
        $this->post(route('invites.rsvp.store', $occasion), array_merge($payload, [
            'response' => 'maybe',
        ]));

        $this->assertSame(1, OccasionRsvp::where('occasion_id', $occasion->id)->where('email', 'guest@example.com')->count());
        $this->assertDatabaseHas('occasion_rsvps', [
            'occasion_id' => $occasion->id,
            'email' => 'guest@example.com',
            'response' => 'maybe',
        ]);
    }

    public function test_user_can_delete_account_and_cascade_occasions(): void
    {
        $user = User::factory()->create();
        $occasion = $this->createOccasion($user);
        OccasionRsvp::create([
            'occasion_id' => $occasion->id,
            'name' => 'Guest One',
            'email' => 'guest@example.com',
            'phone' => '08012345678',
            'response' => 'yes',
        ]);

        $this->actingAs($user)
            ->delete(route('account.destroy'), ['password' => 'password'])
            ->assertRedirect(route('home'));

        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        $this->assertDatabaseMissing('occasions', ['id' => $occasion->id]);
        $this->assertDatabaseMissing('occasion_rsvps', ['email' => 'guest@example.com']);
    }

    private function occasionPayload(array $overrides = []): array
    {
        return array_merge([
            'title' => 'Wedding Party',
            'theme_color' => '#9b007e',
            'event_at' => '2026-06-20 18:30:00',
            'event_timezone' => 'Africa/Lagos',
            'location_country' => 'Nigeria',
            'location_state' => 'Lagos',
            'location_address' => 'Lagos Hall',
            'accommodation' => 'Nearby hotels are available.',
            'dress_code_color_one' => '#000000',
            'dress_code_color_one_name' => 'Black',
            'dress_code_color_two' => '#ffffff',
            'dress_code_color_two_name' => 'White',
            'custom_message' => 'We cannot wait to celebrate with you.',
            'status_action' => 'publish',
        ], $overrides);
    }

    private function createOccasion(User $user, array $overrides = []): Occasion
    {
        $payload = $this->occasionPayload();
        $payload['status'] = $payload['status_action'] === 'publish' ? 'active' : 'inactive';
        $payload['event_at'] = \Illuminate\Support\Carbon::parse($payload['event_at'], $payload['event_timezone'])->utc();
        $payload['location'] = implode(', ', [
            $payload['location_address'],
            $payload['location_state'],
            $payload['location_country'],
        ]);
        unset($payload['status_action']);

        return Occasion::create(array_merge($payload, [
            'user_id' => $user->id,
            'slug' => fake()->unique()->slug(),
        ], $overrides));
    }
}
