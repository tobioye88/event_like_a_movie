@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title }} - {{ config('app.name', 'Event Like A Movie') }}</title>
  @if(app()->isLocal())
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ config('app.static.version') }}">
  <script defer src="{{ asset('assets/js/app.js') }}?v={{ config('app.static.version') }}"></script>
  @endif
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">
  <header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
      <a href="{{ route('dashboard') }}" class="font-brygada text-2xl font-semibold">My Occasions</a>
      <nav class="flex flex-wrap items-center gap-3 text-sm">
        <a href="{{ route('dashboard') }}" class="hover:text-primary">Dashboard</a>
        <a href="{{ route('occasions.index') }}" class="hover:text-primary">Occasions</a>
        <a href="{{ route('account.edit') }}" class="hover:text-primary">Account</a>
        @if(auth()->user()?->isAdmin())
        <a href="{{ route('admin.dashboard') }}" class="hover:text-primary">Admin</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="rounded border border-slate-300 px-3 py-1 hover:bg-slate-100">Logout</button>
        </form>
      </nav>
    </div>
  </header>

  <main class="mx-auto max-w-6xl px-4 py-8">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
      <div>
        <p class="text-sm text-slate-500">Signed in as {{ auth()->user()->name }}</p>
        <h1 class="font-brygada text-3xl font-semibold">{{ $title }}</h1>
      </div>
      {{ $actions ?? '' }}
    </div>

    @if(session('success'))
    <div class="mb-6 rounded border border-emerald-200 bg-emerald-50 p-3 text-emerald-800">{{ session('success') }}</div>
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
