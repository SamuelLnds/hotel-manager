<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Manager</title>

    <link rel="stylesheet" href="../../resources/css/hotel.css">

</head>
<body>


    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$hotel->hotel_name}}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">

                        <h1>{{$hotel->hotel_name}}</h1>

                        <hr />
                                            
                        <a href="{{ route('rooms.create', ['hotel_id' => $hotel->id]) }}">Ajouter une chambre</a>

                    
                        <hr />

                        <table class="view-table">
                            <thead>
                                <tr>
                                    <th>Ville</th>
                                    <th>Email de contact</th>
                                    <th>Nombre de chambres</th>
                                    <th>Chambres disponibles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $hotel->city }}</td>
                                    <td>{{ $hotel->contact_email }}</td>
                                    <td>
                                        <?php $room_total = 0; ?>
                                        @foreach ($rooms as $room)
                                                <?php $room_total++; ?>
                                        @endforeach
                                        {{ $room_total }}
                                    </td>
                                    <td>
                                        <?php $available_room_total = 0; ?>
                                        @foreach ($rooms as $room)
                                            @if ($room->is_reserved == false)
                                                <?php $available_room_total++; ?>
                                            @endif
                                        @endforeach
                                        {{ $available_room_total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="room-list">
                            <div class="checkbox-wrap">
                                <label for="availableRoomFilter">Afficher uniquement les chambres disponibles</label>
                                <input type="checkbox" name="available_room_filter" id="availableRoomFilter">
                            </div>
                            
                            @foreach ($rooms as $room)
                            <div class="room-card" data-reserved="{{ $room->is_reserved ? 'true' : 'false' }}">
                                <span class="room-name">
                                    Chambre {{ $room->room_name }}
                                </span>
                                <span class="room-status">
                                    @if ($room->is_reserved)
                                        : réservée par {{ $room->user ? $room->user->name : '?' }}
                                        <form action="{{ route('rooms.release', $room->id) }}" method="POST" class="index-form release-room-btn">
                                            @csrf
                                            @method('POST')
                                            <button type="submit">Rendre Disponible</button>
                                        </form>
                                    @else
                                        : disponible
                                    @endif
                                </span>
                            </div>
                        @endforeach
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const availableRoomFilter = document.getElementById('availableRoomFilter');
            availableRoomFilter.addEventListener('change', function() {
                const showOnlyAvailable = this.checked;
                const rooms = document.querySelectorAll('.room-card');
    
                rooms.forEach(room => {
                    const isReserved = room.getAttribute('data-reserved') === 'true';
                    if (showOnlyAvailable && isReserved) {
                        room.style.display = 'none';
                    } else {
                        room.style.display = '';
                    }
                });
            });
        });
    </script>


</body>
</html>