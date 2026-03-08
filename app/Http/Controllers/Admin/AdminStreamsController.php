<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStreamsRequest;
use App\Http\Requests\UpdateStreamsRequest;
use App\Models\Streams;
use Illuminate\Http\RedirectResponse;
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
    Streams::create($this->preparePayload($request->validated()));

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
    $stream->update($this->preparePayload($request->validated()));

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
   * @param array<string, mixed> $validated
   * @return array<string, mixed>
   */
  private function preparePayload(array $validated): array
  {
    $slug = trim((string) ($validated['slug'] ?? ''));

    $validated['slug'] = $slug !== ''
      ? Str::slug($slug)
      : Str::slug((string) ($validated['couples_name'] ?? 'stream-' . Str::random(6)));

    $validated['tags'] = $this->parseList($validated['tags'] ?? null);
    $validated['gallery'] = $this->parseList($validated['gallery'] ?? null);

    $backgroundImage = trim((string) ($validated['background_image'] ?? ''));
    $validated['metadata'] = $backgroundImage === '' ? null : ['background_image' => $backgroundImage];

    unset($validated['background_image']);

    return $validated;
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
