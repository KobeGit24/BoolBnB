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
        
        
        return view('welcome', compact('data_sponsorship'));
    }

    // RICERCA 
    public function search(Request $request){
        
        // Dovra tornare un array di proprietà che sono nella stessa città 
        $properties_same_city = Property::where('city', 'LIKE', $request -> city) -> get();

        foreach($properties_same_city as $property){
            
            $property['services'] = $this -> getServices($property -> id);
            $property['imgs'] = $this -> getImgs($property -> id);
        }

        $sponsorhips_valide = Sponsorship::where('end_date', '>', date("Y/m/d")) -> get();
        
        $sponsorships_same_city = [];

        foreach($sponsorhips_valide as $sponsor){
            $property = $sponsor -> property;

            if($property -> city == $request -> city){
                array_push($sponsorships_same_city, $property);
            }
        }

        foreach($sponsorships_same_city as $property){
            $property['services'] = $this -> getServices($property -> id);
            $property['imgs'] = $this -> getImgs($property -> id);
        }

        return view('search', compact('properties_same_city', 'sponsorships_same_city'));
       
    }

    // Funzione che Restituisce in un array i servizi di una proprietà 
    private function getServices($id){
        $services = Property_service::where('property_id', '=', $id) -> get();
        $name_services = [];

        foreach($services as $service){
            array_push($name_services, $service -> service -> name);
        }

        return $name_services;
    }

    // Funzione che restituisce in un array le immagini di una proprietà
    private function getImgs($id){
        $imgs = Property_img::where('property_id', '=', $id) -> get();
        $name_imgs = [];

        foreach($imgs as $img){
            array_push($name_imgs, $img -> img);
        }

        return $name_imgs;
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