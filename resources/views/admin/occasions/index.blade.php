<x-admin.layouts.app title="Occasions">
  <div class="mb-4 flex justify-end">
    <a href="{{ route('admin.occasions.create') }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Create Occasion</a>
  </div>

  <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-4 py-3 text-left font-semibold">Occasion</th>
          <th class="px-4 py-3 text-left font-semibold">Owner</th>
          <th class="px-4 py-3 text-left font-semibold">Date</th>
          <th class="px-4 py-3 text-left font-semibold">RSVPs</th>
          <th class="px-4 py-3 text-left font-semibold">Status</th>
          <th class="px-4 py-3 text-left font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($occasions as $occasion)
        <tr>
          <td class="px-4 py-3">{{ $occasion->title }}</td>
          <td class="px-4 py-3">{{ $occasion->user?->name ?? 'N/A' }}</td>
          <td class="px-4 py-3">{{ $occasion->eventAtInTimezone() }}</td>
          <td class="px-4 py-3">{{ $occasion->rsvps_count }}</td>
          <td class="px-4 py-3">{{ $occasion->statusLabel() }}</td>
          <td class="px-4 py-3"><a href="{{ route('admin.occasions.show', $occasion) }}" class="text-primary hover:text-primary-dark">Review</a></td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="px-4 py-6 text-center text-slate-500">No occasions found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="mt-5">{{ $occasions->links() }}</div>
</x-admin.layouts.app>
