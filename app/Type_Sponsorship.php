<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Tipo Sponsorizzazione

class Type_Sponsorship extends Model
{
    // Nome tabella
    protected $table = 'type_sponsorship';

    protected $fillable = [
        'name',
        'price'
    ];

    // Per ogni tipo sponsorizzazione ci sono più sponsorizzazioni con questo tipo
    public function sponsorship(){
        return $this -> HasMany(Sponsorship::class);
    }
}
