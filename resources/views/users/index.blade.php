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
                {{ __('Utilisateurs') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 hotel-index-content-wrapper">
                        <h1>USER MANAGER</h1>
                    
                        <hr>

                        <table>
                            <thead>
                                <tr>
                                    <th><a href="?sort=id&order={{ $order === 'asc' ? 'desc' : 'asc' }}">ID</a></th>
                                    <th><a href="?sort=name&order={{ $order === 'asc' ? 'desc' : 'asc' }}">Nom</a></th>
                                    <th><a href="?sort=is_admin&order={{ $order === 'asc' ? 'desc' : 'asc' }}">Est admin</a></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('hotel.view', $user->id) }}">{{ $user->name }}</a></td>
                                    <td class="checkbox_td"><input class="room_checkbox" type="checkbox" {{ $user->is_admin ? 'checked' : '' }} disabled></td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}">Modifier</a>
                                        <hr>
                                        <form action="{{ route('users.destroy') }}" method="POST" class="index-form">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </td>
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