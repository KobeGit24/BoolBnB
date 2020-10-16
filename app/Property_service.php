<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_service extends Model
{
    protected $table = 'Property_service';

    protected $fillable = [
        'id_property',
        'id_service'
    ];
}
