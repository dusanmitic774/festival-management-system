<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        // Initialize and add the map
        function initMap() {
            const serbia = {
                lat: 44.292401,
                lng: 21.162583
            }
            // The map, centered on Serbia
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: serbia,
            });
            map.addListener("click", (e) => {
                placeMarkerAndPanTo(e.latLng, map);
                addValuesToInputFields(e.latLng.lat(), e.latLng.lng())
            });
        }

        function placeMarkerAndPanTo(latLng, map) {
            if (typeof marker === "undefined") {
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                });
            } else {
                marker.setPosition(latLng);
            }
            map.panTo(latLng);
        }

        function addValuesToInputFields(lat, lng) {
            let latitude = document.getElementById("latitude").value = lat;
            let longitude = document.getElementById("longitude").value = lng;
        }

    </script>
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')

<!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly"
    async></script>
</body>

</html>
