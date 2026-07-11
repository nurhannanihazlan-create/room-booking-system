<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                📅 Booking Management
            </h1>
            <p class="text-gray-500 mt-1">
                View, search, update and manage all room bookings.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('bookings.exportPdf') }}"
            class="bg-red-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-red-700">
            Export PDF
        </div>
    </a>
        <a href="{{ route('bookings.create') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-blue-700">
            + New Booking
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 mb-6">
        <form method="GET" action="{{ route('bookings.index') }}" class="flex flex-col md:flex-row gap-3">
            <input type="text"
                   name="search"
                   class="flex-1 rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Search by room, date, or status"
                   value="{{ request('search') }}">

            <button class="bg-gray-800 text-white px-5 py-2 rounded-xl font-semibold hover:bg-gray-900">
                Search
            </button>

            <a href="{{ route('bookings.index') }}"
               class="bg-gray-200 text-gray-700 px-5 py-2 rounded-xl font-semibold hover:bg-gray-300 text-center">
                Reset
            </a>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Room</th>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Date</th>
                    <th class="px-6 py-4">Time</th>
                    <th class="px-6 py-4">Purpose</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $booking->id }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $booking->room->room_name }}
                        </td>
                        <td class="px-6 py-4">{{ $booking->user->name }}</td>
                        <td class="px-6 py-4">{{ $booking->booking_date }}</td>
                        <td class="px-6 py-4">
                            {{ $booking->start_time }} - {{ $booking->end_time }}
                        </td>
                        <td class="px-6 py-4">{{ $booking->purpose }}</td>

                        <td class="px-6 py-4">
                            @if($booking->status == 'Pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Pending
                                </span>
                            @elseif($booking->status == 'Approved')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Approved
                                </span>
                            @elseif($booking->status == 'Rejected')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Rejected
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Cancelled
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('bookings.show', $booking->id) }}"
                               class="text-indigo-600 font-semibold hover:underline">
                                View
                            </a>

                            <a href="{{ route('bookings.edit', $booking->id) }}"
                               class="text-blue-600 font-semibold hover:underline ml-3">
                                Edit
                            </a>

                            <form action="{{ route('bookings.destroy', $booking->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete this booking?')"
                                        class="text-red-600 font-semibold hover:underline ml-3">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-10 text-center">
                            <h3 class="text-lg font-semibold text-gray-700">
                                No booking records found
                            </h3>
                            <p class="text-gray-500 mt-1">
                                Create your first booking to get started.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

</x-app-layout>