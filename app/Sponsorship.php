<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Sponsorizzazione

class Sponsorship extends Model
{
    // Nome gestito da Laravel

    protected $fillable = [
        'start_date',
        'end_date',
        'property_id',
        'type_sponsorship_id'
    ];

    // Per ogni sponsorizzazione c'è una sola proprietà 
    public function property(){
        return $this -> belongsTo(Property::class);
    }

    // Per ogni sponsorizzazione c'è un solo tipo sponsorizzazione
    public function type_sponsorship(){
        return $this -> belongsTo(Type_sponsorship::class);
    }
}
