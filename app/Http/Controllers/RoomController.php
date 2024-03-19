<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\hotel;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');
    
        if ($sort === 'hotel_name') {
            $rooms = Rooms::join('hotels', 'rooms.hotel_id', '=', 'hotels.id')
                          ->select('rooms.*', 'hotels.hotel_name as hotel_name')
                          ->orderBy('hotels.hotel_name', $order)
                          ->get();
        } else {
            $rooms = Rooms::orderBy($sort, $order)->get();
        }
    
        return view('rooms.index', compact('rooms', 'order'));
    }

    public function create($hotel_id = null)
    {
        $hotels = Hotel::all();
        $selectedHotel = null;
    
        if ($hotel_id) {
            $selectedHotel = Hotel::find($hotel_id);
            if (!$selectedHotel) {
                return redirect()->route('hotel.index')->withErrors('Hotel not found.');
            }
        }
    
        return view('rooms.create', compact('hotels', 'selectedHotel'));
    }
    
    
    public function store(Request $request)
    {
        Rooms::create($request->all());
        return redirect()->route('rooms.index');
    }
    
    public function edit($id)
    {
        $room = Rooms::find($id);
        $hotels = hotel::all();
        return view('rooms.edit', compact('room', 'hotels'));
    }
    
    public function update(Request $request, $id)
    {
        $room = Rooms::find($id);
        $room->room_name = $request->get('room_name');
        $room->hotel_id = $request->get('hotel_id');
        $room->is_reserved = $request->has('is_reserved');
        $room->save();

        return redirect()->route('rooms.index');
    }

    public function destroy(Request $request)
    {
        $room = Rooms::find($request->get('id'));
        $room->delete();
        return redirect()->route('rooms.index');
    }

    public function releaseRoom(Request $request, $roomId) {
        $room = Rooms::findOrFail($roomId);
        $room->update([
            'is_reserved' => false, 
            'user_id' => null
        ]);
        return redirect()->back();
    }

}
