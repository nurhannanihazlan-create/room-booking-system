<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Room Booking System</h1>
        <p class="text-gray-500 mt-2">Login to manage your room bookings</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full rounded-xl" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">
                Log in
            </button>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">
                Don't have an account? Register
            </a>
        </div>

        <div class="mt-3 text-center">
            <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-gray-700 hover:underline">
                ← Back to Home
            </a>
        </div>
    </form>
</x-guest-layout>