<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occasion;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminOccasionController extends Controller
{
    public function index(): View
    {
        return view('admin.occasions.index', [
            'occasions' => Occasion::query()
                ->with('user')
                ->withCount('rsvps')
                ->latest('event_at')
                ->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.occasions.create', [
            'users' => User::query()
                ->where('role', 'user')
                ->orderBy('name')
                ->get(['id', 'name', 'email']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $occasion = Occasion::create($this->preparePayload($request));

        return redirect()
            ->route('admin.occasions.show', $occasion)
            ->with('success', 'Occasion created for ' . $occasion->user->name . '.');
    }

    public function show(Occasion $occasion): View
    {
        return view('admin.occasions.show', [
            'occasion' => $occasion->load('user')->loadCount('rsvps'),
            'rsvps' => $occasion->rsvps()->latest()->paginate(20),
        ]);
    }

    public function update(Request $request, Occasion $occasion): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:active,inactive'],
        ]);

        $occasion->update($validated);

        return back()->with('success', 'Occasion status updated successfully.');
    }

    public function destroy(Occasion $occasion): RedirectResponse
    {
        $occasion->delete();

        return redirect()->route('admin.occasions.index')->with('success', 'Occasion deleted successfully.');
    }

    private function preparePayload(Request $request): array
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'theme_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'background_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'side_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'event_at' => ['required', 'date'],
            'event_timezone' => ['required', 'timezone'],
            'location_country' => ['required', 'string', 'max:120'],
            'location_state' => ['required', 'string', 'max:120'],
            'location_address' => ['required', 'string', 'max:255'],
            'accommodation' => ['nullable', 'string', 'max:2000'],
            'dress_code_color_one' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'dress_code_color_one_name' => ['required', 'string', 'max:80'],
            'dress_code_color_two' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'dress_code_color_two_name' => ['required', 'string', 'max:80'],
            'custom_message' => ['nullable', 'string', 'max:3000'],
            'status_action' => ['required', 'in:draft,publish'],
        ]);

        $validated['slug'] = $this->uniqueSlug($validated['title']);
        $validated['status'] = $validated['status_action'] === 'publish' ? 'active' : 'inactive';
        $validated['event_at'] = Carbon::parse($validated['event_at'], $validated['event_timezone'])->utc();
        $validated['location'] = implode(', ', array_filter([
            $validated['location_address'],
            $validated['location_state'],
            $validated['location_country'],
        ]));

        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $this->storeImage($request->file('background_image'), 'occasions/backgrounds');
        }

        if ($request->hasFile('side_image')) {
            $validated['side_image'] = $this->storeImage($request->file('side_image'), 'occasions/side-images');
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
}
