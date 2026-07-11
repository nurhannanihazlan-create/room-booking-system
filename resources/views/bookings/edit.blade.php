<x-app-layout>
<div class="max-w-4xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="px-8 py-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">✏️ Edit Booking</h1>
            <p class="text-gray-500 mt-1">Update booking information and approval status.</p>
        </div>

        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="p-8">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Room</label>
                <select name="room_id" class="w-full rounded-xl border-gray-300" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>
                            {{ $room->room_name }} - {{ $room->building }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Booking Date</label>
                    <input type="date" name="booking_date" value="{{ $booking->booking_date }}" class="w-full rounded-xl border-gray-300" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">Start Time</label>
                    <input type="time" name="start_time" value="{{ $booking->start_time }}" class="w-full rounded-xl border-gray-300" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">End Time</label>
                    <input type="time" name="end_time" value="{{ $booking->end_time }}" class="w-full rounded-xl border-gray-300" required>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold mb-2">Purpose</label>
                <textarea name="purpose" rows="4" class="w-full rounded-xl border-gray-300" required>{{ $booking->purpose }}</textarea>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-semibold mb-2">Status</label>
                <select name="status" class="w-full rounded-xl border-gray-300" required>
                    <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $booking->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $booking->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="mt-8 flex gap-3">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Update Booking
                </button>

                <a href="{{ route('bookings.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>
</x-app-layout>