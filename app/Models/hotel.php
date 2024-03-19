<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name',
        'city',
        'contact_email',
    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }
}
