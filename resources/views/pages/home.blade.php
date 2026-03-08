<x-layout-app>
  <!-- Hero  -->
  <section class="bg-purple-700"
    style="background-image: url('{{ asset('assets/images/bg-homepage-hero.jpg') }}'); background-size: cover; background-position: center;">
    <div
      class="wrapper-container min-h-screen flex flex-col items-center justify-center text-center md:items-start md:justify-center md:text-start text-white">
      <h6 class="font-brygada mb-6 text-sm font-bold uppercase">Welcome</h6>

      <h1 class="font-brygada mb-6 w-[10ch] text-[60px] leading-20 sm:text-[70px] md:text-[88px]">
        HD Event Live Stream
      </h1>

      <p class="mb-6 text-xl md:w-[45ch]">
        Give your guests a front-row experience at every event, even while
        viewing from the comfort of their home.
      </p>

      <a href="{{ route('contact') }}"
        class="hover:border-whites hero-button group mx-auto mr-auto flex cursor-pointer items-center justify-center gap-4 border bg-white px-8 py-4 transition-all duration-300 ease-in-out hover:bg-transparent md:mx-0">
        <span
          class="text-[12px] font-medium tracking-[2px] text-black uppercase transition-colors duration-300 group-hover:text-white">
          Make a booking
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
          class="h-6 w-6 stroke-black transition-all duration-300 group-hover:stroke-white" stroke-width="1"
          stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 8L22 12L18 16" />
          <path d="M2 12H22" />
        </svg>
      </a>
    </div>
  </section>

  <!-- Experience  -->
  <section class="py-8 md:py-24">
    <div class="wrapper-container min-h-screen">
      <h6 class="text-highlight font-brygada text-center h5 font-medium tracking-[3px] uppercase mb-8">
        Experience
      </h6>

      <h2 class="font-brygada text-center text-2xl font-medium text-black md:text-3xl lg:text-6xl mb-12">
        Live Stream on Steroids
      </h2>

      <div class="aspect-video w-full mb-8">
        <iframe class="h-full w-full" src="https://www.youtube.com/embed/391DG3ZgTK4" title="YouTube video player"
          frameborder="0" allow="
              accelerometer;
              autoplay;
              clipboard-write;
              encrypted-media;
              gyroscope;
              picture-in-picture;
            " allowfullscreen>
        </iframe>
      </div>

      <div class="grid grid-cols-1 gap-8 text-black max-md:text-center md:grid-cols-3">
        <div class="flex flex-col gap-4">
          <svg aria-hidden="true" class="fill-highlight h-6 w-6 max-md:mx-auto" viewBox="0 0 640 512"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z">
            </path>
          </svg>

          <h4 class="font-brygada text-xl font-medium md:text-2xl">
            Consult
          </h4>

          <p class="text-darkGray text-sm md:text-base">
            Our goal is to understand your unique event requirements, to
            provide bespoke wireless live stream services for you and your
            guests.
          </p>
        </div>

        <div class="flex flex-col gap-4">
          <svg aria-hidden="true" class="fill-highlight h-6 w-6 max-md:mx-auto" viewBox="0 0 576 512"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M384 64H192C86 64 0 150 0 256s86 192 192 192h192c106 0 192-86 192-192S490 64 384 64zm0 320c-70.8 0-128-57.3-128-128 0-70.8 57.3-128 128-128 70.8 0 128 57.3 128 128 0 70.8-57.3 128-128 128z">
            </path>
          </svg>

          <h4 class="font-brygada font-medium md:text-2xl">Activate</h4>

          <p class="text-darkGray text-sm md:text-base">
            We deploy the latest technology to ensure you get value for money,
            and are hands on for a seamless event experience.
          </p>
        </div>

        <div class="flex flex-col gap-4">
          <svg aria-hidden="true" class="fill-highlight h-6 w-6 max-md:mx-auto" viewBox="0 0 512 512"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16 128h416c8.84 0 16-7.16 16-16V48c0-8.84-7.16-16-16-16H16C7.16 32 0 39.16 0 48v64c0 8.84 7.16 16 16 16zm480 80H80c-8.84 0-16 7.16-16 16v64c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-64c0-8.84-7.16-16-16-16zm-64 176H16c-8.84 0-16 7.16-16 16v64c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-64c0-8.84-7.16-16-16-16z">
            </path>
          </svg>

          <h4 class="font-brygada text-xl font-medium md:text-2xl">Stream</h4>

          <p class="text-darkGray text-sm md:text-base">
            Your guests will enjoy a premium audio/visual experience, watching
            from any location in the world.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- How we work   -->
  <section class="relative">
    <div class="absolute inset-0 bg-[#e6f0ee] lg:left-auto lg:w-1/2 lg:rounded-l-[100px]" aria-hidden="true"></div>
    <div class="wrapper-container min-h-screen relative flex flex-col max-sm:gap-10 md:gap-6 lg:flex-row pt-32">
      <div class="flex flex-col gap-5">
        <h2 class="font-brygada text-2xl font-semibold text-black capitalize md:text-3xl lg:text-6xl">
          How we work
        </h2>

        <p class="text-darkGray text-[15px] md:text-base">
          We are a premium HD Livestream experience company that caters to
          your online streaming needs.
        </p>

        <a href="/contact.html"
          class="group mr-auto mb-4 flex cursor-pointer items-center justify-center gap-4 border bg-[#150e1f] px-8 py-4 transition-all duration-300 ease-in-out hover:border-[#150e1f] hover:bg-transparent">
          <span
            class="text-[12px] font-medium tracking-[2px] text-white uppercase transition-colors duration-300 group-hover:text-[#150e1f]">
            Book Now
          </span>

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
            class="h-6 w-6 stroke-white transition-all duration-300 group-hover:stroke-black" stroke-width="1"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8L22 12L18 16" />
            <path d="M2 12H22" />
          </svg>
        </a>
      </div>

      <div class="items-start justify-center gap-4 md:flex md:gap-6">
        <img class="h-auto w-full rounded-3xl object-cover md:w-1/2 lg:w-87.5"
          src="{{ asset('assets/images/work.jpg') }}" width="500" height="500" alt="How we work" />

        <div>
          <div class="border-darkGray/25 mt-8 mb-12 w-full border-[0.2px] md:mt-0"></div>

          <div class="flex flex-col gap-4">
            <h6 class="text-highlight text-[12px] font-medium">01</h6>

            <h4 class="font-brygada text-2xl font-medium text-black md:text-[26px]">
              Custom Made Website
            </h4>

            <p class="text-darkGray text-sm md:text-base">
              We create a custom webpage, which you can share with guests, to
              view pictures and experience your event countdown.
            </p>
          </div>

          <div class="border-darkGray/25 my-12 w-full border-[0.2px]"></div>

          <div class="flex flex-col gap-4">
            <h6 class="text-highlight text-[12px] font-medium">02</h6>

            <h4 class="font-brygada text-2xl font-medium text-black md:text-[26px]">
              RSVP and Invite
            </h4>

            <p class="text-darkGray text-sm md:text-base">
              Your guests RSVP and will receive an event streaming link, which
              grants them access to watch your event ceremony
            </p>
          </div>

          <div class="border-darkGray/25 my-12 w-full border-[0.2px]"></div>

          <div class="flex flex-col gap-4">
            <h6 class="text-highlight text-[12px] font-medium">03</h6>

            <h4 class="font-brygada text-2xl font-medium text-black md:text-[26px]">
              Click to Enter
            </h4>

            <p class="text-darkGray text-sm md:text-base">
              On your big day, guests simply have to click on the links sent
              via webmail and enjoy premium front row viewing of your event.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured streams  -->
  <section class="relative bg-[#6d645b] bg-[url({{ asset('assets/images/featured.jpg') }})] bg-cover bg-center pt-24">
    <div class="wrapper-container min-h-screen">
      <div class="flex w-full flex-col gap-14">
        <div class="text-center text-white">
          <h6 class="font-brygada text-[13px] tracking-[3px] text-white uppercase md:text-sm mb-8">
            Have a Look at Our
          </h6>

          <h2 class="font-brygada text-2xl font-medium text-white md:text-4xl lg:text-6xl mb-8">
            Featured Streams
          </h2>

          <p class="text-sm text-white/70 md:text-base mb-8">
            and relive moments from your special day
          </p>
        </div>

        <div class="grid w-full grid-cols-1 md:grid-cols-2">
          <div class="flex w-full flex-col gap-4 border border-white/20 p-9 text-white">
            <h6 class="font-brygada mb-5 text-xs md:text-sm">01.</h6>

            <h3 class="font-brygada text-2xl md:text-3xl lg:text-4xl">
              Bimbo & Temi Ceremony
            </h3>

            <p class="text-sm text-white/80 md:text-base">
              Watch the live stream of Bimbo & Temi
            </p>

            <div class="aspect-video w-full">
              <iframe class="h-full w-full"
                src="https://www.youtube.com/embed/jXcPV8oiVI0?controls=1&rel=0&playsinline=0&modestbranding=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Feventlikeamovie.ng&widgetid=3&forigin=https%3A%2F%2Feventlikeamovie.ng%2F&aoriginsup=1&gporigin=https%3A%2F%2Feventlikeamovie.ng%2Fcontact%2F&vf=1"
                title="YouTube video player" frameborder="0" allow="
                    accelerometer;
                    autoplay;
                    clipboard-write;
                    encrypted-media;
                    gyroscope;
                    picture-in-picture;
                  " allowfullscreen>
              </iframe>
            </div>

            <a href="/contact.html" class="group flex items-center gap-2">
              <span
                class="text-xs tracking-wider text-white/80 uppercase transition-all duration-300 group-hover:text-white">Book
                yours now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-white/80 transition-all duration-300 group-hover:stroke-white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>

          <div class="flex w-full flex-col gap-4 border border-white/20 p-9 text-white">
            <h6 class="font-brygada mb-5 text-xs md:text-sm">02.</h6>

            <h3 class="font-brygada text-2xl md:text-3xl lg:text-4xl">
              Dara & Tosin Ceremony
            </h3>

            <p class="text-sm text-white/80 md:text-base">
              Watch the live stream of Dara & Tosin
            </p>

            <div class="aspect-video w-full">
              <iframe class="h-full w-full"
                src="https://www.youtube.com/embed/x-yD-Dyqxro?controls=1&rel=0&playsinline=0&modestbranding=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Feventlikeamovie.ng&widgetid=5&forigin=https%3A%2F%2Feventlikeamovie.ng%2F&aoriginsup=1&gporigin=https%3A%2F%2Feventlikeamovie.ng%2Fcontact%2F&vf=1"
                title="YouTube video player" frameborder="0" allow="
                    accelerometer;
                    autoplay;
                    clipboard-write;
                    encrypted-media;
                    gyroscope;
                    picture-in-picture;
                  " allowfullscreen>
              </iframe>
            </div>

            <a href="/contact.html" class="group flex items-center gap-2">
              <span
                class="text-xs tracking-wider text-white/80 uppercase transition-all duration-300 group-hover:text-white">Book
                yours now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-white/80 transition-all duration-300 group-hover:stroke-white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>

          <div class="flex w-full flex-col gap-4 border border-white/20 p-9 text-white">
            <h6 class="font-brygada mb-5 text-xs md:text-sm">03.</h6>

            <h3 class="font-brygada text-2xl md:text-3xl lg:text-4xl">
              Dayo & Tosin Ceremony
            </h3>

            <p class="text-sm text-white/80 md:text-base">
              Watch the live stream of Dara & Tosin
            </p>

            <div class="aspect-video w-full">
              <iframe class="h-full w-full"
                src="https://www.youtube.com/embed/_zytuXi13_8?controls=1&rel=0&playsinline=0&modestbranding=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Feventlikeamovie.ng&widgetid=7&forigin=https%3A%2F%2Feventlikeamovie.ng%2F&aoriginsup=1&gporigin=https%3A%2F%2Feventlikeamovie.ng%2Fcontact%2F&vf=1"
                title="YouTube video player" frameborder="0" allow="
                    accelerometer;
                    autoplay;
                    clipboard-write;
                    encrypted-media;
                    gyroscope;
                    picture-in-picture;
                  " allowfullscreen>
              </iframe>
            </div>

            <a href="/contact.html" class="group flex items-center gap-2">
              <span
                class="text-xs tracking-wider text-white/80 uppercase transition-all duration-300 group-hover:text-white">Book
                yours now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-white/80 transition-all duration-300 group-hover:stroke-white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>

          <div class="flex w-full flex-col gap-4 border border-white/20 p-9 text-white">
            <h6 class="font-brygada mb-5 text-xs md:text-sm">04.</h6>

            <h3 class="font-brygada text-2xl md:text-3xl lg:text-4xl">
              Gbemi & Chuka Wedding
            </h3>

            <p class="text-sm text-white/80 md:text-base">
              Watch the live stream of Gbemi & Chuka
            </p>

            <div class="aspect-video w-full">
              <iframe class="h-full w-full"
                src="https://www.youtube.com/embed/kO8brPO9Fow?controls=1&rel=0&playsinline=0&modestbranding=0&cc_load_policy=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Feventlikeamovie.ng&widgetid=9&forigin=https%3A%2F%2Feventlikeamovie.ng%2F&aoriginsup=1&gporigin=https%3A%2F%2Feventlikeamovie.ng%2Fcontact%2F&vf=1"
                title="YouTube video player" frameborder="0" allow="
                    accelerometer;
                    autoplay;
                    clipboard-write;
                    encrypted-media;
                    gyroscope;
                    picture-in-picture;
                  " allowfullscreen>
              </iframe>
            </div>

            <a href="/contact.html" class="group flex items-center gap-2">
              <span
                class="text-xs tracking-wider text-white/80 uppercase transition-all duration-300 group-hover:text-white">Book
                yours now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-white/80 transition-all duration-300 group-hover:stroke-white" stroke-width="1"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Appointment -->
  <x-section-appointment />
</x-layout-app>