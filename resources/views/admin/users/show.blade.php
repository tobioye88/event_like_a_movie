<x-admin.layouts.app :title="'User: ' . $managedUser->name">
  <div class="mb-4 flex justify-end">
    <a href="{{ route('admin.users.edit', $managedUser) }}" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Edit User</a>
  </div>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <section class="rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="font-brygada text-2xl font-semibold">Account</h2>
      <form method="POST" action="{{ route('admin.users.update', $managedUser) }}" class="mt-5 space-y-4">
        @csrf
        @method('PUT')
        <div>
          <label for="name" class="mb-1 block text-sm font-medium">Name</label>
          <input type="text" id="name" name="name" value="{{ old('name', $managedUser->name) }}" class="w-full rounded border border-slate-300 px-3 py-2" required>
        </div>
        <div>
          <label for="email" class="mb-1 block text-sm font-medium">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email', $managedUser->email) }}" class="w-full rounded border border-slate-300 px-3 py-2" required>
        </div>
        <div>
          <label for="role" class="mb-1 block text-sm font-medium">Role</label>
          <select id="role" name="role" class="w-full rounded border border-slate-300 px-3 py-2" required>
            <option value="user" @selected(old('role', $managedUser->role) === 'user')>User</option>
            <option value="admin" @selected(old('role', $managedUser->role) === 'admin')>Admin</option>
            <option value="super_admin" @selected(old('role', $managedUser->role) === 'super_admin')>Super Admin</option>
          </select>
        </div>
        <button type="submit" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Save User</button>
      </form>

      @if(auth()->id() !== $managedUser->id)
      <form method="POST" action="{{ route('admin.users.destroy', $managedUser) }}" class="mt-4" onsubmit="return confirm('Delete this user?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded border border-red-300 px-4 py-2 text-red-700 hover:bg-red-50">Delete User</button>
      </form>
      @endif
    </section>

    <section class="rounded-xl border border-slate-200 bg-white p-6 lg:col-span-2">
      <h2 class="font-brygada text-2xl font-semibold">Occasions</h2>
      <div class="mt-5 overflow-hidden rounded border border-slate-200">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
          <thead class="bg-slate-50">
            <tr>
              <th class="px-4 py-3 text-left font-semibold">Title</th>
              <th class="px-4 py-3 text-left font-semibold">Status</th>
              <th class="px-4 py-3 text-left font-semibold">RSVPs</th>
              <th class="px-4 py-3 text-left font-semibold">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-200">
            @forelse($occasions as $occasion)
            <tr>
              <td class="px-4 py-3">{{ $occasion->title }}</td>
              <td class="px-4 py-3">{{ $occasion->statusLabel() }}</td>
              <td class="px-4 py-3">{{ $occasion->rsvps_count }}</td>
              <td class="px-4 py-3"><a href="{{ route('admin.occasions.show', $occasion) }}" class="text-primary hover:text-primary-dark">Review</a></td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="px-4 py-6 text-center text-slate-500">No occasions found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-5">{{ $occasions->links() }}</div>
    </section>
  </div>
</x-admin.layouts.app>
