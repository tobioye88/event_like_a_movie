<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStreamsRequest;
use App\Http\Requests\UpdateStreamsRequest;
use App\Models\Streams;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminStreamsController extends Controller
{
  public function index(): View
  {
    return view('admin.streams.index', [
      'streams' => Streams::query()->latest('event_date')->latest()->paginate(12),
    ]);
  }

  public function create(): View
  {
    return view('admin.streams.create');
  }

  public function store(StoreStreamsRequest $request): RedirectResponse
  {
    Streams::create($this->preparePayload($request));

    return redirect()->route('admin.streams.index')->with('success', 'Stream created successfully.');
  }

  public function edit(Streams $stream): View
  {
    return view('admin.streams.edit', [
      'stream' => $stream,
    ]);
  }

  public function update(UpdateStreamsRequest $request, Streams $stream): RedirectResponse
  {
    $stream->update($this->preparePayload($request, $stream));

    return redirect()->route('admin.streams.index')->with('success', 'Stream updated successfully.');
  }

  public function destroy(Streams $stream): RedirectResponse
  {
    $stream->delete();

    return redirect()->route('admin.streams.index')->with('success', 'Stream deleted successfully.');
  }

  /**
   * Normalize request fields to match db columns.
   *
   * @return array<string, mixed>
   */
  private function preparePayload(FormRequest $request, ?Streams $existingStream = null): array
  {
    $validated = $request->validated();

    $slug = trim((string) ($validated['slug'] ?? ''));

    $validated['slug'] = $slug !== ''
      ? Str::slug($slug)
      : Str::slug((string) ($validated['couples_name'] ?? 'stream-' . Str::random(6)));

    $validated['tags'] = $this->parseList($validated['tags'] ?? null);
    $validated['thumbnail'] = $request->hasFile('thumbnail')
      ? $this->storeImage($request->file('thumbnail'), 'streams/thumbnails')
      : $existingStream?->thumbnail;

    if ($request->hasFile('gallery')) {
      $newGallery = $this->storeMultipleImages($request->file('gallery'), 'streams/gallery');
      $validated['gallery'] = $existingStream ? array_merge($existingStream->gallery ?? [], $newGallery ?? []) : $newGallery;
    } else {
      $validated['gallery'] = $existingStream?->gallery;
    }

    if ($request->has('delete_gallery') && is_array($request->input('delete_gallery')) && is_array($validated['gallery'])) {
      $validated['gallery'] = array_values(array_diff($validated['gallery'], $request->input('delete_gallery')));
    }

    $existingBackground = $existingStream?->metadata?->background_image;
    $existingMobileBackground = $existingStream?->metadata?->background_image_mobile ?? null;

    // delete old background images if new ones are uploaded
    if ($request->hasFile('background_image') && $existingBackground) {
      $existingPath = str_replace('/storage/', '', $existingBackground);
      if (file_exists(public_path('storage/' . $existingPath))) {
        unlink(public_path('storage/' . $existingPath));
      }
    }
    if ($request->hasFile('background_image_mobile') && $existingMobileBackground) {
      $existingMobilePath = str_replace('/storage/', '', $existingMobileBackground);
      if (file_exists(public_path('storage/' . $existingMobilePath))) {
        unlink(public_path('storage/' . $existingMobilePath));
      }
    }

    $newBackground = $request->hasFile('background_image')
      ? $this->storeImage($request->file('background_image'), 'streams/backgrounds')
      : $existingBackground;

    $newMobileBackground = $request->hasFile('background_image_mobile')
      ? $this->storeImage($request->file('background_image_mobile'), 'streams/backgrounds/mobile')
      : $existingMobileBackground;

    $metadata = [
      'background_image' => $newBackground,
      'background_image_mobile' => $newMobileBackground,
    ];

    $metadata = array_filter($metadata, static fn(mixed $value): bool => is_string($value) && $value !== '');

    $validated['metadata'] = $metadata === [] ? null : $metadata;

    unset($validated['background_image']);
    unset($validated['background_image_mobile']);

    return $validated;
  }

  private function storeImage(?UploadedFile $file, string $directory): ?string
  {
    if (! $file) {
      return null;
    }

    $path = $file->store($directory, 'public');

    return '/storage/' . ltrim($path, '/');
  }

  /**
   * @param array<int, UploadedFile>|UploadedFile|null $files
   * @return array<int, string>|null
   */
  private function storeMultipleImages(array|UploadedFile|null $files, string $directory): ?array
  {
    if ($files instanceof UploadedFile) {
      $files = [$files];
    }

    if (! is_array($files) || $files === []) {
      return null;
    }

    $stored = [];

    foreach ($files as $file) {
      if (! $file instanceof UploadedFile) {
        continue;
      }

      $path = $file->store($directory, 'public');
      $stored[] = '/storage/' . ltrim($path, '/');
    }

    return $stored === [] ? null : $stored;
  }

  /**
   * @param mixed $value
   * @return array<int, string>|null
   */
  private function parseList(mixed $value): ?array
  {
    if (! is_string($value) || trim($value) === '') {
      return null;
    }

    $list = preg_split('/[\n,]+/', $value) ?: [];
    $normalized = array_values(array_filter(array_map(static fn(string $item): string => trim($item), $list)));

    return $normalized === [] ? null : $normalized;
  }
}
