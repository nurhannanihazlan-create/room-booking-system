<x-app-layout>
<div class="max-w-4xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="px-8 py-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">➕ Create Booking</h1>
            <p class="text-gray-500 mt-1">Select room, date, time and booking purpose.</p>
        </div>

        <form action="{{ route('bookings.store') }}" method="POST" class="p-8">
            @csrf

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Room</label>
                <select name="room_id" class="w-full rounded-xl border-gray-300" required>
                    <option value="">-- Select Room --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">
                            {{ $room->room_name }} - {{ $room->building }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Booking Date</label>
                    <input type="date" name="booking_date" class="w-full rounded-xl border-gray-300" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Start Time</label>
                    <input type="time" name="start_time" class="w-full rounded-xl border-gray-300" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">End Time</label>
                    <input type="time" name="end_time" class="w-full rounded-xl border-gray-300" required>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold mb-2">Purpose</label>
                <textarea name="purpose" rows="4" class="w-full rounded-xl border-gray-300" required></textarea>
            </div>

            <div class="mt-8 flex gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Save Booking
                </button>

                <a href="{{ route('bookings.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>
</x-app-layout>