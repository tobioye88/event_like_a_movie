<x-layout-app title="Contact us: Event like a movie">
  <section
    style="background-image: url('{{ asset('assets/images/contact-img.jpg') }}'); background-size: cover; background-position: center;"
    class="flex h-120 flex-col items-center justify-center bg-purple-500">
    <h6 class="font-brygada mb-4 text-xs tracking-[3px] text-white uppercase md:text-sm">
      Know more
    </h6>

    <h1 class="font-brygada text-[40px] font-medium text-white capitalize md:text-[56px] lg:text-[88px] text-shadow-sm">
      Contact us
    </h1>
  </section>

  <!-- Appointment Section -->
  <x-section-appointment />

  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.3801558598366!2d3.6058454!3d6.473437699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf98c11aa710f%3A0x11df9f761ee48ad0!2s24%20Floodgate%20St%2C%20Eti-Osa%2C%20Lagos%20106104%2C%20Lagos%2C%20Nigeria!5e0!3m2!1sen!2suk!4v1772923314794!5m2!1sen!2suk"
    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade" class="h-125 w-full"></iframe>


</x-layout-app>