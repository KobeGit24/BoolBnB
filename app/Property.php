<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'state',
        'city',
        'address',
        'lat', // Latitudine 
        'lng', // Longitudine
        'm2',
        'floor',
        'beds',
        'bathrooms',
        'available',
        'description',
        'deleted',
        'user_id'
    ];
}
