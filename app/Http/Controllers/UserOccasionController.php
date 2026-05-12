<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOccasionRequest;
use App\Http\Requests\UpdateOccasionRequest;
use App\Models\Occasion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserOccasionController extends Controller
{
    public function index(): View
    {
        return view('user.occasions.index', [
            'occasions' => auth()->user()
                ->occasions()
                ->withCount('rsvps')
                ->latest('event_at')
                ->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('user.occasions.create');
    }

    public function store(StoreOccasionRequest $request): RedirectResponse
    {
        $occasion = Occasion::create($this->preparePayload($request));

        if ($occasion->status !== 'active') {
            return redirect()
                ->route('occasions.show', $occasion)
                ->with('success', 'Occasion created successfully. You can publish it when you are ready to share the invite link.');
        }
        return redirect()
            ->route('occasions.show', $occasion)
            ->with('success', 'Occasion created and published. Your invite link is ready to share.');
    }

    public function show(Occasion $occasion): View
    {
        $this->authorizeOwner($occasion);

        return view('user.occasions.show', [
            'occasion' => $occasion->loadCount('rsvps'),
            'rsvps' => $occasion->rsvps()->latest()->paginate(20),
        ]);
    }

    public function edit(Occasion $occasion): View
    {
        $this->authorizeOwner($occasion);

        return view('user.occasions.edit', [
            'occasion' => $occasion,
        ]);
    }

    public function update(UpdateOccasionRequest $request, Occasion $occasion): RedirectResponse
    {
        $this->authorizeOwner($occasion);

        $occasion->update($this->preparePayload($request, $occasion));

        return redirect()
            ->route('occasions.show', $occasion)
            ->with('success', 'Occasion updated successfully.');
    }

    public function publish(Occasion $occasion): RedirectResponse
    {
        $this->authorizeOwner($occasion);

        $occasion->update(['status' => 'active']);

        return back()->with('success', 'Occasion published successfully.');
    }

    public function destroy(Occasion $occasion): RedirectResponse
    {
        $this->authorizeOwner($occasion);

        if ($occasion->background_image) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $occasion->background_image));
        }

        if ($occasion->side_image) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $occasion->side_image));
        }

        $occasion->delete();

        return redirect()->route('occasions.index')->with('success', 'Occasion deleted successfully.');
    }

    private function preparePayload(FormRequest $request, ?Occasion $existingOccasion = null): array
    {
        $validated = $request->validated();

        $validated['user_id'] = $request->user()->id;
        $validated['slug'] = $existingOccasion?->slug ?? $this->uniqueSlug($validated['title']);
        $validated['status'] = $validated['status_action'] === 'publish' ? 'active' : 'inactive';
        $validated['event_at'] = Carbon::parse($validated['event_at'], $validated['event_timezone'])->utc();
        $validated['location'] = implode(', ', array_filter([
            $validated['location_address'],
            $validated['location_state'],
            $validated['location_country'],
        ]));

        if ($request->hasFile('background_image')) {
            if ($existingOccasion?->background_image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $existingOccasion->background_image));
            }

            $validated['background_image'] = $this->storeImage($request->file('background_image'), 'occasions/backgrounds');
        } else {
            $validated['background_image'] = $existingOccasion?->background_image;
        }

        if ($request->hasFile('side_image')) {
            if ($existingOccasion?->side_image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $existingOccasion->side_image));
            }

            $validated['side_image'] = $this->storeImage($request->file('side_image'), 'occasions/side-images');
        } else {
            $validated['side_image'] = $existingOccasion?->side_image;
        }

        unset($validated['status_action']);

        return $validated;
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title) ?: 'occasion';
        $slug = $base;
        $counter = 2;

        while (Occasion::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function storeImage(?UploadedFile $file, string $directory): ?string
    {
        if (! $file) {
            return null;
        }

        return '/storage/' . $file->store($directory, 'public');
    }

    private function authorizeOwner(Occasion $occasion): void
    {
        abort_unless($occasion->user_id === auth()->id(), 403);
    }
}
