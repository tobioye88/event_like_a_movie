<x-admin.layouts.app title="Create Stream">
  <h1 class="font-brygada mb-6 text-4xl">Create Stream</h1>

  <div class="rounded-xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.streams.store') }}" enctype="multipart/form-data">
      @csrf
      @include('admin.streams._form')
    </form>
  </div>
</x-admin.layouts.app>