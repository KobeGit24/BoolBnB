<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Immagini Proprietà 

class Property_img extends Model
{
    // Nome tabella
    protected $table = 'property_img';

    protected $fillable = [
        'img',
        'deleted',
        'property_id'
    ];

    // Per ogni immagine c'è una sola proprietà
    public function property(){
        return $this -> belongsTo(Property::class);
    }
}
