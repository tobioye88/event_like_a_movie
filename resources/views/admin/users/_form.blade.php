@php
$managedUser = $managedUser ?? null;
$cancelRoute = $managedUser ? route('admin.users.show', $managedUser) : route('admin.users.index');
@endphp

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
  <div>
    <label for="name" class="mb-1 block text-sm font-medium">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $managedUser?->name) }}" class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="email" class="mb-1 block text-sm font-medium">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $managedUser?->email) }}" class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="role" class="mb-1 block text-sm font-medium">Role</label>
    <select id="role" name="role" class="w-full rounded border border-slate-300 px-3 py-2" required>
      <option value="user" @selected(old('role', $managedUser?->role ?? 'user') === 'user')>User</option>
      <option value="admin" @selected(old('role', $managedUser?->role) === 'admin')>Admin</option>
      <option value="super_admin" @selected(old('role', $managedUser?->role) === 'super_admin')>Super Admin</option>
    </select>
  </div>

  <div>
    <label for="password" class="mb-1 block text-sm font-medium">Password</label>
    <input type="password" id="password" name="password" class="w-full rounded border border-slate-300 px-3 py-2" @required(! $managedUser)>
  </div>

  <div>
    <label for="password_confirmation" class="mb-1 block text-sm font-medium">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full rounded border border-slate-300 px-3 py-2" @required(! $managedUser)>
  </div>
</div>

<div class="mt-6 flex flex-wrap items-center gap-3">
  <button type="submit" class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Save User</button>
  <a href="{{ $cancelRoute }}" class="rounded border border-slate-300 px-4 py-2 hover:bg-slate-100">Cancel</a>
</div>
