<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
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
