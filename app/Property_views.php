<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_views extends Model
{
    protected $table = 'property_views';

    protected $fillable = [
        'date',
        'property_id'
    ];
}
