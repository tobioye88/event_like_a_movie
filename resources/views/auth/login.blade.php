<x-layout-guest title="Login" bgClass="bg-purple-500">
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="mt-4 flex items-center justify-between gap-4">
      <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('register') }}">Create account</a>
      <x-primary-button>{{ __('Log in') }}</x-primary-button>
    </div>
  </form>
</x-layout-guest>
