<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Sponsorship;
use App\Property;
use App\Property_service;
use App\Property_img;

// COSTANTI
define('N_ANNUNCI', 4);

class GuestController extends Controller
{
    // HOMEPAGE
    public function index(){

        // Import data
        $data_sponsorship = Sponsorship::where('end_date', '>', date("Y/m/d")) -> take(N_ANNUNCI) -> get();
        $data_property = Property::all();

        // Array dati da restituire
        $data_output = [];

        // Se non è vuoto
        if(count($data_sponsorship) > 0){
            // Per ogni sponsorship estratta
            foreach($data_sponsorship as $cosa){
              array_push($data_output, $cosa -> property);
            }
        }

        while( count($data_output) < N_ANNUNCI ){
            $proprieta_random = Property::inRandomOrder() -> first();
            array_push($data_output, $proprieta_random);
        }

        return view('home', compact('data_property'));
    }
}

/*
[
    proprieta1
    [
        id,
        city,
        name,
        ecc,
        ecc,

        [
            wifi,
            parcheggio,
            ecc,
            ecc,
        ],

        [
            img1,
            img2,
            img3
        ]
    ],

    proprieta2
    [
        id,
        city,
        name,
        ecc,
        ecc,

        [
            wifi,
            parcheggio,
            ecc,
            ecc,
        ],

        [
            img1,
            img2,
            img3
        ]
    ]

]
*/
