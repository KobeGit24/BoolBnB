<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Prorietà

class Property extends Model
{
    // Nome tabella gestito da Laravel

    protected $fillable = [
        'name',
        'state',
        'city',
        'address',
        'lat', // Latitudine
        'lng', // Longitudine
        'm2',
        'floors',
        'beds',
        'bathrooms',
        'available',
        'description',
        'deleted',
        'user_id'
    ];

    // Per ogni proprietà c'è un solo user
    public function user(){
        return $this ->belongsTo(User::class);
    }

    // Per ogni proprietà ci sono più immagini
    public function property_img(){
        return $this ->hasMany(Property_img::class);
    }

    // Per ogni proprietà ci sono piú visualizzazioni
    public function property_views(){
        return $this ->hasMany(Property_views::class);
    }

    // Per ogni proprietà ci sono piú richieste
    public function request(){
        return $this ->hasMany(Request::class);
    }

    // Per ogni proprietà ci sono piú sponsorizzazioni
    public function sponsoriship(){
        return $this ->hasMany(Sponsoriship::class);
    }

    // Per ogni proprietà ci sono piú servizi
    // public function property_service(){
    //     return $this -> hasMany(Property_service::class);
    // }
    public function services() {
    return $this->belongsToMany('App\Service', 'property_service');
}
}
