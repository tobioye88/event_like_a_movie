<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Admin' }}</title>
  @if(app()->isLocal())
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ config('app.static.version') }}">
  {{-- <script defer src="{{ asset('assets/js/app.js') }}?v={{ config('app.static.version') }}"></script> --}}
  @endif
  <script defer src="{{ asset('assets/js/main.js') }}?v={{ config('app.static.version') }}"></script>
</head>

<body class="bg-slate-50 text-slate-900">
  <header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-4">
      <a href="{{ route('admin.dashboard') }}" class="font-brygada text-2xl font-semibold">Admin Panel</a>
      <nav class="flex items-center gap-4 text-sm">
        <a href="{{ route('admin.streams.index') }}" class="hover:text-highlight">Streams</a>
        <a href="{{ route('admin.stream-rsvps.index') }}" class="hover:text-highlight">RSVPs</a>
        <a href="{{ route('admin.appointments.index') }}" class="hover:text-highlight">Appointments</a>
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit" class="cursor-pointer rounded border border-slate-300 px-3 py-1 hover:bg-slate-100">
            Logout
          </button>
        </form>
      </nav>
    </div>
  </header>

  <main class="mx-auto w-full max-w-7xl px-4 py-8">
    @if(session('success'))
    <div class="mb-6 rounded border border-emerald-200 bg-emerald-50 p-3 text-emerald-800">{{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 rounded border border-red-200 bg-red-50 p-3 text-red-800">{{ session('error') }}</div>
    @endif

    @if($errors->any())
    <div class="mb-6 rounded border border-red-200 bg-red-50 p-3 text-red-800">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    {{ $slot }}
  </main>
</body>

</html>