<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        // Auth::login($user);

        $this->redirectIntended(route('login', absolute: false), navigate: true);
    }
}; ?>
<div class="fixed inset-0 flex items-center justify-center bg-no-repeat"
style="background-image: url('{{ asset('images/background3.jpg') }}'); background-size: contain; background-position: center;">
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden p-8">
    <div class="flex flex-col gap-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('Join us today') }}</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Create your account in just a few steps') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="px-4 py-3 rounded-lg bg-blue-50 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-center" :status="session('status')" />

        <form wire:submit="register" class="flex flex-col gap-6">
            <!-- Name -->
            <div class="space-y-2">
                <flux:input
                    wire:model="name"
                    :label="__('Full Name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Hellen Musevenzo"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                />
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <flux:input
                    wire:model="email"
                    :label="__('Email Address')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                />
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ __('Minimum 8 characters with at least one number and symbol') }}
                </p>
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <flux:input
                    wire:model="password_confirmation"
                    :label="__('Confirm Password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                />
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <flux:button 
                    type="submit" 
                    variant="primary" 
                    class="w-full px-6 py-3 rounded-lg font-medium transition-colors duration-200"
                >
                    {{ __('Create Account') }}
                    <svg wire:loading wire:target="register" class="animate-spin -mr-1 ml-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </flux:button>
            </div>
        </form>

        <!-- Divider -->
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                    {{ __('Already registered?') }}
                </span>
            </div>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <flux:link 
                :href="route('login')" 
                class="text-sm font-medium text-primary-600 dark:text-primary-400 hover:text-primary-500 dark:hover:text-primary-300 transition-colors duration-200"
                wire:navigate
            >
                {{ __('Sign in to your account') }}
            </flux:link>
        </div>
    </div>
</div>