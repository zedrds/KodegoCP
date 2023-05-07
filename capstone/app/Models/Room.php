<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }
    public function features()
    {
        return $this->belongsToMany(Amenity::class, 'room_features');
    }
}
