@extends('layouts.main')

@section('content')
    @if (Route::has('login'))
        <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="container px-4 mx-auto my-48 md:px-12">
        <div class="mb-16 text-4xl text-center">
            <h1>Festivals</h1>
        </div>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($festivals as $festival)
                <!-- Column -->
                <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">

                        <a href="{{ url('storage/' . $festival->image) }}"><img alt="Placeholder" class="block w-full h-auto" src="storage/{{ $festival->image }}">
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

                        <div class="p-2 md:p-4">
                            <p class="text-sm text-gray-500 sm:text-base line-clamp-3">
                                {{ $festival->description }}
                            </p>
                        </div>

                        <footer class="flex items-center justify-between p-2 leading-none md:p-4">
                            <a class="flex items-center text-black no-underline hover:underline" href="#">
                                <p class="ml-2 text-sm">
                                    Author Name
                                </p>
                            </a>
                            <button
                                class='flex items-center px-3 py-1 ml-auto border border-gray-300 rounded-full gap-1 sm:text-lg hover:bg-gray-50 transition-colors focus:bg-gray-100 focus:outline-none focus-visible:border-gray-500'>
                                <a href="{{ route('visitors.create', $festival) }}"><span>Join</span></a>
                            </button>
                            {{-- <a class="no-underline text-grey-darker hover:text-red-dark" href="#"> --}}
                            {{-- <span class="hidden">Like</span> --}}
                            {{-- <i class="fa fa-heart"></i> --}}
                            {{-- </a> --}}
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
                <!-- END Column -->
            @endforeach
        </div>
        {{ $festivals->links() }}
    </div>
@endsection
