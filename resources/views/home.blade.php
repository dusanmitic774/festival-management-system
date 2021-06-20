@extends('layouts.main')

@section('content')
    <div class="container px-4 mx-auto my-36 md:px-12">
        <div class="mb-16 text-4xl text-center">
            <h1>Festivals</h1>
        </div>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($festivals as $festival)
                <!-- Column -->
                <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article --> <article class="overflow-hidden rounded-lg shadow-lg">

                        <a href="{{ route("festivals.show", $festival) }}"><img alt="Placeholder" class="block w-full h-auto" src="storage/{{ $festival->image }}">
                        </a>

                        <header class="flex items-center justify-between p-2 leading-tight md:p-4">
                            <h1 class="text-lg">
                                <a class="text-black no-underline hover:underline" href="#">
                                    {{ $festival->name }}
                                </a>
                            </h1>
                            <p class="text-sm text-grey-darker">
                                {{ \Carbon\Carbon::parse($festival->start_date)->format('d M, Y') }}
                                -
                                {{ \Carbon\Carbon::parse($festival->end_date)->format('d M, Y') }}
                            </p>
                        </header>

                        <div class="py-1 md:p-4">
                                <p class="text-sm text-gray-500 sm:text-base line-clamp-3">
                                    Country: {{ $festival->country }}
                                </p>
                                <p class="text-sm text-gray-500 sm:text-base line-clamp-3">
                                    City: {{ $festival->city }}
                                </p>
                                <p class="text-sm text-gray-500 sm:text-base line-clamp-3">
                                    Address: {{ $festival->address }}
                                </p>
                        </div>

                        <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                            <button
                                class='flex items-center px-3 py-1 border border-gray-300 rounded-full gap-1 sm:text-lg hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'>
                                <a href="{{ route('festivals.show', $festival) }}"><span>Read More</span></a>
                            </button>
                            <button
                                class='flex items-center px-3 py-1 ml-auto border border-gray-300 rounded-full gap-1 sm:text-lg hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'>
                                <a href="{{ route('visitors.create', $festival) }}"><span>Join</span></a>
                            </button>
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
                <!-- END Column -->
            @endforeach
        </div>
        {{ $festivals->links() }}
    </div>
    @if (session()->has('error'))

        <div class="fixed px-4 py-2 text-sm text-white bg-red-500 rounded-xl bottom-3 right-3">
            <p>{{ session('error') }}</p>
        </div>

    @endif
@endsection
