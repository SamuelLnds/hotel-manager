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
                {{ __('Hôtels') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">
                        <h1>Ajout d'un HOTEL</h1>

                        <hr>

                        <form action="{{ route('hotel.store') }}" method="POST">
                            @csrf

                            <label for="name">Nom</label>
                            <input type="text" name="hotel_name" id="name">
                            <br>

                            <label for="city">Ville</label>
                            <input type="text" name="city" id="city">
                            <br>

                            <label for="contactEmail">E-mail de contact</label>
                            <input type="email" name="contact_email" id="contactEmail">
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