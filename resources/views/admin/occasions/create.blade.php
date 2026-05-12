<x-admin.layouts.app title="Create Occasion">
  <form method="POST" action="{{ route('admin.occasions.store') }}" enctype="multipart/form-data" class="rounded-xl border border-slate-200 bg-white p-6">
    @csrf

    <div class="mb-6">
      <label for="user_id" class="mb-1 block text-sm font-medium">Create For User</label>
      <select id="user_id" name="user_id" class="w-full rounded border border-slate-300 px-3 py-2" required>
        <option value="">Select a user</option>
        @foreach($users as $user)
        <option value="{{ $user->id }}" @selected((int) old('user_id') === $user->id)>
          {{ $user->name }} - {{ $user->email }}
        </option>
        @endforeach
      </select>
    </div>

    @include('user.occasions._form', ['cancelRoute' => route('admin.occasions.index')])
  </form>
</x-admin.layouts.app>
