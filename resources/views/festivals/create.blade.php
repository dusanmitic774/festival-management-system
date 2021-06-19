<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Festival</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="antialiased">

    <div class="w-full max-w-xs">
        <form action="{{ route('festival.store') }}" method="POST" enctype="multipart/form-data"
            class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Festival Name
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="name" type="text" placeholder="name" name="name" value="{{ old('name') }}">
                @error("name")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="city">
                    City
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="city" type="text" placeholder="city" name="city" value="{{ old('city') }}">
                @error("city")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="country">
                    Country
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="country" type="text" placeholder="country" name="country" value="{{ old('country') }}">
                @error("country")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="address">
                    Address
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="address" type="text" placeholder="address" name="address" value="{{ old('address') }}">
                @error("address")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="start_date">
                    Start Date
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="start_date" type="date" placeholder="start_date" name="start_date" value="{{ old('start_date') }}">
                @error("start_date")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="end_date">
                    End Date
                </label>
                <input
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="end_date" type="date" placeholder="end_date" name="end_date" value="{{ old('end_date') }}">
                @error("end_date")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="description">
                    Description
                </label>

                <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4"
                    name="description">{{ old('description') }}</textarea>
                @error("description")
                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                    Image
                </label>
                <input type="file" class="w-full px-3 py-2 text-gray-700 border rounded" name="image">
                @error("image")
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
</body>

</html>
