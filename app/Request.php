<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_email',
        'firstname',
        'lastname',
        'number',
        'text',
        'property_id'
    ];
}
