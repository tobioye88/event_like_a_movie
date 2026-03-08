<x-layout-app title="Streams: Event like a movie">
  <section class="bg-purple-700"
    style="background-image: url('{{ asset('assets/images/streams-img.jpg') }}'); background-size: cover; background-position: center;">
    <div
      class="wrapper-container min-h-screen flex flex-col items-center justify-center text-center md:items-start md:justify-center md:text-start text-white">
      <h6 class="font-brygada mb-6 text-sm font-bold uppercase">Enjoy</h6>

      <h1 class="font-brygada mb-6 text-[60px] leading-20 sm:text-[70px] md:text-[88px]">
        10% off every<br>
        new booking
      </h1>

      <p class="mb-6 text-xl md:w-[45ch]">
        It’s our way of saying Thank You! for believing in us and <br>trusting us with your specill day.
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

  <section
    class="relative before:absolute before:inset-0 before:-z-10 before:bg-[url('/src/assets/images/ribbon.jpg')] before:bg-cover before:bg-center before:opacity-20 py-24">
    <div class="wrapper-container featured-stream flex flex-col justify-center gap-8 md:gap-10">
      <div class="flex flex-col gap-4">
        <h5 class="font-brygada text-base text-black capitalize md:text-lg lg:text-2xl">
          Recent Live Streams
        </h5>

        <h2 class="text-highlight font-brygada text-3xl tracking-[2px] capitalize md:text-[36px] lg:text-[48px]">
          Top 4 Recent Streams
        </h2>
      </div>

      @if($recentStreams->isEmpty())
      <p class="text-lg text-black/70">No streams available yet. Please check back soon.</p>
      @else
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        @foreach($recentStreams as $stream)
        <a href="{{ route('streams.show', $stream) }}"
          class="group flex flex-col gap-4 border border-black/10 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
          <div class="aspect-video w-full overflow-hidden bg-black/5">
            @if($stream->thumbnail)
            <img src="{{ $stream->thumbnail }}" alt="{{ $stream->couples_name }} thumbnail"
              class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
            @else
            <div class="flex h-full w-full items-center justify-center text-sm tracking-[2px] text-black/40 uppercase">
              Stream Preview
            </div>
            @endif
          </div>

          <div class="flex flex-col gap-2">
            <h3 class="font-brygada text-2xl text-black md:text-3xl">{{ $stream->couples_name }}</h3>
            <p class="text-sm text-black/70 md:text-base">
              {{ $stream->event_date ? $stream->event_date->format('F j, Y') : 'Date to be announced' }}
            </p>
            <span
              class="inline-flex items-center gap-2 text-xs font-medium tracking-[2px] text-black/70 uppercase transition duration-300 group-hover:text-black">
              View stream
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="h-5 w-5 stroke-current"
                stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8L22 12L18 16" />
                <path d="M2 12H22" />
              </svg>
            </span>
          </div>
        </a>
        @endforeach
      </div>
      @endif
    </div>
  </section>

  <!-- Previous Streams -->
  <x-section-streams title="Previous Live Streams" />

  <!-- Appointment Section -->
  <x-section-appointment />


</x-layout-app>