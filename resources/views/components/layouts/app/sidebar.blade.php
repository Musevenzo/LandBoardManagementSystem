<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-blue-200 bg-blue-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <!-- Logo Section -->
            <a href="{{ route('admin.dashboard') }}" class="mr-5 flex items-center space-x-2 p-4 hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors" wire:navigate>
                <img src="{{ asset('images/logo.PNG') }}" alt="eLAND Botswana Logo" class="h-10 w-auto rounded-lg">
                <span class="text-lg font-semibold text-blue-800 dark:text-white">{{ __('eLAND Dashboard') }}</span>
            </a>

            @if (auth()->user()->role === App\Enums\UserRole::Admin)
            <flux:navlist variant="outline" class="mt-4">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item 
                        icon="home" 
                        :href="route('admin.dashboard')" 
                        :current="request()->routeIs('admin.dashboard')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="user" 
                        :href="route('admin.users.index')" 
                        :current="request()->routeIs('admin.users')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('User') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="document" 
                        :href="route('admin.applications.index')" 
                        :current="request()->routeIs('admin.applications')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('Applications') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="home" 
                        :href="route('admin.plots.index')" 
                        :current="request()->routeIs('admin.plots')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('Plots') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="document" 
                        :href="route('admin.reports.index')" 
                        :current="request()->routeIs('admin.reports')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('Reports') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            @endif

            @if (auth()->user()->role === App\Enums\UserRole::User)
            <flux:navlist variant="outline" class="mt-4">
                <flux:navlist.group :heading="__('My Account')" class="grid">
                    <flux:navlist.item 
                        icon="home" 
                        :href="route('user.dashboard')" 
                        :current="request()->routeIs('user.dashboard')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="document" 
                        :href="route('user.applications.index')" 
                        :current="request()->routeIs('user.applications.index')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('View Application Status') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="clock" 
                        :href="route('user.applications.create')" 
                        :current="request()->routeIs('user.applications.create')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('New Application') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="eye" 
                        :href="route('user.application.history')" 
                        :current="request()->routeIs('user.application.history')" 
                        wire:navigate 
                        class="hover:bg-blue-100 dark:hover:bg-zinc-800 transition-colors">
                        {{ __('Application History') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            @endif

            <flux:spacer />

            <!-- User Profile Section -->
            <flux:dropdown position="bottom" align="start" class="p-4">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px] bg-white dark:bg-zinc-800 rounded-lg shadow-lg">
                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate class="hover:bg-blue-100 dark:hover:bg-zinc-700 transition-colors">
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:bg-blue-100 dark:hover:bg-zinc-700 transition-colors">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>