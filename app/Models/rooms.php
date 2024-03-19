<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'user_id',
        'room_name',
        'is_reserved',
    ];

    public function hotel()
{
    return $this->belongsTo(hotel::class, 'hotel_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}




}
