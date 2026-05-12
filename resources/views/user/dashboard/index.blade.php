<x-user.layout title="Dashboard">
  <x-slot:actions>
    <a href="{{ route('occasions.create') }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Create Occasion</a>
  </x-slot:actions>

  <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <div class="rounded-lg border border-slate-200 bg-white p-5">
      <p class="text-sm text-slate-500">Total Occasions</p>
      <p class="mt-2 text-3xl font-semibold">{{ auth()->user()->occasions()->count() }}</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5">
      <p class="text-sm text-slate-500">Total RSVPs</p>
      <p class="mt-2 text-3xl font-semibold">{{ auth()->user()->occasions()->withCount('rsvps')->get()->sum('rsvps_count') }}</p>
    </div>
    <div class="rounded-lg border border-slate-200 bg-white p-5">
      <p class="text-sm text-slate-500">Published Invites</p>
      <p class="mt-2 text-3xl font-semibold">{{ auth()->user()->occasions()->where('status', 'active')->count() }}</p>
    </div>
  </div>

  <section class="mt-8">
    <div class="mb-4 flex items-center justify-between">
      <h2 class="font-brygada text-2xl font-semibold">Recent Occasions</h2>
      <a href="{{ route('occasions.index') }}" class="text-sm text-primary hover:text-primary-dark">View all</a>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
      @forelse($occasions as $occasion)
      <a href="{{ route('occasions.show', $occasion) }}" class="rounded-lg border border-slate-200 bg-white p-5 hover:shadow-md">
        <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">{{ $occasion->statusLabel() }}</p>
        <h3 class="mt-2 text-xl font-semibold">{{ $occasion->title }}</h3>
        <p class="mt-1 text-sm text-slate-600">{{ $occasion->eventAtInTimezone() }}</p>
        <p class="mt-3 text-sm">{{ $occasion->rsvps_count }} RSVP{{ $occasion->rsvps_count === 1 ? '' : 's' }}</p>
      </a>
      @empty
      <div class="rounded-lg border border-dashed border-slate-300 bg-white p-8 text-center md:col-span-2">
        <p class="text-slate-600">Create your first occasion to get a shareable RSVP invite.</p>
      </div>
      @endforelse
    </div>
  </section>
</x-user.layout>
