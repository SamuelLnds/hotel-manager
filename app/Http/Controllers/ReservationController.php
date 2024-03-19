<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel;
use App\Models\Rooms;


class ReservationController extends Controller
{
    public function index() 
    {
        $hotels = Hotel::withCount(['rooms' => function ($query) {
            $query->where('is_reserved', false);
        }])->get();

        return view('reservations.index', compact('hotels'));
    }

    public function view($id)
    {
        $hotel = hotel::find($id);
        $hotel = Hotel::with('rooms')->find($id);
        $rooms = $hotel->rooms;
        return view('reservations.view', compact('hotel', 'rooms'));
    }

    public function store(Request $request)
    {
        $room = Rooms::findOrFail($request->roomId);
        $room->update([
            'is_reserved' => true, 
            'user_id' => auth()->id()
            ]);
        return redirect()->route('reservations.index');
    }
}
