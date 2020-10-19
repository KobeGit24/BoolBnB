<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Servizio

class Service extends Model
{
    // Nome tabella gestito da Laravel

    protected $fillable = [
        'name'
    ];

    // per ogni servizio ci sono più proprietà
    public function property_service(){
        return $this -> HasMany(Property_service::class);
    }
}
