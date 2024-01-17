<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tripsFrom()
    {
        return $this->hasMany(Trip::class, 'from_location');
    }

    public function tripsTo()
    {
        return $this->hasMany(Trip::class, 'to_location');
    }
}
