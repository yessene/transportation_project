<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        'registration_number',
'brand',
'type',
'category',
'circulation_date',

'mutation',
'validity_date',
'model',
'chassis_number',
'weight',


    ];
    public function travels()
{
    return $this->belongsToMany(travel::class, 'travel_vehicle');
}
}
