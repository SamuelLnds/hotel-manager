<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Manager</title>

    <link rel="stylesheet" href="../../../resources/css/hotel.css">

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
                        <h1>Modification d'une CHAMBRE</h1>

                        <hr>

                        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label for="hotel">Hôtel</label>
                            <select name="hotel_id" id="hotel">
                                <option selected value="{{ $room->hotel->id }}">{{ $room->hotel->hotel_name }}</option>
                                @foreach ($hotels as $hotel)
                                    @if ($hotel->id != $room->hotel_id)
                                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>

                            <label for="name">Nom</label>
                            <input type="text" name="room_name" id="name" value="{{$room->room_name}}">
                            <br>

                            <div class="checkbox-wrap">
                                <label for="reservation">Chambre réservée</label>
                                <input type="checkbox" name="is_reserved" id="reservation" {{ $room->is_reserved ? 'checked' : '' }}>
                            </div>
                            <br>
                            
                            <button type="submit">Modifier</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    



</body>
</html>