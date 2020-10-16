<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Sponsorship extends Model
{
    protected $table = 'type_sponsorship';

    protected $fillable = [
        'name',
        'price'
    ];
}
