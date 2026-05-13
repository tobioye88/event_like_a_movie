<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $occasion->title }} - Invitation</title>
  @if(app()->isLocal())
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ config('app.static.version') }}">
  @endif
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    .font-serif {
      font-family: 'Playfair Display', serif;
    }

    .glass-panel {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }

    .dark-glass-panel {
      background: rgba(15, 23, 42, 0.7);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
    }
  </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased selection:bg-rose-200 selection:text-rose-900">
  <main class="relative min-h-screen w-full flex flex-col md:flex-row">

    <!-- Hero Image Section (Left on Desktop, Top on Mobile) -->
    <div class="relative w-full min-h-[80vh] md:w-1/2 md:fixed md:top-0 md:left-0 md:h-screen md:min-h-screen">
      <div class="absolute inset-0 block md:hidden bg-gradient-to-t from-slate-900/50 to-transparent z-10"></div>
      <img
        src="{{ $occasion->background_image ? getImageUrl($occasion->background_image) : asset('assets/images/bg-homepage-hero.jpg') }}"
        alt="{{ $occasion->title }}" class="w-full h-full object-cover absolute inset-0">

      <div class="absolute inset-0 bg-black/10 md:bg-black/20 mix-blend-multiply"></div>

      <div class="absolute inset-0 z-20 flex flex-col justify-end p-8 md:p-16">
        <div
          class="p-6 md:p-10 rounded-2xl border border-white/10 shadow-2xl transition duration-500 hover:bg-slate-900/80">
          <p class="text-xs md:text-sm font-semibold uppercase tracking-[0.2em] mb-4 text-white test-shadow-lg">
            >
            You are cordially invited
          </p>
          <h1 class="font-serif text-4xl lg:text-6xl lg:text-7xl font-bold leading-tight text-white mb-6">
            {{ $occasion->title }}
          </h1>
          <div class="flex items-center gap-4 text-white/80">
            <div class="w-12 h-[1px] bg-white/40"></div>
            <p class="text-lg md:text-xl font-light">Hosted by {{ $occasion->user->name }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Section (Right on Desktop, Bottom on Mobile) -->
    <div class="w-full md:w-1/2 md:ml-auto min-h-screen bg-slate-50 relative z-30">
      <div class="max-w-2xl mx-auto px-6 py-12 md:px-12 md:py-20 lg:py-24">

        @if(session('success'))
        <div
          class="mb-10 rounded-xl border border-emerald-200 bg-emerald-50 p-6 flex items-start gap-4 shadow-sm animate-fade-in-up">
          <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <div>
            <h3 class="text-emerald-800 font-medium text-lg">Thank you!</h3>
            <p class="text-emerald-700 mt-1">{{ session('success') }}</p>
          </div>
        </div>
        @endif

        <div class="space-y-12 animate-fade-in-up">
          <div class="text-center md:text-left">
            <h2 class="font-serif text-3xl md:text-4xl text-slate-900 mb-4">Event Details</h2>
            <div class="h-1 w-24 mx-auto md:mx-0 rounded-full"
              style="background-color: {{ $occasion->theme_color ?? '#334155' }}"></div>
          </div>

          <!-- Details Grid -->
          <div class="grid grid-cols-1 gap-8">
            <!-- Time -->
            <div
              class="flex flex-col md:flex-row gap-4 p-6 rounded-2xl bg-white shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
              <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0"
                style="background-color: {{ $occasion->theme_color ?? '#e2e8f0' }}20">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"
                  style="color: {{ $occasion->theme_color ?? '#475569' }}">
                  <circle cx="12" cy="12" r="10"></circle>
                  <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-1">When</h3>
                <p class="text-lg md:text-xl font-medium text-slate-800">{{ $occasion->eventAtInTimezone() }}</p>
              </div>
            </div>

            <!-- Location -->
            <div
              class="flex flex-col md:flex-row gap-4 p-6 rounded-2xl bg-white shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
              <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0"
                style="background-color: {{ $occasion->theme_color ?? '#e2e8f0' }}20">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"
                  style="color: {{ $occasion->theme_color ?? '#475569' }}">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                  <circle cx="12" cy="10" r="3"></circle>
                </svg>
              </div>
              <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-1">Where</h3>
                <p class="text-lg md:text-xl font-medium text-slate-800">{{ $occasion->fullLocation() }}</p>
              </div>
            </div>

            <!-- Dress Code -->
            @if($occasion->dress_code_color_one)
            <div
              class="flex flex-col md:flex-row gap-4 p-6 rounded-2xl bg-white shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
              <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0"
                style="background-color: {{ $occasion->theme_color ?? '#e2e8f0' }}20">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"
                  style="color: {{ $occasion->theme_color ?? '#475569' }}">
                  <path
                    d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z">
                  </path>
                </svg>
              </div>
              <div class="w-full">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-3">Dress Code</h3>
                <div class="flex flex-wrap items-center gap-4">
                  <div class="flex -space-x-3">
                    <div class="w-10 h-10 rounded-full border-4 border-white shadow-sm"
                      style="background-color: {{ $occasion->dress_code_color_one }}"></div>
                    @if($occasion->dress_code_color_two)
                    <div class="w-10 h-10 rounded-full border-4 border-white shadow-sm"
                      style="background-color: {{ $occasion->dress_code_color_two }}"></div>
                    @endif
                  </div>
                  <p class="text-lg font-medium text-slate-800">
                    {{ $occasion->dress_code_color_one_name }}
                    @if($occasion->dress_code_color_two)
                    <span class="text-slate-500 font-normal">and</span> {{ $occasion->dress_code_color_two_name }}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            @endif
          </div>

          <!-- Extra Info -->
          @if($occasion->custom_message || $occasion->accommodation)
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            @if($occasion->custom_message)
            <div class="bg-slate-100/80 p-6 rounded-2xl">
              <h4 class="font-serif text-lg font-semibold text-slate-900 mb-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Message
              </h4>
              <p class="text-slate-600 leading-relaxed text-sm">{!! nl2br(e($occasion->custom_message)) !!}</p>
            </div>
            @endif

            @if($occasion->accommodation)
            <div class="bg-slate-100/80 p-6 rounded-2xl">
              <h4 class="font-serif text-lg font-semibold text-slate-900 mb-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                  </path>
                </svg>
                Accommodation
              </h4>
              <p class="text-slate-600 leading-relaxed text-sm">{!! nl2br(e($occasion->accommodation)) !!}</p>
            </div>
            @endif
          </div>
          @endif
        </div>

        {{-- @if(!$hasRsvped) --}}
        <!-- RSVP Form -->
        <div class="animate-fade-in-up mt-8">
          <div class="text-center md:text-left mb-10">
            <h2 class="font-serif text-3xl md:text-5xl text-slate-900 mb-4">You're Invited</h2>
            <p class="text-slate-500 text-lg max-w-md">Please fill out the form below to let us know if you can make it.
            </p>
          </div>

          <div
            class="bg-white rounded-3xl p-6 md:p-10 shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
            <!-- Decorative accent -->
            <div
              class="absolute top-0 right-0 w-32 h-32 transform translate-x-16 -translate-y-16 rounded-full opacity-20"
              style="background-color: {{ $occasion->theme_color ?? '#e2e8f0' }}"></div>

            <form method="POST" action="{{ route('invites.rsvp.store', $occasion) }}" class="space-y-6 relative z-10">
              @csrf

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-2 focus:border-transparent block p-3.5 transition-shadow"
                    style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}50">
                </div>

                <div>
                  <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                  <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-2 focus:border-transparent block p-3.5 transition-shadow"
                    style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}50">
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                  <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                    class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-2 focus:border-transparent block p-3.5 transition-shadow"
                    style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}50">
                </div>

                <div class="md:col-span-2">
                  <label class="block text-sm font-medium text-slate-700 mb-4">Will you attend?</label>
                  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Yes Option -->
                    <div>
                      <input type="radio" name="response" id="response_yes" value="yes" class="peer sr-only" required
                        @checked(old('response')==='yes' )>
                      <label for="response_yes"
                        class="relative flex cursor-pointer flex-col items-center justify-center rounded-xl border border-slate-200 bg-slate-50 p-4 shadow-sm transition-all hover:bg-white peer-checked:border-transparent peer-checked:bg-white peer-checked:ring-2 peer-checked:ring-offset-1"
                        style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}">
                        <svg class="mb-2 h-8 w-8 text-emerald-500 transition-transform peer-checked:scale-110"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-slate-900 text-center">Yes!</span>
                      </label>
                    </div>

                    <!-- Maybe Option -->
                    <div>
                      <input type="radio" name="response" id="response_maybe" value="maybe" class="peer sr-only"
                        required @checked(old('response')==='maybe' )>
                      <label for="response_maybe"
                        class="relative flex cursor-pointer flex-col items-center justify-center rounded-xl border border-slate-200 bg-slate-50 p-4 shadow-sm transition-all hover:bg-white peer-checked:border-transparent peer-checked:bg-white peer-checked:ring-2 peer-checked:ring-offset-1"
                        style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}">
                        <svg class="mb-2 h-8 w-8 text-amber-500 transition-transform peer-checked:scale-110" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-slate-900 text-center">Maybe</span>
                      </label>
                    </div>

                    <!-- No Option -->
                    <div>
                      <input type="radio" name="response" id="response_no" value="no" class="peer sr-only" required
                        @checked(old('response')==='no' )>
                      <label for="response_no"
                        class="relative flex cursor-pointer flex-col items-center justify-center rounded-xl border border-slate-200 bg-slate-50 p-4 shadow-sm transition-all hover:bg-white peer-checked:border-transparent peer-checked:bg-white peer-checked:ring-2 peer-checked:ring-offset-1"
                        style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}">
                        <svg class="mb-2 h-8 w-8 text-rose-500 transition-transform peer-checked:scale-110" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-slate-900 text-center">No</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <label for="note" class="block text-sm font-medium text-slate-700 mb-2">Dietary Requirements or Notes
                  (Optional)</label>
                <textarea id="note" name="note" rows="3"
                  class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-2 focus:border-transparent block p-3.5 transition-shadow resize-none"
                  style="--tw-ring-color: {{ $occasion->theme_color ?? '#3b82f6' }}50">{{ old('note') }}</textarea>
              </div>

              <div class="pt-4">
                <button type="submit"
                  class="w-full md:w-auto px-8 py-4 text-white font-medium rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 flex justify-center items-center gap-2"
                  style="background-color: {{ $occasion->theme_color ?? '#0f172a' }};">
                  <span>Submit RSVP</span>
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                  </svg>
                </button>
              </div>
            </form>
          </div>
        </div>
        {{-- @endif --}}

        @if($occasion->side_image)
        <!-- Additional Optional Image for mobile or lower section -->
        <div class="mt-16 block rounded-2xl overflow-hidden shadow-lg relative">
          <img src="{{ getImageUrl($occasion->side_image) }}" alt="Details" class="w-full h-full object-cover">
        </div>
        @endif

        <!-- Footer -->
        <footer class="mt-20 pt-8 border-t border-slate-200 text-center md:text-left text-slate-400 text-sm pb-8">
          <p>&copy; {{ date('Y') }} {{ $occasion->user->name }}. All rights reserved.</p>
        </footer>
      </div>
    </div>
  </main>

  <style>
    .animate-fade-in-up {
      animation: fadeInUp 0.8s ease-out forwards;
      opacity: 0;
      transform: translateY(20px);
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</body>

</html>