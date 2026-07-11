<x-app-layout>

<div class="max-w-4xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">

        <div class="px-8 py-6 border-b border-gray-200">

            <h1 class="text-2xl font-bold text-gray-800">
                ➕ Add New Room
            </h1>

            <p class="text-gray-500 mt-1">
                Fill in the room information below.
            </p>

        </div>

        <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="p-8">
            @csrf
            @method('PUT')

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Room Name
                    </label>

               <input
                type="text"
                name="room_name"
                value="{{ $room->room_name }}"
                class="w-full rounded-xl border-gray-300" 
                required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Building
                    </label>

                    <input
                        type="text"
                        name="building"
                        value="{{ $room->building }}"
                        class="w-full rounded-xl border-gray-300"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Floor
                    </label>

                    <input
                        type="number"
                        name="floor"
                        value="{{ $room->floor }}"
                        class="w-full rounded-xl border-gray-300"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2">
                        Capacity
                    </label>

                    <input
                        type="number"
                        name="capacity"
                        value="{{ $room->capacity }}"
                        class="w-full rounded-xl border-gray-300"
                        required>
                </div>

            </div>

            <div class="mt-6">

                <label class="block text-sm font-semibold mb-2">
                    Facilities
                </label>

                <textarea
                    name="facilities"
                    rows="4"
                    class="w-full rounded-xl border-gray-300">{{ $room->facilities }}</textarea>

            </div>

            <div class="mt-6">

                <label class="block text-sm font-semibold mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-xl border-gray-300">

                    <option value="Available"
                    {{ $room->status == 'Available' ? 'selected' : '' }}>
                    Available
                </option>
                                <option value="Maintenance"
                                {{ $room->status == 'Maintenance' ? 'selected' : '' }}>
                                Maintenance
                                </option>

                </select>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">

                    Update Room

                </button>

                <a href="{{ route('rooms.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>