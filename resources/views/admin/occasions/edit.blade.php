<x-admin.layouts.app :title="'Edit Occasion: ' . $occasion->title">
  <form method="POST" action="{{ route('admin.occasions.update', $occasion) }}" enctype="multipart/form-data" class="rounded-xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')

    <div class="mb-6">
      <label for="user_id" class="mb-1 block text-sm font-medium">Owner</label>
      <select id="user_id" name="user_id" class="w-full rounded border border-slate-300 px-3 py-2" required>
        @foreach($users as $user)
        <option value="{{ $user->id }}" @selected((int) old('user_id', $occasion->user_id) === $user->id)>
          {{ $user->name }} - {{ $user->email }}
        </option>
        @endforeach
      </select>
    </div>

    @include('user.occasions._form', ['cancelRoute' => route('admin.occasions.show', $occasion)])
  </form>

  <section class="mt-6 rounded-xl border border-slate-200 bg-white p-6">
    <h2 class="font-brygada text-2xl font-semibold">Manage Images</h2>
    <div class="mt-5 grid grid-cols-1 gap-6 md:grid-cols-2">
      <div>
        <p class="text-sm font-semibold">Background Image</p>
        @if($occasion->background_image)
        <img src="{{ getImageUrl($occasion->background_image) }}" alt="Occasion background image" class="mt-2 h-40 w-full rounded border object-cover">
        <form method="POST" action="{{ route('admin.occasions.images.destroy', [$occasion, 'background']) }}" class="mt-3" onsubmit="return confirm('Remove the background image?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="rounded border border-red-300 px-4 py-2 text-red-700 hover:bg-red-50">Remove Background</button>
        </form>
        @else
        <p class="mt-2 text-sm text-slate-500">No background image uploaded.</p>
        @endif
      </div>

      <div>
        <p class="text-sm font-semibold">RSVP Side Image</p>
        @if($occasion->side_image)
        <img src="{{ getImageUrl($occasion->side_image) }}" alt="Occasion RSVP side image" class="mt-2 h-40 w-full rounded border object-cover">
        <form method="POST" action="{{ route('admin.occasions.images.destroy', [$occasion, 'side']) }}" class="mt-3" onsubmit="return confirm('Remove the RSVP side image?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="rounded border border-red-300 px-4 py-2 text-red-700 hover:bg-red-50">Remove RSVP Image</button>
        </form>
        @else
        <p class="mt-2 text-sm text-slate-500">No RSVP side image uploaded.</p>
        @endif
      </div>
    </div>
  </section>
</x-admin.layouts.app>
