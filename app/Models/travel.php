<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class travel extends Model
{
    use HasFactory;
    protected $table = 'travels';
    protected $fillable = [
        'travel_name',
        'con',
        'origin',
        'destination',
        'departure_date',
        'arival_date',
        'kilometers',
        'days_abroad',
        'seals',
        'observation',
    ];

    public function vehicles()
{
    return $this->belongsToMany(Vehicle::class, 'travel_vehicle');
}
public function drivers()
{
    return $this->belongsToMany(driver::class, 'travel_driver');
}   
public function clients()
{
    return $this->belongsToMany(Client::class, 'travel_client');
}   
public function marchandises()
{
    return $this->belongsToMany(Marchandise::class, 'travel_marchandise');
}  
}
