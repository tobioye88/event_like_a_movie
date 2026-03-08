<header class="bg-linear-to-b from-black/70 to-transparent fixed top-0 w-full z-50">
  <div class="wrapper w-full px-3 md:px-0">
    <nav class="flex items-center justify-between py-8 md:py-10">
      <div class="flex items-center justify-center">
        <a href="/">
          <img src="{{ asset('assets/images/logo.png') }}" alt="EventLikeaMovie Logo" width="117" height="57"
            class="mr-20 w-full max-w-24 cursor-pointer md:max-w-28" />
        </a>

        <ul
          class="[&>li]:hover:text-highlight nav-link hidden gap-10 md:flex [&>li]:cursor-pointer [&>li]:text-[13px] [&>li]:text-[#FFFFFFB8] [&>li]:uppercase">
          <li><a href="{{  route('home') }}">Home</a></li>
          <li><a href="{{  route('about') }}">About</a></li>
          <li><a href="{{  route('services') }}">Services</a></li>
          <li><a href="{{  route('streams') }}">Streams</a></li>
          <li><a href="{{  route('contact') }}">Contact</a></li>
        </ul>
      </div>

      <!-- Social media icon: Instagram -->
      <a href="https://www.instagram.com/eventlikeamovie/" class="hidden cursor-pointer md:block">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-instagram-icon lucide-instagram">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
          <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
        </svg>
      </a>

      <div class="absolute"></div>

      <!-- Hamburger icon -->
      <div class="md:hidden" id="hamburger-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
          <path d="M4 5h16" />
          <path d="M4 12h16" />
          <path d="M4 19h16" />
        </svg>
      </div>
    </nav>
  </div>
  <!-- Mobile navigation overlay -->
  <div id="mobile-nav" class="absolute top-0 right-0 left-0 z-50 hidden bg-white text-black md:hidden">
    <div class="flex h-full w-full flex-col gap-8 bg-purple-500/60 py-8 pr-4 pl-3">
      <div class="flex items-start justify-between">
        <a href="/">
          <img src="{{ asset('assets/images/logo.png') }}" alt="EventLikeaMovie Logo" width="117" height="57"
            class="w-full max-w-24 cursor-pointer md:max-w-28" />
        </a>
        <button id="mobile-nav-close" aria-label="Close navigation" class="ml-auto translate-1.5 p-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </button>
      </div>

      <nav class="font-brygada mt-4 flex flex-col gap-6 text-base">
        <a href="{{ route('home') }}" class="mobile-nav-link text-highlight transition-colors hover:text-[#4f3ebf]">
          Home
        </a>
        <a href="{{ route('about') }}" class="mobile-nav-link transition-colors hover:text-[#4f3ebf]">
          About
        </a>
        <a href="{{ route('services') }}" class="mobile-nav-link transition-colors hover:text-[#4f3ebf]">
          Services
        </a>
        <a href="{{ route('streams') }}"
          class="mobile-nav-link flex items-center justify-between transition-colors hover:text-[#4f3ebf]">
          Streams
        </a>
        <a href="{{ route('contact') }}" class="mobile-nav-link transition-colors hover:text-[#4f3ebf]">
          Contact
        </a>
      </nav>
    </div>
  </div>
</header>