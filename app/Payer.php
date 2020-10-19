<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model Paganti

class Payer extends Model
{
    protected $fillable = [
        'user_id'
    ];

    // Per ogni pagante c'è un solo user
    public function user(){
        return $this -> belongsTo(User::class);
    }
}
