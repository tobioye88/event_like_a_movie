<footer class="bg-[#150e1f] py-16">
  <div class="wrapper flex flex-col gap-8 py-12 lg:flex-row lg:items-center lg:justify-between">
    <div class="flex flex-col justify-center gap-4 text-center sm:text-start">
      <a href="/">
        <img src="{{ asset('assets/images/logo.png') }}" alt="EventLikeaMovie Logo" width="117" height="57"
          class="mx-auto mb-2 w-full max-w-24 cursor-pointer sm:mx-0 md:max-w-28" />
      </a>

      <div class="text-[15px] font-normal tracking-normal text-white md:text-base">
        <p>Premium Live Stream Event. Company for all event types</p>
      </div>
    </div>

    <div class="flex flex-col gap-8 text-center sm:flex-row sm:justify-between sm:text-start lg:gap-14">
      <div class="flex flex-col gap-4 tracking-wider text-white">
        <h2 class="font-brygada h3 font-semibold">About</h2>

        <ul class="flex flex-col gap-2 text-sm md:text-base">
          <li class="cursor-pointer">
            <a href="{{ route('about') }}" class="cursor-pointer">Our story</a>
          </li>
          <li><a href="#" class="cursor-pointer">Pricing</a></li>
          <li>
            <a href="{{ route('contact')}}" class="cursor-pointer">Contact Us</a>
          </li>
        </ul>
      </div>

      <div class="flex flex-col gap-4 tracking-wider text-white">
        <h2 class="font-brygada h3 font-semibold">Get in touch</h2>

        <ul class="flex flex-col gap-2 text-sm md:text-base">
          <li class="cursor-pointer">
            <a href="#" class="cursor-pointer">24, Floodgate street, Lagos, Nigeria.</a>
          </li>
          <li><a href="tel:2349110984650" class="cursor-pointer">+234 911 098 4650</a></li>
          <li>
            <a href="mailto:eventlikeamovie@gmail.com" class="cursor-pointer">eventlikeamovie@gmail.com</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="border-highlight/20 border-t-[0.5px] py-10">
    <div class="wrapper mt-10 flex flex-col items-center justify-between gap-4 text-center sm:flex-row md:text-start">
      <p class="text-sm font-normal text-white/80">
        Copyright © 2026 EventLikeaMovie. Powered by EventLikeaMovie.
      </p>

      <a href="https://www.instagram.com/eventlikeamovie/" class="cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-instagram-icon lucide-instagram">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
          <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
        </svg>
      </a>
    </div>
  </div>
</footer>