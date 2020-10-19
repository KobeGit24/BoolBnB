<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Visualizzazioni Proprietà 

class Property_views extends Model
{
    // Nome tabella
    protected $table = 'property_views';

    protected $fillable = [
        'date',
        'property_id'
    ];

    // Per ogni visualizzazione c'è una sola proprietà
    public function property(){
        return $this -> belongsTo(Property::class);
    }
}
