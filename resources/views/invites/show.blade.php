<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $occasion->title }} Invite</title>
  @if(app()->isLocal())
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ config('app.static.version') }}">
  @endif
</head>

<body class="min-h-screen bg-slate-950 text-white">
  <main class="min-h-screen bg-cover bg-center"
    style="background-image: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.72)), url('{{ $occasion->background_image ? getImageUrl($occasion->background_image) : asset('assets/images/bg-homepage-hero.jpg') }}');">
    <div class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-4 py-12">
      <section class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-widest" style="color: {{ $occasion->theme_color }}">You are
          invited</p>
        <h1 class="font-brygada mt-4 text-5xl font-semibold md:text-7xl">{{ $occasion->title }}</h1>
        <p class="mt-4 text-lg text-white/80">Hosted by {{ $occasion->user->name }}.</p>
      </section>

      @if(session('success'))
      <div class="mt-8 max-w-2xl rounded border border-emerald-200 bg-emerald-50 p-3 text-emerald-900">{{
        session('success') }}</div>
      @endif

      <div class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-2">
        @if($hasRsvped)
        <section class="rounded-lg bg-white p-6 text-slate-900">
          <h2 class="font-brygada text-5xl font-semibold mb-3">Occasion Details</h2>
          <div class="h-1 w-1/5" style="background-color: {{ $occasion->theme_color }}"></div>
          <div class="mt-5 space-y-8">
            <div class="flex gap-2">
              <div>
                <svg class="w-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7"
                      stroke="{{ $occasion->theme_color }}" stroke-width="2" stroke-linecap="round"></path>
                    <rect x="6" y="12" width="3" height="3" rx="0.5" fill="{{ $occasion->theme_color }}"></rect>
                    <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="{{ $occasion->theme_color }}"></rect>
                    <rect x="15" y="12" width="3" height="3" rx="0.5" fill="{{ $occasion->theme_color }}"></rect>
                  </g>
                </svg>
              </div>
              <div>
                <p class="font-semibold text-gray-500">Date and time:</p>
                <p class="text-2xl">{{ $occasion->eventAtInTimezone() }}</p>
              </div>
            </div>

            <div class="flex gap-2">
              <div>
                <svg class="w-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                      stroke="{{ $occasion->theme_color }}" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                  </g>
                </svg>
              </div>
              <div>
                <p class="font-semibold text-gray-500">Location:</p>
                <p class="text-2xl">{{ $occasion->fullLocation() }}</p>
              </div>
            </div>

            <div class="flex gap-2">
              <div>
                <svg class="w-16" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.00 32.00" xml:space="preserve"
                  fill="{{ $occasion->theme_color }}" stroke="{{ $occasion->theme_color }}" stroke-width="0.736">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <g>
                      <path style="fill: {{ $occasion->theme_color }}"
                        d="M21,19.29v1.414L15.704,26H14.29L21,19.29z M10.29,26h1.414l8.97-8.969 c-0.118-0.364-0.265-0.695-0.418-0.998L10.29,26z M18.29,26h1.414L21,24.704V23.29L18.29,26z M10,22.29v1.414l9.227-9.226 C18.959,14.171,18.75,14,18.75,14c0.001-0.166,0.011-0.32,0.019-0.478L10,22.29z M19.425,10.279C20.098,8.678,21,7.968,21,7.968 l0.341-1.019L10.055,18.235c-0.034,0.25-0.049,0.472-0.055,0.742v0.727L19.425,10.279z M16.704,1H15.29L9.579,6.711L9.934,7.77 L16.704,1z M21.126,4.578l-0.968-0.447l-8.062,8.062c0.065,0.395,0.11,0.821,0.133,1.281L21.126,4.578z M18.389,3.315l-0.703-0.324 L17.68,2.61l-6.623,6.623c0.162,0.266,0.325,0.575,0.477,0.937L18.389,3.315z">
                      </path>
                      <path style="fill: {{ $occasion->theme_color }}"
                        d="M21.586,8.778c0.169-0.122,0.296-0.295,0.362-0.493l1-2.986c0.162-0.484-0.066-1.012-0.529-1.225 l-3.744-1.728l-0.024-1.363C18.642,0.437,18.197,0,17.652,0h-4.304c-0.545,0-0.99,0.437-1,0.983l-0.024,1.363L8.581,4.074 C8.118,4.287,7.89,4.815,8.052,5.299l1,2.986c0.066,0.198,0.193,0.371,0.362,0.493c0.061,0.047,1.676,1.326,1.825,4.806 C10.531,14.322,9.061,16.18,9,18.955L9,26c0,0.552,0.448,1,1,1h5v4.5c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5V27h5 c0.552,0,1-0.448,1-1v-7.023c-0.06-2.753-1.538-4.641-2.24-5.386C19.911,10.088,21.568,8.791,21.586,8.778z M18.75,14 c0,0,2.182,1.867,2.25,4.977V26H10v-7.023C10.07,15.806,12.25,14,12.25,14C12.215,9.569,10,7.968,10,7.968L9,4.982l4.313-1.991 L13.348,1h4.304l0.035,1.991L22,4.982l-1,2.986C21,7.968,18.785,9.569,18.75,14z">
                      </path>
                    </g>
                  </g>
                </svg>
              </div>
              <div>
                <p class="font-semibold text-gray-500">Dress code colors</p>
                <div class="mt-2 flex gap-3">
                  <div class="flex items-center gap-2">
                    <span class="h-10 w-10 rounded-full border-4 border-slate-300"
                      style="background: {{ $occasion->dress_code_color_one }}"></span>
                    <span class="h-10 w-10 rounded-full border-4 border-slate-300"
                      style="background: {{ $occasion->dress_code_color_two }}"></span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="block">{{ $occasion->dress_code_color_one_name }}</span> and
                    <span>{{ $occasion->dress_code_color_two_name }}</span>
                  </div>
                </div>
              </div>
            </div>

            @if($occasion->custom_message)
            <div class="bg-gray-200 rounded-xl p-4">
              <span class="font-semibold text-gray-500">Message</span>
              <p>{{ $occasion->custom_message }}</p>
            </div>
            @endif
            @if($occasion->accommodation)
            <div class="bg-gray-200 rounded-xl p-4">
              <span class="font-semibold text-gray-500">Accommodation</span>
              <p>{{ $occasion->accommodation }}</p>
            </div>
            @endif

          </div>
        </section>
        @endif

        <section class="col-span-1 overflow-hidden rounded-lg bg-white text-gray-800">
          <div class="min-h-80 bg-slate-100">
            <img
              src="{{ $occasion->side_image ? getImageUrl($occasion->side_image) : ($occasion->background_image ? getImageUrl($occasion->background_image) : asset('assets/images/camera.png')) }}"
              alt="{{ $occasion->title }} RSVP image" class="h-full w-full object-cover">
          </div>
        </section>

        @if(!$hasRsvped)
        <section class="p-6">
          <h2 class="font-brygada text-3xl font-semibold">RSVP</h2>
          <form method="POST" action="{{ route('invites.rsvp.store', $occasion) }}" class="mt-5 space-y-4">
            @csrf
            <div>
              <label for="name" class="mb-1 block text-sm font-medium">Name</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>
            <div>
              <label for="email" class="mb-1 block text-sm font-medium">Email</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>
            <div>
              <label for="phone" class="mb-1 block text-sm font-medium">Phone</label>
              <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                class="w-full rounded border border-slate-300 px-3 py-2" required>
            </div>
            <div>
              <label for="response" class="mb-1 block text-sm font-medium">Can you attend?</label>
              <select id="response" name="response" class="w-full rounded border border-slate-300 px-3 py-2" required>
                <option value="yes" @selected(old('response')==='yes' )>Yes</option>
                <option value="maybe" @selected(old('response')==='maybe' )>Maybe</option>
                <option value="no" @selected(old('response')==='no' )>No</option>
              </select>
            </div>
            <div>
              <label for="note" class="mb-1 block text-sm font-medium">Note</label>
              <textarea id="note" name="note" rows="3"
                class="w-full rounded border border-slate-300 px-3 py-2">{{ old('note') }}</textarea>
            </div>
            <button type="submit" class="rounded px-5 py-3 font-semibold text-white"
              style="background: {{ $occasion->theme_color }}">Submit RSVP</button>
          </form>
        </section>
        @endif
      </div>
    </div>
  </main>
</body>

</html>