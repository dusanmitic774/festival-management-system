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
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Place
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Date
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">View</span>
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Delete</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($festivals as $festival)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $festival->name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $festival->country }},
                                                            {{ $festival->city }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $festival->start_date }}
                                                            - {{ $festival->end_date }}
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <span
                                                            class="text-indigo-600 cursor-pointer hover:text-indigo-900 visitors-button">People</span>

                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <a href="{{ route('festivals.edit', $festival) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                        <form action="{{ route('festivals.delete', $festival) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit"
                                                                class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <td colspan="4" class="hidden visitors">
                                                        <div>
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead class="bg-green-50">
                                                                    <tr>
                                                                        <th class="px-6 text-xs font-medium text-left text-gray-500">
                                                                            First Name
                                                                        </th>
                                                                        <th class="px-6 text-xs font-medium text-left text-gray-500">
                                                                            Last Name
                                                                        </th>
                                                                        <th class="px-6 text-xs font-medium text-left text-gray-500">
                                                                            Email Name
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            @foreach ($festival->visitors as $visitor)
                                                                <tr>
                                                                    <td class="px-6 py-1 whitespace-nowrap">
                                                                        {{ $visitor->first_name }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $visitor->last_name }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $visitor->email }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                {{ $festivals->links() }}
            </div>
        </div>
        @if (session()->has('success'))

            <div class="fixed px-4 py-2 text-sm text-white bg-green-500 rounded-xl bottom-3 right-3">
                <p>{{ session('success') }}</p>
            </div>

        @endif
    </div>

    <script charset="utf-8">
        let visitorsButton = document.getElementsByClassName("visitors-button");
        let visitors = document.getElementsByClassName("visitors");

        for (let i = 0; i < visitorsButton.length; i++) {
            visitorsButton[i].addEventListener('click', function() {
                visitors[i].classList.toggle("hidden")
            })
        }

    </script>
</x-app-layout>
