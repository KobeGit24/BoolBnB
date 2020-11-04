<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Property;
use App\Property_service;
use App\Property_request;
use App\Property_views;

/*
    Questo controller ci sono:
    - show
    - search
    - store_request
*/


class PropertyController extends Controller
{

    // Funzione che restituisce la show di una proprietà
    public function show($id) {

        $prop = Property::findOrFail($id);
        $services = Property_service::all();

        // Se l'utente che lo vede non è il proprietario
        if(Auth::id() != $prop -> user_id){

            // Salva la visualizzazione
            $new_view = Property_views::create([
                'date' => date("Y-m-d H:i:s"),
                'property_id' => $prop -> id
            ]);
        }

        return view('property-show', compact('prop', 'services'));
    }


    // Restituisce tutte le proprietà, successivamente il front-end le filtra
    public function search(Request $request) {

        $requestInput = $request->all();

        // dd($requestInput);

        return view('search', compact('requestInput'));
    }

    // Salva nel DB una richiesta di un utente interessato verso una determinata proprietà
    public function store_request(Request $request, $id){

        // Validazione
        $validateData = $request -> validate([
        'firstname' => ['required','string', 'max:255'],
        'lastname' => ['required','string', 'max:255'],
        'email' => ['string', 'max:255'],
        ]);

        
        $data = $request -> all();
        
        $property = Property::findOrFail($id);
        $usr_id = $property -> user -> id;
        
        $data['user_id'] = $usr_id;
        $data['property_id'] = intval($id);
        
        $new_request = Property_request::create($data);
        
        // Ricarica la pagina corrente
        return redirect() -> route('prop.show', $id);
    }
}
