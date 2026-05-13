@php
$occasion = $occasion ?? null;
$cancelRoute = $cancelRoute ?? ($occasion ? route('occasions.show', $occasion) : route('occasions.index'));
$selectedTimezone = old('event_timezone', $occasion?->event_timezone ?? config('app.timezone', 'UTC'));
$timezones = DateTimeZone::listIdentifiers();
@endphp

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
  <div class="md:col-span-2">
    <label for="title" class="mb-1 block text-sm font-medium required">Occasion Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $occasion?->title) }}"
      class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="event_at" class="mb-1 block text-sm font-medium required">Event Date and Time</label>
    <input type="datetime-local" id="event_at" name="event_at"
      value="{{ old('event_at', $occasion?->eventAtInputValue()) }}"
      class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="event_timezone" class="mb-1 block text-sm font-medium required">Timezone</label>
    <select id="event_timezone" name="event_timezone" class="w-full rounded border border-slate-300 px-3 py-2" required>
      @foreach($timezones as $timezone)
      <option value="{{ $timezone }}" @selected($selectedTimezone===$timezone)>{{ $timezone }}</option>
      @endforeach
    </select>
  </div>

  <div>
    <label for="theme_color" class="mb-1 block text-sm font-medium required">Theme Color</label>
    <input type="color" id="theme_color" name="theme_color"
      value="{{ old('theme_color', $occasion?->theme_color ?? '#9b007e') }}"
      class="h-11 w-full rounded border border-slate-300 px-2 py-1" required>
  </div>

  <div>
    <label for="background_image" class="mb-1 block text-sm font-medium">Background Image</label>
    <input type="file" id="background_image" name="background_image" accept="image/*"
      class="w-full rounded border border-slate-300 px-3 py-2">
    @if($occasion?->background_image)
    <img src="{{ getImageUrl($occasion->background_image) }}" alt="Current background image"
      class="mt-2 h-20 w-32 rounded border object-cover">
    @endif
  </div>

  <div>
    <label for="side_image" class="mb-1 block text-sm font-medium">RSVP Side Image</label>
    <input type="file" id="side_image" name="side_image" accept="image/*"
      class="w-full rounded border border-slate-300 px-3 py-2">
    @if($occasion?->side_image)
    <img src="{{ getImageUrl($occasion->side_image) }}" alt="Current RSVP side image"
      class="mt-2 h-20 w-32 rounded border object-cover">
    @endif
  </div>

  <div>
    <label for="location_country" class="mb-1 block text-sm font-medium">Country</label>
    <input type="text" id="location_country" name="location_country"
      value="{{ old('location_country', $occasion?->location_country) }}"
      class="w-full rounded border border-slate-300 px-3 py-2">
  </div>

  <div>
    <label for="location_state" class="mb-1 block text-sm font-medium required">State</label>
    <input type="text" id="location_state" name="location_state"
      value="{{ old('location_state', $occasion?->location_state) }}"
      class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div class="md:col-span-2">
    <label for="location_address" class="mb-1 block text-sm font-medium required">Address</label>
    <input type="text" id="location_address" name="location_address"
      value="{{ old('location_address', $occasion?->location_address) }}"
      class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="dress_code_color_one_name" class="mb-1 block text-sm font-medium required">Dress Code Color One
      Name</label>
    <input type="text" id="dress_code_color_one_name" name="dress_code_color_one_name"
      value="{{ old('dress_code_color_one_name', $occasion?->dress_code_color_one_name) }}"
      class="mb-2 w-full rounded border border-slate-300 px-3 py-2" required>
    <input type="color" id="dress_code_color_one" name="dress_code_color_one"
      value="{{ old('dress_code_color_one', $occasion?->dress_code_color_one ?? '#000000') }}"
      class="h-11 w-full rounded border border-slate-300 px-2 py-1" required>
  </div>

  <div>
    <label for="dress_code_color_two_name" class="mb-1 block text-sm font-medium required">Dress Code Color Two
      Name</label>
    <input type="text" id="dress_code_color_two_name" name="dress_code_color_two_name"
      value="{{ old('dress_code_color_two_name', $occasion?->dress_code_color_two_name) }}"
      class="mb-2 w-full rounded border border-slate-300 px-3 py-2" required>
    <input type="color" id="dress_code_color_two" name="dress_code_color_two"
      value="{{ old('dress_code_color_two', $occasion?->dress_code_color_two ?? '#ffffff') }}"
      class="h-11 w-full rounded border border-slate-300 px-2 py-1" required>
  </div>

  <div class="md:col-span-2">
    <label for="accommodation" class="mb-1 block text-sm font-medium">Accommodation Information</label>
    <textarea id="accommodation" name="accommodation" rows="4"
      class="w-full rounded border border-slate-300 px-3 py-2">{{ old('accommodation', $occasion?->accommodation) }}</textarea>
  </div>

  <div class="md:col-span-2">
    <label for="custom_message" class="mb-1 block text-sm font-medium">Custom Message</label>
    <textarea id="custom_message" name="custom_message" rows="5"
      class="w-full rounded border border-slate-300 px-3 py-2">{{ old('custom_message', $occasion?->custom_message) }}</textarea>
  </div>
</div>

<div class="mt-6 flex flex-wrap items-center gap-3">
  <button type="submit" name="status_action" value="draft"
    class="rounded border border-slate-300 px-4 py-2 hover:bg-slate-100">Save as Draft</button>
  <button type="submit" name="status_action" value="publish"
    class="rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Publish</button>
  <a href="{{ $cancelRoute }}" class="rounded border border-slate-300 px-4 py-2 hover:bg-slate-100">Cancel</a>
</div>