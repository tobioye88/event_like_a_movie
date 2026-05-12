<x-admin.layouts.app title="Stream RSVPs">
  {{-- <h1 class="font-brygada mb-6 text-4xl">Stream RSVPs</h1> --}}

  <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-4 py-3 text-left font-semibold">Stream</th>
          <th class="px-4 py-3 text-left font-semibold">Name</th>
          <th class="px-4 py-3 text-left font-semibold">Email</th>
          <th class="px-4 py-3 text-left font-semibold">Attendance Type</th>
          <th class="px-4 py-3 text-left font-semibold">Attending</th>
          <th class="px-4 py-3 text-left font-semibold">Submitted</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($rsvps as $rsvp)
        <tr>
          <td class="px-4 py-3">{{ $rsvp->stream?->couples_name ?? 'N/A' }}</td>
          <td class="px-4 py-3">{{ $rsvp->name }}</td>
          <td class="px-4 py-3">{{ $rsvp->email }}</td>
          <td class="px-4 py-3">{{ ucfirst($rsvp->attendance_type) }}</td>
          <td class="px-4 py-3">{{ ucfirst($rsvp->attending) }}</td>
          <td class="px-4 py-3">{{ $rsvp->created_at?->format('M j, Y g:i A') }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="px-4 py-6 text-center text-slate-500">No RSVPs found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-5">{{ $rsvps->links() }}</div>
</x-admin.layouts.app>