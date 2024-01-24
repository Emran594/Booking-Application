<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['bus_name', 'model', 'driver_name', 'phone'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    protected $table = 'buss';

    public function seats()
    {
        return $this->hasMany(Seat::class);
        // Adjust the relationship type and model accordingly
        
    }

}
