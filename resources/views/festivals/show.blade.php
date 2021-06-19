@extends('layouts.main')

@section('content')
    <!-- component -->
    <div class="mx-auto mt-40 max-w-screen-lg">
        <div class="mt-12">
            <!-- featured section -->
            <div class="flex flex-wrap mb-16 md:flex-no-wrap space-x-0 md:space-x-6">
                <!-- main post -->
                <div class="relative block w-full p-4 mb-4 rounded lg:mb-0 lg:p-0 md:w-4/7">
                    <a href="{{ url('storage/' . $festival->image) }}">
                        <img src="{{ url('storage/' . $festival->image) }}" class="w-full h-96 object-fit rounded-md">
                    </a>
                    <div class="mt-8">
                        Country: <span class="mt-2 text-sm text-green-700 ">{{ $festival->country }}</span>
                    </div>
                    <div>
                        City: <span class="mt-2 text-sm text-green-700 ">{{ $festival->city }}</span>
                    </div>
                    <div>
                        Address: <span class="mt-2 text-sm text-green-700 ">{{ $festival->address }}</span>
                    </div>
                    <div>
                        Date: <span>
                            {{ \Carbon\Carbon::parse($festival->start_date)->format('d M, Y') }}
                            -
                            {{ \Carbon\Carbon::parse($festival->end_date)->format('d M, Y') }}
                        </span>
                    </div>

                    <h1 class="mt-2 mb-2 text-4xl font-bold leading-tight text-gray-800">
                        {{ $festival->name }}
                    </h1>
                    <p class="mb-4 text-gray-600">{{ $festival->description }}</p>
                    <a href="{{ route('visitors.create', $festival) }}"
                        class="inline-block px-6 py-3 mt-2 text-gray-100 bg-green-700 rounded-md">
                        Join
                    </a>
                </div>
            </div>
            <!-- main ends here -->
        </div>
    </div>
@endsection
