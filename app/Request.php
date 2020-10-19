<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Richiesta

class Request extends Model
{

    // Nome tabella gestito da laravel

    protected $fillable = [
        'user_email',
        'firstname',
        'lastname',
        'number',
        'text',
        'property_id'
    ];

    // Per ogni richiesta c'è una sola proprietà 
    public function property(){
        return $this -> belongsTo(Property::class);
    }
}
