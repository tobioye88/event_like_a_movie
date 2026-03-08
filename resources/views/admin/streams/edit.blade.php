<x-admin.layouts.app title="Edit Stream">
  <h1 class="font-brygada mb-6 text-4xl">Edit Stream</h1>

  <div class="rounded-xl border border-slate-200 bg-white p-6">
    <form method="POST" action="{{ route('admin.streams.update', $stream) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @include('admin.streams._form', ['stream' => $stream])
    </form>
  </div>
</x-admin.layouts.app>