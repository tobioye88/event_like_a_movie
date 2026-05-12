<x-admin.layouts.app title="Admin Dashboard">
  <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <p class="text-sm text-slate-500">Total Users</p>
      <p class="mt-2 text-3xl font-semibold">{{ $usersCount }}</p>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-6">
      <p class="text-sm text-slate-500">Total Occasions</p>
      <p class="mt-2 text-3xl font-semibold">{{ $occasionsCount }}</p>
    </div>

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
