<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Room Booking Dashboard
            </h1>
            <p class="text-gray-500 mt-2">
                Overview of rooms, bookings, and pending requests.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Total Rooms</p>
                <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $totalRooms }}</h2>
                <p class="text-xs text-gray-400 mt-2">All room records</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Available Rooms</p>
                <h2 class="text-3xl font-bold text-green-600 mt-2">{{ $availableRooms }}</h2>
                <p class="text-xs text-gray-400 mt-2">Ready to be booked</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Total Bookings</p>
                <h2 class="text-3xl font-bold text-purple-600 mt-2">{{ $totalBookings }}</h2>
                <p class="text-xs text-gray-400 mt-2">Booking records</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <p class="text-sm text-gray-500">Pending Bookings</p>
                <h2 class="text-3xl font-bold text-yellow-600 mt-2">{{ $pendingBookings }}</h2>
                <p class="text-xs text-gray-400 mt-2">Awaiting approval</p>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    System Workflow
                </h3>

                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">1</div>
                        <div>
                            <p class="font-semibold text-gray-700">Manage Rooms</p>
                            <p class="text-sm text-gray-500">Admin adds and updates available rooms.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold">2</div>
                        <div>
                            <p class="font-semibold text-gray-700">Create Booking</p>
                            <p class="text-sm text-gray-500">User selects a room, date, time, and purpose.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold">3</div>
                        <div>
                            <p class="font-semibold text-gray-700">Review Status</p>
                            <p class="text-sm text-gray-500">Booking status can be pending, approved, rejected, or cancelled.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-600 rounded-2xl shadow-sm p-6 text-white">
                <h3 class="text-lg font-semibold mb-3">
                    Quick Actions
                </h3>

                <p class="text-blue-100 text-sm mb-5">
                    Manage rooms and bookings from one place.
                </p>

                <div class="space-y-3">
                    <a href="{{ route('rooms.index') }}"
                       class="block bg-white text-blue-600 text-center rounded-xl py-3 font-semibold hover:bg-blue-50">
                        View Rooms
                    </a>

                    <a href="{{ route('bookings.index') }}"
                       class="block bg-blue-500 text-white text-center rounded-xl py-3 font-semibold hover:bg-blue-400">
                        View Bookings
                    </a>

                    <a href="{{ route('bookings.create') }}"
                       class="block bg-green-500 text-white text-center rounded-xl py-3 font-semibold hover:bg-green-400">
                        New Booking
                    </a>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>