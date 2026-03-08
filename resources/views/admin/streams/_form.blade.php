@php
$stream = $stream ?? null;
$tagsText = old('tags', $stream && is_array($stream->tags) ? implode(', ', $stream->tags) : '');
$existingGallery = is_array($stream?->gallery) ? $stream->gallery : [];
$backgroundImage = $stream?->metadata?->background_image;
@endphp

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
  <div>
    <label for="intro" class="mb-1 block text-sm font-medium">Intro</label>
    <input type="text" id="intro" name="intro" value="{{ old('intro', $stream?->intro) }}"
      class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="couples_name" class="mb-1 block text-sm font-medium">Couples Name</label>
    <input type="text" id="couples_name" name="couples_name" value="{{ old('couples_name', $stream?->couples_name) }}"
      class="w-full rounded border border-slate-300 px-3 py-2" required>
  </div>

  <div>
    <label for="slug" class="mb-1 block text-sm font-medium">Slug (optional)</label>
    <input type="text" id="slug" name="slug" value="{{ old('slug', $stream?->slug) }}"
      class="w-full rounded border border-slate-300 px-3 py-2">
  </div>

  <div>
    <label for="event_date" class="mb-1 block text-sm font-medium">Event Date</label>
    <input type="datetime-local" id="event_date" name="event_date"
      value="{{ old('event_date', $stream?->event_date?->format('Y-m-d\TH:i')) }}"
      class="w-full rounded border border-slate-300 px-3 py-2">
  </div>

  <div class="md:col-span-2">
    <label for="quote" class="mb-1 block text-sm font-medium">Quote</label>
    <textarea id="quote" name="quote" rows="3"
      class="w-full rounded border border-slate-300 px-3 py-2">{{ old('quote', $stream?->quote) }}</textarea>
  </div>

  <div class="md:col-span-2">
    <label for="stream_url" class="mb-1 block text-sm font-medium">Stream URL</label>
    <input type="url" id="stream_url" name="stream_url" value="{{ old('stream_url', $stream?->stream_url) }}"
      class="w-full rounded border border-slate-300 px-3 py-2">
  </div>

  <div class="md:col-span-2">
    <label for="thumbnail" class="mb-1 block text-sm font-medium">Thumbnail Image</label>
    <input type="file" id="thumbnail" name="thumbnail" accept="image/*"
      class="w-full rounded border border-slate-300 px-3 py-2">
    @if($stream?->thumbnail)
    <p class="mt-2 text-xs text-slate-500">Current thumbnail:</p>
    <img src="{{ $stream->thumbnail }}" alt="Current thumbnail" class="mt-1 h-20 w-32 rounded border object-cover">
    @endif
  </div>

  <div class="md:col-span-2">
    <label for="background_image" class="mb-1 block text-sm font-medium">Background Image</label>
    <input type="file" id="background_image" name="background_image" accept="image/*"
      class="w-full rounded border border-slate-300 px-3 py-2">
    @if($backgroundImage)
    <p class="mt-2 text-xs text-slate-500">Current background image:</p>
    <img src="{{ $backgroundImage }}" alt="Current background" class="mt-1 h-20 w-32 rounded border object-cover">
    @endif
  </div>

  <div class="md:col-span-2">
    <label for="description" class="mb-1 block text-sm font-medium">Description</label>
    <textarea id="description" name="description" rows="4"
      class="w-full rounded border border-slate-300 px-3 py-2">{{ old('description', $stream?->description) }}</textarea>
  </div>

  <div class="md:col-span-2">
    <label for="love_story" class="mb-1 block text-sm font-medium">Love Story</label>
    <textarea id="love_story" name="love_story" rows="6"
      class="w-full rounded border border-slate-300 px-3 py-2">{{ old('love_story', $stream?->love_story) }}</textarea>
  </div>

  <div>
    <label for="tags" class="mb-1 block text-sm font-medium">Tags (comma-separated)</label>
    <input type="text" id="tags" name="tags" value="{{ $tagsText }}"
      class="w-full rounded border border-slate-300 px-3 py-2">
  </div>

  <div>
    <label for="status" class="mb-1 block text-sm font-medium">Status</label>
    <select id="status" name="status" class="w-full rounded border border-slate-300 px-3 py-2" required>
      <option value="active" @selected(old('status', $stream?->status) === 'active')>Active</option>
      <option value="inactive" @selected(old('status', $stream?->status) === 'inactive')>Inactive</option>
    </select>
  </div>

  <div class="md:col-span-2">
    <label for="gallery" class="mb-1 block text-sm font-medium">Gallery Images (multiple)</label>
    <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple
      class="w-full rounded border border-slate-300 px-3 py-2">
    @if($existingGallery !== [])
    <p class="mt-2 text-xs text-slate-500">Current gallery:</p>
    <div class="mt-1 flex flex-wrap gap-2">
      @foreach($existingGallery as $image)
      <img src="{{ $image }}" alt="Gallery image" class="h-16 w-16 rounded border object-cover">
      @endforeach
    </div>
    @endif
  </div>
</div>

<div class="mt-6 flex items-center gap-3">
  <button type="submit" class="cursor-pointer rounded bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">
    Save Stream
  </button>
  <a href="{{ route('admin.streams.index') }}"
    class="rounded border border-slate-300 px-4 py-2 hover:bg-slate-100">Cancel</a>
</div>