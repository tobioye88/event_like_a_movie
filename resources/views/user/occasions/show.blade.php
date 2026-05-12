<x-user.layout :title="$occasion->title">
  <x-slot:actions>
    <div class="flex flex-wrap gap-2">
      <a href="{{ route('invites.show', $occasion) }}" target="_blank" class="rounded border border-slate-300 px-4 py-2 hover:bg-slate-100">Open Invite</a>
      <a href="{{ route('occasions.edit', $occasion) }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Edit</a>
    </div>
  </x-slot:actions>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <section class="rounded-lg border border-slate-200 bg-white p-6 lg:col-span-1">
      <p class="text-sm text-slate-500">Invite Link</p>
      <input readonly value="{{ route('invites.show', $occasion) }}" class="mt-2 w-full rounded border border-slate-300 px-3 py-2 text-sm">
      <div class="mt-5 space-y-3 text-sm">
        <p><span class="font-semibold">Date:</span> {{ $occasion->eventAtInTimezone() }}</p>
        <p><span class="font-semibold">Location:</span> {{ $occasion->fullLocation() }}</p>
        <p><span class="font-semibold">Status:</span> {{ $occasion->statusLabel() }}</p>
        <p><span class="font-semibold">RSVPs:</span> {{ $occasion->rsvps_count }}</p>
      </div>
      <form method="POST" action="{{ route('occasions.destroy', $occasion) }}" class="mt-6" onsubmit="return confirm('Delete this occasion?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded border border-red-300 px-4 py-2 text-red-700 hover:bg-red-50">Delete Occasion</button>
      </form>
    </section>

    <section class="rounded-lg border border-slate-200 bg-white p-6 lg:col-span-2">
      <h2 class="mb-4 font-brygada text-2xl font-semibold">RSVPs</h2>
      <div class="overflow-hidden rounded border border-slate-200">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
          <thead class="bg-slate-50">
            <tr>
              <th class="px-4 py-3 text-left font-semibold">Name</th>
              <th class="px-4 py-3 text-left font-semibold">Email</th>
              <th class="px-4 py-3 text-left font-semibold">Phone</th>
              <th class="px-4 py-3 text-left font-semibold">Response</th>
              <th class="px-4 py-3 text-left font-semibold">Submitted</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-200">
            @forelse($rsvps as $rsvp)
            <tr>
              <td class="px-4 py-3">{{ $rsvp->name }}</td>
              <td class="px-4 py-3">{{ $rsvp->email }}</td>
              <td class="px-4 py-3">{{ $rsvp->phone }}</td>
              <td class="px-4 py-3">{{ ucfirst($rsvp->response) }}</td>
              <td class="px-4 py-3">{{ $rsvp->created_at->format('M j, Y g:i A') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="px-4 py-8 text-center text-slate-500">No RSVPs yet.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-5">{{ $rsvps->links() }}</div>
    </section>
  </div>
</x-user.layout>
