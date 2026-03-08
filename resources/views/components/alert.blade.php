@if(session()->has('error') || session()->has('success') || $errors->any())
<div class="px-3 mt-3 absolute top-[70px] right-0 z-50">
  <div role="alert"
    class="rounded-xl border border-gray-200 bg-white p-4 @if(session()->has('error')) border-red-500 @endif">
    <div class="flex items-start gap-2">
      @if(session()->has('success'))
        <span class="text-green-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>
      @endif
      @if(session()->has('error') || $errors->any())
        <span class="text-red-600">
          <svg class="size-6" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="currentColor">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <g>
                <path fill="currentColor"
                  d="M505.095,407.125L300.77,53.208c-9.206-15.944-26.361-25.849-44.774-25.849 c-18.412,0-35.552,9.905-44.751,25.849L6.905,407.109c-9.206,15.944-9.206,35.746,0,51.69 c9.206,15.944,26.354,25.842,44.758,25.842h408.674c18.405,0,35.568-9.897,44.759-25.842 C514.302,442.855,514.302,423.053,505.095,407.125z M256.004,426.437c-17.668,0-32.013-14.33-32.013-32.004 c0-17.668,14.345-31.997,32.013-31.997c17.667,0,31.997,14.329,31.997,31.997C288.001,412.108,273.671,426.437,256.004,426.437z M275.72,324.011c0,10.89-8.834,19.709-19.716,19.709c-10.898,0-19.717-8.818-19.717-19.709l-12.296-144.724 c0-17.676,14.345-32.005,32.013-32.005c17.667,0,31.997,14.33,31.997,32.005L275.72,324.011z">
                </path>
              </g>
            </g>
          </svg>
        </span>
      @endif

      <div class="flex-1">
        <strong class="block font-medium text-gray-900">
          @if(session()->has('error') || $errors->any()) Oops! @endIf
          @if(session()->has('success')) Success! @endIf
                    </strong>

                    <p class="mt-1 text-sm text-gray-700">{{ session('error') }} {{ session('success') }}</p>
                    @if($errors->any())
                      <ul class="mt-2 list-disc pl-5 text-sm text-red-600">
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    @endif
                  </div>

                  <button class="text-gray-500 transition hover:text-gray-600" onclick="this.parentElement.parentElement.remove()">
                    <span class="sr-only">Dismiss popup</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                      class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          @endif