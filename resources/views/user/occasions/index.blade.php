<x-user.layout title="Occasions">
  <x-slot:actions>
    <a href="{{ route('occasions.create') }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Create Occasion</a>
  </x-slot:actions>

  <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-4 py-3 text-left font-semibold">Occasion</th>
          <th class="px-4 py-3 text-left font-semibold">Date</th>
          <th class="px-4 py-3 text-left font-semibold">RSVPs</th>
          <th class="px-4 py-3 text-left font-semibold">Status</th>
          <th class="px-4 py-3 text-left font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($occasions as $occasion)
        <tr>
          <td class="px-4 py-3 font-medium">{{ $occasion->title }}</td>
          <td class="px-4 py-3">{{ $occasion->eventAtInTimezone() }}</td>
          <td class="px-4 py-3">{{ $occasion->rsvps_count }}</td>
          <td class="px-4 py-3">{{ $occasion->statusLabel() }}</td>
          <td class="px-4 py-3">
            <a href="{{ route('occasions.show', $occasion) }}" class="text-primary hover:text-primary-dark">Manage</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="px-4 py-8 text-center text-slate-500">No occasions yet.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-5">{{ $occasions->links() }}</div>
</x-user.layout>
