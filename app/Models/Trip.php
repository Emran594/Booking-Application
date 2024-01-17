<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'date',
        'title',
        'from_location',
        'to_location',
        'bus_id', // Add bus_id to the $fillable array
        'fare',
        'status',
    ];

    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
}
