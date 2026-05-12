<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::query()->withCount('occasions')->latest()->paginate(15),
        ]);
    }

    public function show(User $user): View
    {
        return view('admin.users.show', [
            'managedUser' => $user->loadCount('occasions'),
            'occasions' => $user->occasions()->withCount('rsvps')->latest()->paginate(10),
        ]);
    }

    public function update(UpdateAdminUserRequest $request, User $user): RedirectResponse
    {
        $this->ensureCanManage($user);
        $validated = $request->validated();

        if (! $request->user()->isSuperAdmin() && $validated['role'] === 'super_admin') {
            throw ValidationException::withMessages([
                'role' => 'Only a super admin can assign the super admin role.',
            ]);
        }

        $user->update($validated);

        return back()->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->ensureCanManage($user);

        if (auth()->id() === $user->id) {
            throw ValidationException::withMessages([
                'user' => 'You cannot delete your own admin account.',
            ]);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    private function ensureCanManage(User $user): void
    {
        if ($user->isSuperAdmin() && ! auth()->user()->isSuperAdmin()) {
            abort(403);
        }
    }
}
