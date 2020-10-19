<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Model di default Users

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'date_of_birth',
        'img',
        'visible'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // per ogni user ci sono più proprietà
    public function property(){
        return $this -> HasMany(Property::class);
    }

    // Per ogni user c`è un solo pagante
    public function payer(){
        return $this -> belongsTo(Payer::class);
    }
}
