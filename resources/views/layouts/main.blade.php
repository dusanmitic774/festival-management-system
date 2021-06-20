<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>

    <script>
        // Initialize and add the map
        function initMap() {
            const position = {
                lat: {{ $festival->latitude ?? 44.292401 }},
                lng: {{ $festival->longitude ?? 21.162583 }}
            }
            // The map, centered on Serbia
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: position,
            });
            marker = new google.maps.Marker({
                position: position,
                map: map,
            });
        }
    </script>
</head>

<body class="antialiased">
@if (Route::has('login'))
    <div class="fixed top-0 right-0 px-6 py-4">
        @auth
            <a href="{{ route("festivals.index") }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        @endauth
    </div>
@endif

@yield('content')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly"
    async
></script>
</body>

</html>
