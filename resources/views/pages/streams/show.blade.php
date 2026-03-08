<x-layout-app title="Contact us: Event like a movie">
  <x-slot:meta>
    <meta name="description"
      content="Contact us for more information about our wedding live streaming services, pricing, and availability. We're here to help you make your special day unforgettable with our high-quality live streaming solutions.">
    <meta name="keywords" content="contact, wedding live streaming, pricing, availability,
    wedding streaming services, live stream contact, wedding video streaming, event streaming contact">
  </x-slot:meta>
  <!-- Hero  -->
  <section class="bg-purple-700"
    style="background-image: url('{{ $stream->metadata?->background_image ? getImageUrl($stream->metadata?->background_image) : asset('assets/images/bg-homepage-hero.jpg') }}'); background-size: cover; background-position: center;">
    <div
      class="wrapper-container min-h-screen flex flex-col items-center justify-center text-center md:items-start md:justify-center md:text-start text-white">
      <h6 class="font-brygada mb-6 text-sm font-bold uppercase">{{ $stream->intro }}</h6>

      <h1 class="font-brygada mb-6 text-[60px] leading-20 sm:text-[70px] md:text-[88px]">
        {{ $stream->couples_name }}
      </h1>

      <p class="mb-6 text-xl md:w-[45ch]">
        {{ $stream->quote }}
      </p>

      <div class="border-t border-white my-6 w-1/2"></div>
      <div class="">
        {{ $stream->event_date->format('F j, Y') }}
      </div>


    </div>
  </section>

  <section class="py-24">
    <div class="wrapper-container">
      <iframe src="{{ $stream->stream_url }}" width="600" height="450" style="border: 0" allowfullscreen=""
        loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="h-125 w-full"></iframe>
    </div>
    <div class="wrapper-container mt-8">
      <h3 class="font-brygada text-center text-3xl font-medium text-black mb-4">
        Stream Details
      </h3>
      <p class="text-center text-lg text-black/70 max-w-3xl mx-auto">{{ $stream->description }}</p>
    </div>
  </section>

  <section class="py-24 bg-gray-100">
    <div class="wrapper-container mt-8">
      <h2 class="font-brygada text-center text-2xl font-medium text-black md:text-3xl lg:text-6xl mb-12">
        Our Love Story
      </h2>
      <p class="text-center text-lg text-black/70 max-w-3xl mx-auto">{!! nl2br($stream->love_story) !!}</p>
    </div>
  </section>

  @if ($stream->gallery && count($stream->gallery) > 0)
  <section class="py-24">
    <div class="wrapper-container">
      <h2 class="font-brygada text-center text-2xl font-medium text-black md:text-3xl lg:text-6xl mb-12">
        Our Gallery
      </h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($stream->gallery as $image)
        <img class="w-full rounded-lg" src="{{ getImageUrl($image) }}" alt="galleryImages">
        @endforeach
      </div>
      <hr class="border-darkGray/20 my-16 max-w-full border-t" />
    </div>
  </section>
  @endif

  @if($stream->event_date->isFuture() && !request()->cookie('rsvp_stream_' . $stream->id))
  <!-- RSVP form -->
  <section class="py-24">
    <div class="wrapper-container">
      <h2 class="font-brygada text-center text-2xl font-medium text-black md:text-3xl lg:text-6xl mb-12">
        RSVP
      </h2>
      <form action="{{ route('streams.rsvp.store') }}" method="POST" class="mx-auto max-w-lg flex flex-col gap-6">
        @csrf
        <input type="hidden" name="stream_id" value="{{ $stream->id }}">
        <div class="flex flex-col gap-3 text-black">
          <label for="name" class="text-sm font-medium capitalize md:text-base">Name: <span
              class="text-red-400">*</span></label>
          <input type="text" name="name" id="name" class="w-full border border-black p-3" />
        </div>
        <div class="flex flex-col gap-3 text-black">
          <label for="email" class="text-sm font-medium capitalize md:text-base">Email: <span
              class="text-red-400">*</span></label>
          <input type="email" name="email" id="email" class="w-full border border-black p-3" />
        </div>
        <div class="flex flex-col gap-3 text-black">
          <label for="Phone" class="text-sm font-medium capitalize md:text-base">Phone: <span
              class="text-red-400">*</span></label>
          <input type="number" name="phone" id="phone" class="w-full border border-black p-3" />
        </div>
        <div class="flex flex-col gap-3 text-black">
          <div class="text-sm font-medium capitalize md:text-base">Attendance Type: <span class="text-red-400">*</span>
          </div>
          <label for="Phone" class="flex items-center gap-2 text-black">
            <input type="radio" value="virtual" name="attendance_type" id="attendance_type_virtual" />
            <span>Virtual</span>
          </label>
          <label for="Phone" class="flex items-center gap-2 text-black">
            <input type="radio" value="physical" name="attendance_type" id="attendance_type_physical" />
            <span>In Person</span>
          </label>
        </div>
        <div class="">
          <label class="text-sm font-medium capitalize md:text-base">Can you make it? <span
              class="text-red-400">*</span></label>
          <ul id="wpforms-1055-field_2">
            <li class="choice-1 depth-1">
              <input type="radio" id="wpforms-1055-field_2_1" name="attending" value="yes"><label
                class="wpforms-field-label-inline" for="wpforms-1055-field_2_1">Yes</label>
            </li>
            <li class="choice-2 depth-1">
              <input type="radio" id="wpforms-1055-field_2_2" name="attending" value="no">
              <label class="wpforms-field-label-inline" for="wpforms-1055-field_2_2">No</label>
            </li>
            <li class="choice-3 depth-1">
              <input type="radio" id="wpforms-1055-field_2_3" name="attending" value="maybe">
              <label class="wpforms-field-label-inline" for="wpforms-1055-field_2_3">Not sure</label>
            </li>
          </ul>
        </div>
        <div class="flex flex-col gap-3 text-black">
          <label for="message" class="text-sm font-medium capitalize md:text-base">Well wishes: <span
              class="text-red-400">*</span></label>
          <textarea name="well_wishes" id="message" cols="4" class="w-full border border-black p-3"></textarea>
          <p class="text-darkGray text-sm">Say something nice to the couples</p>
        </div>

        <button
          class="group mr-auto flex cursor-pointer items-center justify-center gap-4 border bg-[#150e1f] px-8 py-4 transition-all duration-300 ease-in-out hover:border-[#150e1f] hover:bg-transparent">
          <span
            class="text-[12px] font-medium tracking-[2px] text-white uppercase transition-colors duration-300 group-hover:text-[#150e1f]">
            Submit
          </span>

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
            class="h-6 w-6 stroke-white transition-all duration-300 group-hover:stroke-black" stroke-width="1"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8L22 12L18 16" />
            <path d="M2 12H22" />
          </svg>
        </button>
      </form>
    </div>
  </section>
  @else
  <!-- Thank you for Attending -->
  <section>

  </section>
  @endif




</x-layout-app>