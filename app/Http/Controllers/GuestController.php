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
        $data_property = [];

        foreach($data_sponsorship as $spons){
            array_push($data_property, $spons -> property);
        }
        dd($data_property);
        return view('home', compact('data_property'));
    }
}
