<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOccasionRsvpRequest;
use App\Mail\OccasionRsvpConfirmation;
use App\Models\Occasion;
use App\Models\OccasionRsvp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class GuestInviteController extends Controller
{
    public function show(Occasion $occasion): View
    {
        abort_unless($occasion->status === 'active', 404);

        return view('invites.show', [
            'occasion' => $occasion,
            'hasRsvped' => request()->cookie($this->cookieName($occasion)) === '1',
        ]);
    }

    public function rsvp(StoreOccasionRsvpRequest $request, Occasion $occasion): RedirectResponse
    {
        abort_unless($occasion->status === 'active', 404);

        $validated = $request->validated();
        $validated['email'] = strtolower($validated['email']);

        $rsvp = OccasionRsvp::updateOrCreate(
            [
                'occasion_id' => $occasion->id,
                'email' => $validated['email'],
            ],
            [
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'response' => $validated['response'],
                'note' => $validated['note'] ?? null,
                'guest_count' => $validated['guest_count'] ?? 0,
                'guest_names' => array_filter($validated['guest_names'] ?? []),
            ],
        );

        Mail::to($rsvp->email)->send(new OccasionRsvpConfirmation($rsvp->load('occasion')));

        return redirect()
            ->route('invites.show', $occasion)
            ->withCookie(cookie()->forever($this->cookieName($occasion), '1'))
            ->with('success', 'Thank you. Your RSVP has been confirmed.');
    }

    private function cookieName(Occasion $occasion): string
    {
        return 'occasion_rsvp_' . $occasion->id;
    }
}
