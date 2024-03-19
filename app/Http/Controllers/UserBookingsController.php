<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class UserBookingsController extends Controller
{
    public function index(Request $request)
{
    $userId = auth()->id();
    $rooms = Rooms::where('user_id', $userId)->get();

    return view('bookings.index', compact('rooms'));
}

}
