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
    // public function property_service(){
    //     return $this -> hasMany(Property_service::class);
    // }
    public function apartments() {
    return $this->belongsToMany(Property_service::class);
    }
}
