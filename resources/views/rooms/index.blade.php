<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Manager</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=advent-pro:400" rel="stylesheet" />

    <link rel="stylesheet" href="../resources/css/hotel.css">

</head>
<body>


    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Chambres') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">
                        <h1>ROOM MANAGER</h1>
                    
                        <hr />
                    
                        <a href="{{ route('rooms.create') }}">Ajouter une chambre</a>
                    
                        <hr />
                    
                        <table>
                            <thead>
                                <tr>
                                    <th><a href="?sort=id&order={{ $order === 'asc' ? 'desc' : 'asc' }}">ID</a></th>
                                    <th><a href="?sort=hotel_name&order={{ $order === 'asc' ? 'desc' : 'asc' }}">Hôtel</a></th>
                                    <th><a href="?sort=room_name&order={{ $order === 'asc' ? 'desc' : 'asc' }}">Nom</a></th>
                                    <th><a href="?sort=is_reserved&order={{ $order === 'asc' ? 'desc' : 'asc' }}">Est réservée</a></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td><a href="{{ route('hotel.view', $room->hotel->id) }}">{{ $room->hotel->hotel_name }}</a></td>
                                        <td>{{ $room->room_name }}</td>
                                        <td class="checkbox_td"><input class="room_checkbox" type="checkbox" {{ $room->is_reserved ? 'checked' : '' }} disabled></td>
                                        <td>
                                            <a href="{{ route('rooms.edit', $room->id) }}">Modifier</a>
                                            <hr>
                                            <form action="{{ route('rooms.destroy') }}" method="POST" class="index-form">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $room->id }}">
                                                <button type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('rooms.index') }}" class="sort-reset" data-tooltip="Réinitialiser le tri"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#ffffff" d="M3.9 22.9C10.5 8.9 24.5 0 40 0H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L396.4 195.6C316.2 212.1 256 283 256 368c0 27.4 6.3 53.4 17.5 76.5c-1.6-.8-3.2-1.8-4.7-2.9l-64-48c-8.1-6-12.8-15.5-12.8-25.6V288.9L9 65.3C-.7 53.4-2.8 36.8 3.9 22.9zM432 224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm59.3 107.3c6.2-6.2 6.2-16.4 0-22.6s-16.4-6.2-22.6 0L432 345.4l-36.7-36.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6L409.4 368l-36.7 36.7c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L432 390.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6L454.6 368l36.7-36.7z"/></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    



</body>
</html>