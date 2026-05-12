<x-user.layout title="Edit Occasion">
  <form method="POST" action="{{ route('occasions.update', $occasion) }}" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6">
    @csrf
    @method('PUT')
    @include('user.occasions._form')
  </form>
</x-user.layout>
