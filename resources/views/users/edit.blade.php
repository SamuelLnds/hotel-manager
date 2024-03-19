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
                {{ __('Utilisateurs') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">
                        <h1>Modification d'un UTILISATEUR</h1>

                        <hr>

                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}">
                                <br>
                            
                                <label for="contactEmail">E-mail</label>
                                <input type="email" name="email" id="contactEmail" value="{{ $user->email }}">
                                <br>

                                
                                <div class="checkbox-wrap">
                                    <label for="admin_checkbox">L'utilisateur est admin</label>
                                    <input type="checkbox" name="is_admin" id="admin_checkbox" {{ $user->is_admin ? 'checked' : '' }}>
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