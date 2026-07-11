<nav x-data="{ open: false }"
    class="bg-emerald-700 border-b border-emerald-800 shadow-md">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2">

                        <x-application-logo
                            class="block h-9 w-auto fill-current text-white" />

                        <span class="hidden md:block text-white font-semibold text-lg">
                            Room Booking System
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">

                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition
                        {{ request()->routeIs('dashboard')
                            ? 'border-white text-white'
                            : 'border-transparent text-emerald-100 hover:text-white hover:border-emerald-300' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('rooms.index') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition
                        {{ request()->routeIs('rooms.*')
                            ? 'border-white text-white'
                            : 'border-transparent text-emerald-100 hover:text-white hover:border-emerald-300' }}">
                        Rooms
                    </a>

                    <a href="{{ route('bookings.index') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition
                        {{ request()->routeIs('bookings.*')
                            ? 'border-white text-white'
                            : 'border-transparent text-emerald-100 hover:text-white hover:border-emerald-300' }}">
                        Bookings
                    </a>

                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-emerald-600
                            text-sm font-medium rounded-md text-white bg-emerald-700
                            hover:bg-emerald-800 focus:outline-none
                            transition ease-in-out duration-150">

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md
                    text-emerald-100 hover:text-white hover:bg-emerald-800
                    focus:outline-none transition duration-150 ease-in-out">

                    <svg class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden bg-emerald-700">

        <div class="pt-2 pb-3 space-y-1">

            <a href="{{ route('dashboard') }}"
                class="block px-4 py-2 text-base font-medium
                {{ request()->routeIs('dashboard')
                    ? 'bg-emerald-800 text-white border-l-4 border-white'
                    : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }}">
                Dashboard
            </a>

            <a href="{{ route('rooms.index') }}"
                class="block px-4 py-2 text-base font-medium
                {{ request()->routeIs('rooms.*')
                    ? 'bg-emerald-800 text-white border-l-4 border-white'
                    : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }}">
                Rooms
            </a>

            <a href="{{ route('bookings.index') }}"
                class="block px-4 py-2 text-base font-medium
                {{ request()->routeIs('bookings.*')
                    ? 'bg-emerald-800 text-white border-l-4 border-white'
                    : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }}">
                Bookings
            </a>

        </div>

        <!-- Mobile User Information -->
        <div class="pt-4 pb-3 border-t border-emerald-600">

            <div class="px-4">
                <div class="font-medium text-base text-white">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-emerald-200">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-base font-medium
                    text-emerald-100 hover:bg-emerald-800 hover:text-white">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-base font-medium
                        text-emerald-100 hover:bg-emerald-800 hover:text-white"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">

                        Log Out
                    </a>
                </form>

            </div>
        </div>
    </div>
</nav>