<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel;


class HotelController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');
    
        $hotels = hotel::orderBy($sort, $order)->get();

        return view('hotel.index', compact('hotels', 'order'));
    }

    public function create()
    {
        return view('hotel.create');
    }

    public function store(Request $request)
    {
        hotel::create($request->all());
        return redirect()->route('hotel.index');
    }

    public function edit($id)
    {
        $hotel = hotel::find($id);
        return view('hotel.edit', compact('hotel'));
    }
    
    public function update(Request $request, $id)
    {
        $hotel = hotel::find($id);
        $hotel->hotel_name = $request->get('hotel_name');
        $hotel->city = $request->get('city');
        $hotel->contact_email = $request->get('contact_email');
        $hotel->save();

        return redirect()->route('hotel.index');
    }

    public function destroy(Request $request)
    {
        $hotel = hotel::find($request->get('id'));
        $hotel->delete();
        return redirect()->route('hotel.index');
    }

    public function view($id)
    {
        $hotel = hotel::find($id);
        $hotel = Hotel::with('rooms')->find($id);
        $hotel = Hotel::with(['rooms.user'])->find($id);
        $rooms = $hotel->rooms;
        return view('hotel.view', compact('hotel', 'rooms'));
    }
}
