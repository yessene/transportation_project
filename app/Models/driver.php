<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $fillable = [
        /*there are 27 here too*/
        'Name',
'First_Name',
'Date_of_Birth',
'ID_Number',
'Phone',
'Gender',
'Address',
'Nationality',
'Transport',
'City',
'Registration_Number',
'Hire_Date',
'Departure_Date',
'Social_Security',
'Marital_Status',
'Type',
'Image',


    ];
    public function travels()
    {
        return $this->belongsToMany(travel::class, 'travel_driver');
    }

}
