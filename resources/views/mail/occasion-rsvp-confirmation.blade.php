<p>Hello {{ $rsvp->name }},</p>

<p>Your RSVP for {{ $rsvp->occasion->title }} has been received.</p>

<p>Response: {{ ucfirst($rsvp->response) }}</p>

<p>You can revisit the invite here: <a href="{{ route('invites.show', $rsvp->occasion) }}">{{ route('invites.show', $rsvp->occasion) }}</a></p>
