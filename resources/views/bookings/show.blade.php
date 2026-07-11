<x-app-layout>
<div class="max-w-4xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="px-8 py-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">📄 Booking Details</h1>
            <p class="text-gray-500 mt-1">Full information for this booking record.</p>
        </div>

        <div class="p-8 grid md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500">Room</p>
                <p class="font-semibold text-gray-800">{{ $booking->room->room_name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Building</p>
                <p class="font-semibold text-gray-800">{{ $booking->room->building }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">User</p>
                <p class="font-semibold text-gray-800">{{ $booking->user->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Date</p>
                <p class="font-semibold text-gray-800">{{ $booking->booking_date }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Time</p>
                <p class="font-semibold text-gray-800">{{ $booking->start_time }} - {{ $booking->end_time }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Status</p>
                <p class="font-semibold text-gray-800">{{ $booking->status }}</p>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm text-gray-500">Purpose</p>
                <p class="font-semibold text-gray-800">{{ $booking->purpose }}</p>
            </div>
        </div>

        <div class="px-8 py-6 border-t border-gray-200">
            <a href="{{ route('bookings.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">
                Back
            </a>
        </div>
    </div>

</div>
</x-app-layout>