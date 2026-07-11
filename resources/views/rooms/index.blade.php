<x-app-layout>

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                🏢 Room Management
            </h1>
            <p class="text-gray-500 mt-1">
                Manage room details, capacity, and availability status.
            </p>
        </div>

        <a href="{{ route('rooms.create') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-blue-700">
            + Add Room
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <table class="w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Room Name</th>
                    <th class="px-6 py-4">Building</th>
                    <th class="px-6 py-4">Capacity</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach($rooms as $room)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $room->id }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $room->room_name }}
                        </td>
                        <td class="px-6 py-4">{{ $room->building }}</td>
                        <td class="px-6 py-4">{{ $room->capacity }}</td>

                        <td class="px-6 py-4">
                            @if($room->status == 'Available')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Available
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Maintenance
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('rooms.edit', $room->id) }}"
                               class="text-blue-600 font-semibold hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('rooms.destroy', $room->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete this room?')"
                                        class="text-red-600 font-semibold hover:underline ml-3">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

</x-app-layout>