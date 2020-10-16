<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'property_id',
        'type_sponsorship_id'
    ];
}
