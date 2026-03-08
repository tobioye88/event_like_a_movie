<x-layout-app title="Services: Event like a movie">
  <!-- Hero  -->
  <section
    style="background-image: url('{{ asset('assets/images/services-img.jpg') }}'); background-size: cover; background-position: center;"
    class="flex h-120 flex-col items-center justify-center bg-purple-500">
    <h6 class="font-brygada mb-4 text-xs tracking-[3px] text-white uppercase md:text-sm">
      Get to know
    </h6>

    <h1 class="font-brygada text-[40px] font-medium text-white capitalize md:text-[56px] lg:text-[88px]">
      Our Services
    </h1>
  </section>
  <section>
    <div class="wrapper-container flex flex-col gap-8 lg:gap-12 py-12">
      <div class="text-center">
        <h6
          class="text-highlight font-brygada mb-4 text-xs font-medium tracking-[3px] uppercase md:text-sm lg:text-base">
          WE OFFER
        </h6>

        <h2
          class="font-brygada mb-6 text-3xl font-medium tracking-[3px] text-black md:text-3xl md:text-[36px] lg:text-4xl lg:text-[48px]">
          Boutique Media Services
        </h2>

        <p class="text-darkGray text-sm md:text-base">
          designed to make your brand better
        </p>
      </div>

      <div class="mt-8 flex flex-col gap-10 gap-y-24">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
          <img src="{{ asset('assets/images/camera-2.jpg') }}" alt="camera 2 image" width="600" height="600"
            class="w-full max-w-150 flex-1" />

          <div class="flex flex-1 flex-col gap-8 px-4 md:px-6 lg:px-8">
            <h3 class="font-brygada text-2xl font-medium tracking-normal text-black md:text-3xl">
              Event Live Stream
            </h3>

            <p class="text-darkGray text-sm md:text-base">
              Regardless of your event type, our team of seasoned
              professionals are hands on to give your guests a unique and
              engaging experience on every stream.
            </p>

            <a href="{{ route('contact') }}" class="flex w-max items-center gap-2">
              <span class="text-xs tracking-wider text-black uppercase transition-all duration-300">Book now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-black transition-all duration-300" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>
        </div>

        <div class="flex flex-col justify-between gap-4 md:flex-row-reverse md:items-center">
          <img src="{{ asset('assets/images/camera-3.jpg') }}" alt="camera 3 image" width="600" height="600"
            class="w-full max-w-150 flex-1" />

          <div class="flex flex-1 flex-col gap-8 px-4 md:px-6 lg:px-8">
            <h3 class="font-brygada text-2xl font-medium tracking-normal text-black md:text-3xl">
              Video Coverage
            </h3>

            <p class="text-darkGray text-sm md:text-base">
              We offer video coverage services for all your production
              needs. We use high-end digital video recording systems to
              assists our clients curate brand films/content that connects
              with their market and boosts intended bottomlines.
            </p>

            <a href="{{ route('contact') }}" class="flex w-max items-center gap-2">
              <span class="text-xs tracking-wider text-black uppercase transition-all duration-300">Book now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-black transition-all duration-300" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>
        </div>

        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
          <img src="{{ asset('assets/images/consult.jpg') }}" alt="consultant image" width="600" height="600"
            class="w-full max-w-150 flex-1" />

          <div class="flex flex-1 flex-col gap-8 px-4 md:px-6 lg:px-8">
            <h3 class="font-brygada text-2xl font-medium tracking-normal text-black md:text-3xl">
              Consultancy
            </h3>

            <p class="text-darkGray text-sm md:text-base">
              Are you working on that next video project? Talk to us and
              glean from our depth of experience. We help brands build
              strategy documents that boosts positive ROIs.
            </p>

            <a href="{{ route('contact') }}" class="flex w-max items-center gap-2">
              <span class="text-xs tracking-wider text-black uppercase transition-all duration-300">Book now</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                class="h-6 w-6 stroke-black transition-all duration-300" stroke-width="1" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div
    style="background-image: url('{{ asset('assets/images/camera-4.jpg') }}'); background-size: cover; background-position: center;"
    class="flex w-full flex-col items-center justify-center bg-cover bg-center text-center bg-purple-500 py-32">

    <h6 class="font-brygada mb-4 text-xs tracking-[3px] text-white uppercase md:text-sm">
      Special Offer
    </h6>

    <h2 class="font-brygada text-[40px] font-medium text-white capitalize md:text-[50px] lg:text-[60px]">
      10% Off for New Clients
    </h2>

    <p class="text-sm text-white/90 md:text-base">
      Book any of our bouquet of services and enjoy instant 15% off
    </p>
  </div>

  <!-- Appointment -->
  <x-section-appointment />
</x-layout-app>