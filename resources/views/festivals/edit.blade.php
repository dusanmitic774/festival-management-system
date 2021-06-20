<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="flex flex-wrap gap-5">
                        <form action="{{ route('festivals.update', $festival) }}" method="POST"
                            enctype="multipart/form-data" class="w-full px-8 pt-6 pb-8 m-5 bg-white rounded shadow-md md:flex-1">
                            @csrf
                            @method("PUT")
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                                    Festival Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="name" type="text" placeholder="name" name="name"
                                    value="{{ $festival->name }}">
                                @error('name')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="city">
                                    City
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="city" type="text" placeholder="city" name="city"
                                    value="{{ $festival->city }}">
                                @error('city')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="country">
                                    Country
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="country" type="text" placeholder="country" name="country"
                                    value="{{ $festival->country }}">
                                @error('country')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="address">
                                    Address
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="address" type="text" placeholder="address" name="address"
                                    value="{{ $festival->address }}">
                                @error('address')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="start_date">
                                    Start Date
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="start_date" type="date" placeholder="start_date" name="start_date"
                                    value="{{ $festival->start_date }}">
                                @error('start_date')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="end_date">
                                    End Date
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="end_date" type="date" placeholder="end_date" name="end_date"
                                    value="{{ $festival->end_date }}">
                                @error('end_date')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="hidden" name="latitude" value="{{ $festival->latitude }}" id="latitude">
                            <input type="hidden" name="longitude" value="{{ $festival->longitude }}" id="longitude">
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="description">
                                    Description
                                </label>

                                <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"
                                    rows="4" name="description">{{ $festival->description }}</textarea>
                                @error('description')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Image
                                </label>
                                <input type="file" class="w-full px-3 py-2 text-gray-700 border rounded" name="image">
                                @error('image')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Add Festival
                                </button>
                            </div>
                        </form>
                        <div class="w-full m-5 md:flex-1">
                            <div class="h-96" id="map"></div>
                            @error('latitude')
                                <span class="text-xs italic text-red-500">You must choose the location</span>
                            @enderror
                        </div>
                    </div>

            </div>
        </div>
        @if (session()->has('success'))

            <div class="fixed px-4 py-2 text-sm text-white bg-green-500 rounded-xl bottom-3 right-3">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div>
</x-app-layout>
