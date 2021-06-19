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
    @foreach ($festivals as $festival)
        <div>
            {{ $festival->name }}
        </div>
        <div>
            {{ $festival->city }}
        </div>
        <div>
            {{ $festival->country }}
        </div>
        <div>
            {{ $festival->start_date }}
        </div>
        <div>
            {{ $festival->end_date }}
        </div>
        <div>
            {{ $festival->address }}
        </div>
        <div>
            <img src="/storage/{{$festival->image}}" alt="">
        </div>
    @endforeach
</body>

</html>
