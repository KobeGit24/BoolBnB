<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Richiesta

class Property_Request extends Model
{

    // Nome tabella
    protected $table = 'property_requests';

    protected $fillable = [
        'user_email',
        'firstname',
        'lastname',
        'number',
        'text',
        'property_id',
        'user_id'
    ];

    // Per ogni richiesta c'è una sola proprietà 
    public function property(){
        return $this -> belongsTo(Property::class);
    }

    public function user(){
        return $this -> belongsTo(User::class);
    }
}
