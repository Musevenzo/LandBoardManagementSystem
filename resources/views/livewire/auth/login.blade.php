<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Enums\UserRole;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login()
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        if (auth()->user()->role === UserRole::Admin) {
            return redirect()->route("admin.dashboard");

        } elseif (auth()->user()->role === UserRole::User) {
            return redirect()->route("user.dashboard");

        }  else {
            return redirect()->route("/");
        }

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="fixed inset-0 flex items-center justify-center bg-no-repeat"
    style="background-image: url('{{ asset('images/background3.jpg') }}'); background-size: contain; background-position: center;">
    <div class="max-w-md w-full mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden p-8 backdrop-blur-sm bg-opacity-90 dark:bg-opacity-90">
        <div class="flex flex-col gap-8">

            <!-- Header -->
            <div class="text-center">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Welcome back') }}</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Log in to access your account') }}
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="px-4 py-3 rounded-lg bg-blue-50 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-center" :status="session('status')" />

            <form wire:submit="login" class="flex flex-col gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <flux:input
                        wire:model="email"
                        :label="__('Email address')"
                        type="email"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="email@example.com"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                    />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="relative">
                        <flux:input
                            wire:model="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                        />
                        @if (Route::has('password.request'))
                            <flux:link class="absolute right-0 top-0 text-sm text-primary-600 dark:text-primary-400 hover:text-primary-800 dark:hover:text-primary-300" :href="route('password.request')" wire:navigate>
                                {{ __('Forgot password?') }}
                            </flux:link>
                        @endif
                    </div>
                </div>

                <!-- Remember Me & Submit -->
                <div class="flex items-center justify-between">
                    <flux:checkbox wire:model="remember" :label="__('Remember me')" class="text-sm text-gray-600 dark:text-gray-300" />

                    <flux:button variant="primary" type="submit" class="px-6 py-3 rounded-lg font-medium">
                        {{ __('Log in') }}
                        <svg wire:loading wire:target="login" class="animate-spin -mr-1 ml-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </flux:button>
                </div>
            </form>
            
            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Don\'t have an account?') }}
                    <flux:link :href="route('register')" class="font-medium text-primary-600 dark:text-primary-400 hover:text-primary-500 dark:hover:text-primary-300" wire:navigate>
                        {{ __('Sign up') }}
                    </flux:link>
                </p>
            @endif
        </div>
    </div>
</div>

