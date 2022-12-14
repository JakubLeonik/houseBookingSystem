<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function bookings(){
        return $this->hasMany(Booking::class, 'house_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
