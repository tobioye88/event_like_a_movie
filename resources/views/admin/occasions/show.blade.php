<x-admin.layouts.app :title="'Occasion: ' . $occasion->title">
  <div class="mb-4 flex flex-wrap justify-end gap-2">
    <a href="{{ route('admin.occasions.edit', $occasion) }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Edit Occasion</a>
    <a href="{{ route('invites.show', $occasion) }}" target="_blank" class="rounded border border-slate-300 px-4 py-2 hover:bg-slate-100">Open Invite</a>
  </div>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <section class="rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="font-brygada text-2xl font-semibold">Overview</h2>
      <div class="mt-5 space-y-3 text-sm">
        <p><span class="font-semibold">Owner:</span> {{ $occasion->user?->name ?? 'N/A' }}</p>
        <p><span class="font-semibold">Email:</span> {{ $occasion->user?->email ?? 'N/A' }}</p>
        <p><span class="font-semibold">Title:</span> {{ $occasion->title }}</p>
        <p><span class="font-semibold">Slug:</span> {{ $occasion->slug }}</p>
        <p><span class="font-semibold">Status:</span> {{ $occasion->statusLabel() }}</p>
        <p><span class="font-semibold">Date:</span> {{ $occasion->eventAtInTimezone() }}</p>
        <p><span class="font-semibold">Timezone:</span> {{ $occasion->event_timezone }}</p>
        <p><span class="font-semibold">Location:</span> {{ $occasion->fullLocation() }}</p>
        <p><span class="font-semibold">Country:</span> {{ $occasion->location_country }}</p>
        <p><span class="font-semibold">State:</span> {{ $occasion->location_state }}</p>
        <p><span class="font-semibold">Address:</span> {{ $occasion->location_address }}</p>
        <p><span class="font-semibold">Created:</span> {{ $occasion->created_at?->format('M j, Y g:i A') }}</p>
        <p><span class="font-semibold">Updated:</span> {{ $occasion->updated_at?->format('M j, Y g:i A') }}</p>
        <p><span class="font-semibold">Invite:</span> <a href="{{ route('invites.show', $occasion) }}" class="text-primary hover:text-primary-dark" target="_blank">{{ route('invites.show', $occasion) }}</a></p>
      </div>

      <form method="POST" action="{{ route('admin.occasions.update', $occasion) }}" class="mt-6 space-y-3">
        @csrf
        @method('PUT')
        <label for="status" class="block text-sm font-medium">Publishing Status</label>
        <select id="status" name="status" class="w-full rounded border border-slate-300 px-3 py-2">
          <option value="active" @selected($occasion->status === 'active')>Published</option>
          <option value="inactive" @selected($occasion->status === 'inactive')>Draft</option>
        </select>
        <button type="submit" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Update Status</button>
      </form>

      <form method="POST" action="{{ route('admin.occasions.destroy', $occasion) }}" class="mt-4" onsubmit="return confirm('Delete this occasion?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded border border-red-300 px-4 py-2 text-red-700 hover:bg-red-50">Delete Occasion</button>
      </form>
    </section>

    <section class="rounded-xl border border-slate-200 bg-white p-6 lg:col-span-2">
      <h2 class="font-brygada text-2xl font-semibold">Invite Details</h2>
      <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">
        <div class="rounded border border-slate-200 p-4">
          <p class="text-sm font-semibold">Theme Color</p>
          <div class="mt-2 flex items-center gap-2 text-sm">
            <span class="h-8 w-8 rounded-full border border-slate-300" style="background: {{ $occasion->theme_color }}"></span>
            <span>{{ $occasion->theme_color }}</span>
          </div>
        </div>

        <div class="rounded border border-slate-200 p-4">
          <p class="text-sm font-semibold">Dress Code Colors</p>
          <div class="mt-2 flex flex-wrap gap-4 text-sm">
            <span class="inline-flex items-center gap-2"><span class="h-8 w-8 rounded-full border border-slate-300" style="background: {{ $occasion->dress_code_color_one }}"></span>{{ $occasion->dress_code_color_one_name }} ({{ $occasion->dress_code_color_one }})</span>
            <span class="inline-flex items-center gap-2"><span class="h-8 w-8 rounded-full border border-slate-300" style="background: {{ $occasion->dress_code_color_two }}"></span>{{ $occasion->dress_code_color_two_name }} ({{ $occasion->dress_code_color_two }})</span>
          </div>
        </div>

        <div class="rounded border border-slate-200 p-4 md:col-span-2">
          <p class="text-sm font-semibold">Custom Message</p>
          <p class="mt-2 whitespace-pre-line text-sm text-slate-700">{{ $occasion->custom_message ?: 'No custom message provided.' }}</p>
        </div>

        <div class="rounded border border-slate-200 p-4 md:col-span-2">
          <p class="text-sm font-semibold">Accommodation</p>
          <p class="mt-2 whitespace-pre-line text-sm text-slate-700">{{ $occasion->accommodation ?: 'No accommodation information provided.' }}</p>
        </div>

        <div class="rounded border border-slate-200 p-4">
          <p class="text-sm font-semibold">Background Image</p>
          @if($occasion->background_image)
          <img src="{{ getImageUrl($occasion->background_image) }}" alt="Occasion background image" class="mt-2 h-40 w-full rounded border object-cover">
          @else
          <p class="mt-2 text-sm text-slate-500">No background image uploaded.</p>
          @endif
        </div>

        <div class="rounded border border-slate-200 p-4">
          <p class="text-sm font-semibold">RSVP Side Image</p>
          @if($occasion->side_image)
          <img src="{{ getImageUrl($occasion->side_image) }}" alt="Occasion RSVP side image" class="mt-2 h-40 w-full rounded border object-cover">
          @else
          <p class="mt-2 text-sm text-slate-500">No RSVP side image uploaded.</p>
          @endif
        </div>
      </div>

      <hr class="my-8 border-slate-200">

      <h2 class="font-brygada text-2xl font-semibold">RSVPs</h2>
      <div class="mt-5 overflow-hidden rounded border border-slate-200">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
          <thead class="bg-slate-50">
            <tr>
              <th class="px-4 py-3 text-left font-semibold">Name</th>
              <th class="px-4 py-3 text-left font-semibold">Email</th>
              <th class="px-4 py-3 text-left font-semibold">Phone</th>
              <th class="px-4 py-3 text-left font-semibold">Response</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-200">
            @forelse($rsvps as $rsvp)
            <tr>
              <td class="px-4 py-3">{{ $rsvp->name }}</td>
              <td class="px-4 py-3">{{ $rsvp->email }}</td>
              <td class="px-4 py-3">{{ $rsvp->phone }}</td>
              <td class="px-4 py-3">{{ ucfirst($rsvp->response) }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="px-4 py-6 text-center text-slate-500">No RSVPs found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-5">{{ $rsvps->links() }}</div>
    </section>
  </div>
</x-admin.layouts.app>
