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
                {{ __('Vos réservations') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">
                        <h1>VOS RESERVATIONS</h1>
                    
                        <hr>

                        <table class="grid-user-bookings">
                            <thead>
                                <tr>
                                    <th>Hôtel</th>
                                    <th>Ville</th>
                                    <th>Chambre réservée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td><span class="hotel-name">{{ $room->hotel->hotel_name }}</span></td> 
                                        <td><span class="hotel-city">{{ $room->hotel->city }}</span></td>
                                        <td><span class="room-name">Chambre {{ $room->room_name }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    

                    
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    



</body>
</html>