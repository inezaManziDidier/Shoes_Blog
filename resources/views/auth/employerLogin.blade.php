<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/" class="w-20 h-20 fill-current text-gray-500"><img
          src="{{ asset('/img/logo/logo.png') }}"
          alt="Auca logo"></a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <h4 class="text-center text-primary"><b>You are signing in as an Employer</b></h4>
    <form method="POST" action="{{ route('employer.store') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full"
          type="password"
          name="password"
          required autocomplete="current-password" />
      </div>
      <div class="flex items-center justify-end mt-4">
        <small class="pt-1"><b>Don't have an account?&nbsp;&nbsp;</b></small><a
          href="{{ route('employer.signup') }}"><u>Sign up</u></a>
        <x-button class="ml-3">
          {{ __('Log in') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
