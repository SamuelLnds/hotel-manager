<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Manager</title>

    <link rel="stylesheet" href="../resources/css/hotel.css">

</head>
<body>


    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Réservations') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">
                        <h1>RESERVATIONS</h1>
                    
                        <hr>

                        <div class="reservation-grid">
                            @foreach ($hotels as $hotel)
                            <a class="reservation-card" href="{{ route('reservations.view', $hotel->id) }}">
                                <span class="reservation-hotel-name">
                                    {{ $hotel->hotel_name }}
                                </span>
                                <span class="reservation-room-number">
                                    Nombre de chambres disponibles : {{ $hotel->rooms_count }}
                                </span>
                            </a>
                            @endforeach
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    



</body>
</html>