<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Manager</title>

    <link rel="stylesheet" href="../../resources/css/hotel.css">
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
                    <h1>Ajout d'une CHAMBRE</h1>

                    <hr>

                    <form action="{{ route('rooms.store') }}" method="POST">
                        @csrf
                    
                        @if($selectedHotel)
                            <input type="hidden" name="hotel_id" value="{{ $selectedHotel->id }}">
                        @else
                            <select name="hotel_id" id="hotel_id">
                                <option value="">Select a Hotel</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" {{ (old('hotel_id') == $hotel->id) ? 'selected' : '' }}>{{ $hotel->hotel_name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <br>
                        <label for="name">Nom</label>
                        <input type="text" name="room_name" id="name">
                        <br>
                        
                        <button type="submit">Ajouter</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    



</body>
</html>