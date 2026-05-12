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
  <script defer src="{{ asset('assets/js/app.js') }}?v={{ config('app.static.version') }}"></script>
  @endif
  <script defer src="{{ asset('assets/js/main.js') }}?v={{ config('app.static.version') }}"></script>
</head>

<body class="bg-slate-100 text-slate-900">
  <main class="flex">
    <div x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row">
      <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
      <a class="sr-only" href="#main-content">skip to the main content</a>

      <!-- dark overlay for when the sidebar is open on smaller screens  -->
      <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden"
        aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>

      <x-admin.side-nav />

      <!-- main content  -->
      <div id="main-content" class="h-svh w-full overflow-y-auto p-4 bg-surface dark:bg-surface-dark">
        <!-- Add main content here  -->

        <div>
          <header class="border-b border-slate-200 bg-white mb-4">
            <div class="mx-auto flex w-full items-center justify-between px-4 py-4">
              <p class="text-2xl">{{ $title }}</p>
              {{-- <nav class="flex items-center gap-4 text-sm">
                <a href="{{ route('admin.streams.index') }}" class="hover:text-highlight">Streams</a>
                <a href="{{ route('admin.stream-rsvps.index') }}" class="hover:text-highlight">RSVPs</a>
                <a href="{{ route('admin.appointments.index') }}" class="hover:text-highlight">Appointments</a>
                <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <button type="submit"
                    class="cursor-pointer rounded border border-slate-300 px-3 py-1 hover:bg-slate-100">
                    Logout
                  </button>
                </form>
              </nav> --}}
            </div>
          </header>
          <div>
            @if(session('success'))
            <div class="mb-6 rounded border border-emerald-200 bg-emerald-50 p-3 text-emerald-800">{{ session('success')
              }}
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
          </div>

          {{ $slot }}
        </div>
      </div>

      <!-- toggle button for small screen  -->
      <button x-cloak
        class="fixed right-4 top-4 z-20 rounded-full bg-primary p-4 md:hidden text-on-primary dark:bg-primary-dark dark:text-on-primary-dark"
        x-on:click="showSidebar = ! showSidebar">
        <svg x-show="showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
          class="size-5" aria-hidden="true">
          <path
            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
        </svg>
        <svg x-show="! showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
          class="size-5" aria-hidden="true">
          <path
            d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z" />
        </svg>
        <span class="sr-only">sidebar toggle</span>
      </button>
    </div>
  </main>
</body>

</html>