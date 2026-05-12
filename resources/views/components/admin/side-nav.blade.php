<nav x-cloak
  class="fixed left-0 top-0 z-30 flex h-screen w-64 flex-col bg-slate-950 text-slate-300 border-r border-slate-800 transition-transform duration-300 md:translate-x-0 md:relative md:shrink-0"
  x-bind:class="showSidebar ? 'translate-x-0 shadow-2xl shadow-slate-900/50' : '-translate-x-full'"
  aria-label="sidebar navigation">

  <!-- Header / Logo -->
  <div class="px-6 py-6 border-b border-slate-800/80 flex items-center justify-between">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-white group">
      <div
        class="bg-indigo-500 rounded-lg p-1.5 shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition-transform">
        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
          </path>
        </svg>
      </div>
      <span class="font-brygada text-2xl font-bold tracking-tight">Admin<span
          class="text-indigo-400">Panel</span></span>
    </a>
    <button @click="showSidebar = false" class="md:hidden text-slate-400 hover:text-white">
      <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Search -->
  <div class="px-4 py-5">
    <div class="relative group">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
        class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500 transition-colors group-focus-within:text-indigo-400">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
      </svg>
      <input type="search"
        class="w-full rounded-xl bg-slate-900 border border-slate-700/50 py-2.5 pl-10 pr-4 text-sm text-slate-200 placeholder:text-slate-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all shadow-inner"
        name="search" placeholder="Search..." />
    </div>
  </div>

  <!-- Navigation Links -->
  <div
    class="flex-1 overflow-y-auto px-3 py-2 space-y-1 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-transparent">

    <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-2">Menu</p>

    <a href="{{ route('admin.dashboard') }}"
      class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium transition-all hover:bg-indigo-500/10 hover:text-indigo-300 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-500/10 text-indigo-400' : 'text-slate-300' }}">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="w-5 h-5 transition-colors {{ request()->routeIs('admin.dashboard') ? 'text-indigo-400' : 'text-slate-500 group-hover:text-indigo-300' }}">
          <path
            d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z" />
        </svg>
        <span>Dashboard</span>
      </div>
      @if(request()->routeIs('admin.dashboard'))
      <div class="w-1.5 h-6 bg-indigo-500 rounded-full shadow-[0_0_8px_rgba(99,102,241,0.8)]"></div>
      @endif
    </a>

    <a href="{{ route('admin.streams.index') }}"
      class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium transition-all hover:bg-pink-500/10 hover:text-pink-300 {{ request()->routeIs('admin.streams.*') ? 'bg-pink-500/10 text-pink-400' : 'text-slate-300' }}">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="w-5 h-5 transition-colors {{ request()->routeIs('admin.streams.*') ? 'text-pink-400' : 'text-slate-500 group-hover:text-pink-300' }}">
          <path
            d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
        </svg>
        <span>Streams</span>
      </div>
      @if(request()->routeIs('admin.streams.*'))
      <div class="w-1.5 h-6 bg-pink-500 rounded-full shadow-[0_0_8px_rgba(236,72,153,0.8)]"></div>
      @endif
    </a>

    <a href="{{ route('admin.stream-rsvps.index') }}"
      class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium transition-all hover:bg-emerald-500/10 hover:text-emerald-300 {{ request()->routeIs('admin.stream-rsvps.*') ? 'bg-emerald-500/10 text-emerald-400' : 'text-slate-300' }}">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="w-5 h-5 transition-colors {{ request()->routeIs('admin.stream-rsvps.*') ? 'text-emerald-400' : 'text-slate-500 group-hover:text-emerald-300' }}">
          <path fill-rule="evenodd"
            d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 0 0 1.33 0l1.713-3.293a.783.783 0 0 1 .642-.413 41.102 41.102 0 0 0 3.55-.414c1.437-.231 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0 0 10 2ZM6.75 6a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Zm0 2.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"
            clip-rule="evenodd" />
        </svg>
        <span>Stream RSVPs</span>
      </div>
      @if(request()->routeIs('admin.stream-rsvps.*'))
      <div class="w-1.5 h-6 bg-emerald-500 rounded-full shadow-[0_0_8px_rgba(16,185,129,0.8)]"></div>
      @endif
    </a>

    <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2 mt-6">Management</p>

    <a href="{{ route('admin.users.index') }}"
      class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium transition-all hover:bg-blue-500/10 hover:text-blue-300 {{ request()->routeIs('admin.users.*') ? 'bg-blue-500/10 text-blue-400' : 'text-slate-300' }}">
      <div class="flex items-center gap-3">
        <svg
          class="w-5 h-5 transition-colors {{ request()->routeIs('admin.users.*') ? 'text-blue-400' : 'text-slate-500 group-hover:text-blue-300' }}"
          fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span>Users</span>
      </div>
      @if(request()->routeIs('admin.users.*'))
      <div class="w-1.5 h-6 bg-blue-500 rounded-full shadow-[0_0_8px_rgba(59,130,246,0.8)]"></div>
      @endif
    </a>

    <a href="{{ route('admin.occasions.index') }}"
      class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium transition-all hover:bg-purple-500/10 hover:text-purple-300 {{ request()->routeIs('admin.occasions.*') ? 'bg-purple-500/10 text-purple-400' : 'text-slate-300' }}">
      <div class="flex items-center gap-3">
        <svg
          class="w-5 h-5 transition-colors {{ request()->routeIs('admin.occasions.*') ? 'text-purple-400' : 'text-slate-500 group-hover:text-purple-300' }}"
          fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <span>Occasions</span>
      </div>
      @if(request()->routeIs('admin.occasions.*'))
      <div class="w-1.5 h-6 bg-purple-500 rounded-full shadow-[0_0_8px_rgba(168,85,247,0.8)]"></div>
      @endif
    </a>

    <a href="{{ route('admin.appointments.index') }}"
      class="group flex items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium transition-all hover:bg-orange-500/10 hover:text-orange-300 {{ request()->routeIs('admin.appointments.*') ? 'bg-orange-500/10 text-orange-400' : 'text-slate-300' }}">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          class="w-5 h-5 transition-colors {{ request()->routeIs('admin.appointments.*') ? 'text-orange-400' : 'text-slate-500 group-hover:text-orange-300' }}">
          <path fill-rule="evenodd"
            d="M10 2a6 6 0 0 0-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 0 0 .515 1.076 32.91 32.91 0 0 0 3.256.508 3.5 3.5 0 0 0 6.972 0 32.903 32.903 0 0 0 3.256-.508.75.75 0 0 0 .515-1.076A11.448 11.448 0 0 1 16 8a6 6 0 0 0-6-6ZM8.05 14.943a33.54 33.54 0 0 0 3.9 0 2 2 0 0 1-3.9 0Z"
            clip-rule="evenodd" />
        </svg>
        <span>Appointments</span>
      </div>
      @if(request()->routeIs('admin.appointments.*'))
      <div class="w-1.5 h-6 bg-orange-500 rounded-full shadow-[0_0_8px_rgba(249,115,22,0.8)]"></div>
      @endif
    </a>

    <a href="#"
      class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-300 transition-all hover:bg-slate-800 hover:text-white">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        class="w-5 h-5 text-slate-500 transition-colors group-hover:text-slate-300">
        <path fill-rule="evenodd"
          d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
          clip-rule="evenodd" />
      </svg>
      <span>Settings</span>
    </a>
  </div>

  <!-- Profile Menu & Logout -->
  <div class="px-4 py-4 border-t border-slate-800">
    <div x-data="{ menuIsOpen: false }" class="relative" @keydown.esc.window="menuIsOpen = false">
      <button type="button"
        class="flex w-full items-center gap-3 rounded-xl p-2 text-left transition-colors hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        :class="menuIsOpen ? 'bg-slate-800' : ''" @click="menuIsOpen = !menuIsOpen" :aria-expanded="menuIsOpen">
        <div class="relative">
          <img
            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()?->name ?? 'Admin') }}&background=6366f1&color=fff"
            class="h-10 w-10 rounded-full object-cover ring-2 ring-slate-800" alt="avatar" />
          <div class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-emerald-500 ring-2 ring-slate-950"></div>
        </div>
        <div class="flex flex-col flex-1 min-w-0">
          <span class="text-sm font-semibold text-white truncate">{{ auth()->user()?->name ?? 'Administrator' }}</span>
          <span class="text-xs text-slate-400 truncate">{{ auth()->user()?->email ?? 'admin@system.com' }}</span>
        </div>
        <svg class="h-5 w-5 text-slate-500 transition-transform duration-200"
          :class="menuIsOpen ? 'rotate-180 text-white' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
      </button>

      <!-- Dropdown Menu -->
      <div x-cloak x-show="menuIsOpen" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1" @click.outside="menuIsOpen = false"
        class="absolute bottom-full left-0 z-50 mb-2 w-full rounded-xl border border-slate-700 bg-slate-800 py-2 shadow-xl shadow-black/50">

        <div class="px-4 py-2 border-b border-slate-700/50 mb-2">
          <p class="text-xs text-slate-400">Signed in as</p>
          <p class="text-sm font-medium text-white truncate">{{ auth()->user()?->email }}</p>
        </div>

        <a href="#"
          class="flex items-center gap-2 px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">
          <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          Your Profile
        </a>

        <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
          @csrf
          <button type="submit"
            class="flex w-full items-center gap-2 px-4 py-2 text-sm text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Sign out
          </button>
        </form>
      </div>
    </div>
  </div>
</nav>