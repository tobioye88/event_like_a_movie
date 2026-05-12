<x-user.layout title="Account">
  <section class="max-w-2xl rounded-lg border border-slate-200 bg-white p-6">
    <h2 class="font-brygada text-2xl font-semibold">Delete Account</h2>
    <p class="mt-2 text-sm text-slate-600">Deleting your account permanently removes your occasions and their RSVPs.</p>

    <form method="POST" action="{{ route('account.destroy') }}" class="mt-6 space-y-4" onsubmit="return confirm('Delete your account permanently?')">
      @csrf
      @method('DELETE')
      <div>
        <label for="password" class="mb-1 block text-sm font-medium">Confirm Password</label>
        <input type="password" id="password" name="password" class="w-full rounded border border-slate-300 px-3 py-2" required>
      </div>
      <button type="submit" class="rounded border border-red-300 px-4 py-2 text-red-700 hover:bg-red-50">Delete My Account</button>
    </form>
  </section>
</x-user.layout>
