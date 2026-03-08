<x-admin.layouts.app title="Appointments">
  <h1 class="font-brygada mb-6 text-4xl">Appointments</h1>

  <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-4 py-3 text-left font-semibold">Name</th>
          <th class="px-4 py-3 text-left font-semibold">Email</th>
          <th class="px-4 py-3 text-left font-semibold">Phone</th>
          <th class="px-4 py-3 text-left font-semibold">Message</th>
          <th class="px-4 py-3 text-left font-semibold">Submitted</th>
          <th class="px-4 py-3 text-left font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($appointments as $appointment)
        <tr>
          <td class="px-4 py-3">{{ $appointment->name }}</td>
          <td class="px-4 py-3">{{ $appointment->email }}</td>
          <td class="px-4 py-3">{{ $appointment->phone }}</td>
          <td class="px-4 py-3">{{ \Illuminate\Support\Str::limit($appointment->message, 80) }}</td>
          <td class="px-4 py-3">{{ $appointment->created_at?->format('M j, Y g:i A') }}</td>
          <td class="px-4 py-3">
            <form method="POST" action="{{ route('admin.appointments.destroy', $appointment) }}"
              onsubmit="return confirm('Delete this appointment?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="cursor-pointer text-red-700 underline">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="px-4 py-6 text-center text-slate-500">No appointments found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-5">{{ $appointments->links() }}</div>
</x-admin.layouts.app>
