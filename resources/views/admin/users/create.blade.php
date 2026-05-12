<x-admin.layouts.app title="Create User">
  <form method="POST" action="{{ route('admin.users.store') }}" class="rounded-xl border border-slate-200 bg-white p-6">
    @csrf
    @include('admin.users._form')
  </form>
</x-admin.layouts.app>
