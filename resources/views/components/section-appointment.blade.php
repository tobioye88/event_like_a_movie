<section class="py-8 md:py-24">
  <div class="wrapper px-4">
    <div class="flex w-full flex-col items-start justify-between gap-10 md:flex-row md:gap-6">
      <div class="flex flex-1 flex-col gap-4 pr-12">
        <h6 class="text-highlight font-brygada text-[12px] font-medium tracking-[3px] uppercase">
          What Are You Waiting For...
        </h6>

        <h2 class="font-brygada text-2xl font-medium text-black md:text-[36px] lg:text-[48px]">
          Make an appointment
        </h2>

        <p class="text-[15px] text-black md:text-base">
          Let’s help you curate the perfect Live Stream bundle for your
          special event.
        </p>

        <div>
          <div class="flex flex-col justify-center gap-3">
            <svg aria-hidden="true" class="fill-highlight h-4 w-4" viewBox="0 0 384 512"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
              </path>
            </svg>

            <h6 class="font-brygada text-[13px] font-medium tracking-[3px] text-black uppercase md:text-sm">
              Our Location
            </h6>

            <p class="text-darkGray text-[15px] md:text-base">
              24, Floodgate street, Lagos
            </p>
          </div>

          <div class="border-darkGray/25 my-10 w-full border-t"></div>

          <div class="flex flex-col justify-center gap-3">
            <svg aria-hidden="true" class="fill-highlight h-4 w-4" viewBox="0 0 512 512"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z">
              </path>
            </svg>

            <h6 class="font-brygada text-[13px] font-medium tracking-[3px] text-black uppercase md:text-[14px]">
              Opening Hours
            </h6>

            <p class="text-darkGray text-[15px] md:text-base">
              24, Floodgate street, Lagos
            </p>

            <div class="gap-0">
              <p class="text-darkGray text-[15px]">Mon-Fri: 9am-5pm</p>

              <p class="text-darkGray text-[15px]">Sat-Sun: 12pm-3pm</p>
            </div>
          </div>

          <div class="border-darkGray/25 my-10 w-full border-t"></div>

          <div class="flex flex-col justify-center gap-3">
            <svg aria-hidden="true" class="fill-highlight h-4 w-4" viewBox="0 0 616 512"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z">
              </path>
            </svg>

            <h6 class="font-brygada text-[13px] font-medium tracking-[3px] text-black uppercase md:text-[14px]">
              Contact
            </h6>

            <div class="gap-0">
              <p class="text-darkGray text-[15px]">
                Phone: +234 911 098 4650
              </p>

              <p class="text-darkGray text-[15px]">
                Email: eventlikeamovie@gmail.com
              </p>
            </div>
          </div>
        </div>
      </div>

      <form action="{{ route('appointment.store') }}" method="POST"
        class="flex w-full flex-1 flex-col justify-center gap-4 md:pt-14">
        @csrf
        <input type="hidden" name="form_started_at" value="{{ now()->timestamp }}">

        <div style="position: absolute; left: -9999px; top: -9999px;" aria-hidden="true">
          <label for="company">Company</label>
          <input type="text" name="company" id="company" tabindex="-1" autocomplete="off">
        </div>

        <div class="flex flex-col gap-3 text-black">
          <label for="name" class="text-sm font-medium capitalize md:text-base">Name: <span
              class="text-red-400">*</span></label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border border-black p-3"
            required />
        </div>

        <div class="flex flex-col gap-3 text-black">
          <label for="email" class="text-sm font-medium capitalize md:text-base">Email: <span
              class="text-red-400">*</span></label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border border-black p-3"
            required />
        </div>

        <div class="flex flex-col gap-3 text-black">
          <label for="phone" class="text-sm font-medium capitalize md:text-base">Phone: <span
              class="text-red-400">*</span></label>
          <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border border-black p-3"
            required />
        </div>

        <div class="flex flex-col gap-3 text-black">
          <label for="message" class="text-sm font-medium capitalize md:text-base">Message: <span
              class="text-red-400">*</span></label>
          <textarea name="message" id="message" cols="4" class="w-full border border-black p-3"
            required>{{ old('message') }}</textarea>
          <p class="text-darkGray text-sm">Tell use about your request</p>
        </div>

        <button type="submit"
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
  </div>
</section>