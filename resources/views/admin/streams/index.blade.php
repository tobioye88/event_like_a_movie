<x-admin.layouts.app title="Manage Streams">
  <div class="mb-6 flex items-center justify-between">
    <h1 class="font-brygada text-4xl">Streams</h1>
    <a href="{{ route('admin.streams.create') }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">
      New Stream
    </a>
  </div>

  <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-4 py-3 text-left font-semibold">Couples</th>
          <th class="px-4 py-3 text-left font-semibold">Date</th>
          <th class="px-4 py-3 text-left font-semibold">Status</th>
          <th class="px-4 py-3 text-left font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($streams as $stream)
        <tr>
          <td class="px-4 py-3">{{ $stream->couples_name }}</td>
          <td class="px-4 py-3">{{ $stream->event_date?->format('M j, Y g:i A') ?? 'N/A' }}</td>
          <td class="px-4 py-3">
            <span class="rounded px-2 py-1 text-xs {{ $stream->status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-700' }}">
              {{ $stream->status }}
            </span>
          </td>
          <td class="px-4 py-3">
            <div class="flex items-center gap-3">
              <a href="{{ route('admin.streams.edit', $stream) }}" class="text-slate-700 underline">Edit</a>
              <form method="POST" action="{{ route('admin.streams.destroy', $stream) }}"
                onsubmit="return confirm('Delete this stream?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="cursor-pointer text-red-700 underline">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="px-4 py-6 text-center text-slate-500">No streams found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-5">{{ $streams->links() }}</div>
</x-admin.layouts.app>
