<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'society_name',
        'last_name',
        'first_name',
        'address' ,
'type' ,
'email' ,
'country',
'city' ,
'postal_code' ,
'relation_date',
'notes' ,
'phone1' ,
'phone2',

    ];
    public function travels()
    {
        return $this->belongsToMany(travel::class, 'travel_client');
    }


}
