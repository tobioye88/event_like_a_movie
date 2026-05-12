<x-admin.layouts.app title="Users">
  <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
    <table class="min-w-full divide-y divide-slate-200 text-sm">
      <thead class="bg-slate-50">
        <tr>
          <th class="px-4 py-3 text-left font-semibold">Name</th>
          <th class="px-4 py-3 text-left font-semibold">Email</th>
          <th class="px-4 py-3 text-left font-semibold">Role</th>
          <th class="px-4 py-3 text-left font-semibold">Occasions</th>
          <th class="px-4 py-3 text-left font-semibold">Joined</th>
          <th class="px-4 py-3 text-left font-semibold">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-200">
        @forelse($users as $user)
        <tr>
          <td class="px-4 py-3">{{ $user->name }}</td>
          <td class="px-4 py-3">{{ $user->email }}</td>
          <td class="px-4 py-3">{{ str_replace('_', ' ', ucfirst($user->role)) }}</td>
          <td class="px-4 py-3">{{ $user->occasions_count }}</td>
          <td class="px-4 py-3">{{ $user->created_at?->format('M j, Y') }}</td>
          <td class="px-4 py-3"><a href="{{ route('admin.users.show', $user) }}" class="text-primary hover:text-primary-dark">Manage</a></td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="px-4 py-6 text-center text-slate-500">No users found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="mt-5">{{ $users->links() }}</div>
</x-admin.layouts.app>
