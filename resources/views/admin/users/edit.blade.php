<x-admin.layouts.app :title="'Edit User: ' . $managedUser->name">
  <form method="POST" action="{{ route('admin.users.update', $managedUser) }}" class="rounded-xl border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('admin.users._form')
  </form>
</x-admin.layouts.app>
