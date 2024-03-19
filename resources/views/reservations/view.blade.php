<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Manager</title>

    <link rel="stylesheet" href="../../resources/css/hotel.css">
    <link rel="stylesheet" href="resources/css/hotel.css">

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

                        <table class="view-table">
                            <thead>
                                <tr>
                                    <th>Ville</th>
                                    <th>Email de contact</th>
                                    <th>Chambres disponibles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $hotel->city }}</td>
                                    <td>{{ $hotel->contact_email }}</td>
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
                            
                            @foreach ($rooms as $room)
                                @if ($room->is_reserved == false)
                                <div class="room-card">
                                    <span class="room-name">
                                        Chambre {{ $room->room_name }} 
                                    </span>
                                    <span class="room-status">
                                        : disponible
                                    </span>
                                    <form action="{{ route('reservations.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="roomId" value="{{ $room->id }}">
                                        <button type="submit" class="reservation-btn" onclick="openModal('{{ $room->room_name }}', '{{ $hotel->hotel_name }}')">Réserver</button>
                                    </form>
                                </div>
                                @endif
                            @endforeach
                        </div>

                        <div id="reservationModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p id="modalText">Some text in the Modal..</p>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        function openModal(roomName, hotelName) {
        var modal = document.getElementById("reservationModal");
        var span = document.getElementsByClassName("close")[0];
        var modalText = document.getElementById("modalText");
        modal.style.display = "block";
        modalText.innerHTML = "Vous avez réservé la chambre " + roomName + " à l'hôtel " + hotelName + ".";
        
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }

    </script>

</body>
</html>