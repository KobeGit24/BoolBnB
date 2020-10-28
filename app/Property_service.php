<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Servizi Proprietà

class Property_service extends Model
{
    // Nome tabella
    protected $table = 'property_service';

    protected $fillable = [
        'property_id',
        'service_id'
    ];

    // Per ogni servizio proprietà c'è una sola proprietà
    public function property(){
        return $this ->belongsTo(Property::class);
    }

    // Per ogni servizio c'è un solo tipo di servizio
    public function service(){
        return $this ->belongsTo(Service::class);
    }
}
