@extends('layouts.main')

@section('content')
    {{-- OLD --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full max-w-xs">
                        <form action="{{ route('visitors.store', $festival) }}" method="POST"
                              class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                            @csrf
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="first_name">
                                    First Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="first_name" type="text" placeholder="first_name" name="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="last_name">
                                    First Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="last_name" type="text" placeholder="last_name" name="last_name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Email
                                </label>
                                <input
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="email" type="email" placeholder="email" name="email" value="{{ old('email') }}">
                                @error('email')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- OLD --}}
@endsection
