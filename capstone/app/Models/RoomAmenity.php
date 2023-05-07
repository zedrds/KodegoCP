<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function amenity()
    {
        return $this->belongsTo(Amenity::class);
    }
    
}
