<x-admin.layouts.app title="Admin Dashboard">
  <h1 class="font-brygada mb-6 text-4xl">Dashboard</h1>

  <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <p class="text-sm text-slate-500">Total Streams</p>
      <p class="mt-2 text-3xl font-semibold">{{ $streamsCount }}</p>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <p class="text-sm text-slate-500">Total RSVPs</p>
      <p class="mt-2 text-3xl font-semibold">{{ $streamRsvpsCount }}</p>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <p class="text-sm text-slate-500">Total Appointments</p>
      <p class="mt-2 text-3xl font-semibold">{{ $appointmentsCount }}</p>
    </div>
  </div>
</x-admin.layouts.app>