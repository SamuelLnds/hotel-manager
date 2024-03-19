<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Rooms;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Samuel Landais',
            'email' => 'samuel.landais.pro@gmail.com',
            'password' => Hash::make('abcde12345'),
            'is_admin' => true,
        ]);

        $hotels = Hotel::factory(10)->create();

        $users = User::all();

        $hotels->each(function ($hotel) use ($users) {
            Rooms::factory(rand(5, 10))->create(['hotel_id' => $hotel->id])
                ->each(function ($room) use ($users) {
                    if (rand(0, 1)) {
                        $room->update([
                            'is_reserved' => true,
                            'user_id' => $users->random()->id,
                        ]);
                    }
                });
        });
    }
}
