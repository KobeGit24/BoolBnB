<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_img extends Model
{
    protected $table = 'property_img';

    protected $fillable = [
        'property_img',
        'deleted',
        'property_id'
    ];
}
