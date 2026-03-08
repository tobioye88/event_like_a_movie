@props(['title', 'mainBackground' => 'assets/images/helipad_bg.jpg', 'meta' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? config('app.name', 'Event Like a Movie') }}</title>

  <!-- Icons -->
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  <link href='https://cdn.boxicons.com/fonts/transformations.min.css' rel='stylesheet'>
  <!-- favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Meta -->
  @yield('meta', $meta)

  <!-- Scripts -->
  @if(app()->isLocal())
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ config('app.static.version') }}">
  {{-- <script defer src="{{ asset('assets/js/app.js') }}?v={{ config('app.static.version') }}"></script> --}}
  @endif
  <script defer src="{{ asset('assets/js/main.js') }}?v={{ config('app.static.version') }}"></script>
</head>

<body class="font-sans antialiased relative" x-data="app">

  {{-- <div class="min-h-screen relative z-10"> --}}
    @include('layouts.navigation')
    <x-alert />

    <!-- Page Content -->
    <main>
      @yield('contents', $slot)
    </main>
    {{--
  </div> --}}
  <x-site-footer />
</body>

</html>