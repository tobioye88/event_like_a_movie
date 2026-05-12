<x-user.layout title="Create Occasion">
  <form method="POST" action="{{ route('occasions.store') }}" enctype="multipart/form-data" class="rounded-lg border border-slate-200 bg-white p-6">
    @csrf
    @include('user.occasions._form')
  </form>
</x-user.layout>
