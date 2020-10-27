<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Property;
use App\Property_Request;
use App\Service;
use App\Property_service;

/*
    Controller per gli utenti registrati

    Questo controller contiene:
    - show
    - update
    - store
    - create
    - property_store
    - delete
    - property_edit
    - property_edit_store
*/

class UprController extends Controller
{

    // Solo se autenticati
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show Dashboard - restituisce le proprietà e le richieste assegnate ad un determinato utente
    public function show()
    {
        $properties = Property::where('user_id', '=', Auth::id()) -> get();
        $requests = Property_Request::where('user_id', '=', Auth::id()) -> get();
        
        return view('dashboard', compact('properties', 'requests'));
    }

    // Form di aggiornamento utente
    public function update(){
        return view('upr-update');
    }

    // Store aggiornamento informazioni utente
    public function store(Request $request){

        // Validazione
        $validateData = $request -> validate([
            'firstname' => ['string', 'max:255'],
            'lastname' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8'],
            'date_of_birth' => ['date']
        ]);
        
        // Se nella request c`è un immagine allora la si imposta come profilo
        if ($request -> file('image') ){
            
            // Si ricava nome, estensione e percorso dell`immagine
            $file = $request -> file('image');
            $destinationPath = 'img_db/users/';
            $name_image = date('YmdHis');
            $profile_image = $name_image . '.' . $request -> image -> extension();
            $file -> move($destinationPath, $profile_image);

            // Si aggiorna il campo dell`usr
            $current_usr = User::findOrFail(Auth::id());
            $current_usr -> update(['img' => $profile_image]);
        }

        // Si aggiorano le altre informazioni, con hash password
        $data = $request -> all();
        $data['password'] = Hash::make($data['password']);

        $usr = User::findOrFail(Auth::id());
        $usr -> update($data);

        return redirect() -> route('dashboard');
    }

    // Restituisce la view per creare una nuova proprietà
    public function create(){
        $services = Service::all();

        return view('create-property', compact('services'));
    }

    // Salva la nuova proprietà
    public function property_store(Request $request){
        
        // Validazione
        $validateData = $request -> validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required','string', 'max:255'],
        'm2' => ['required', 'numeric'],
        'floors' => ['required', 'numeric', 'min:1'],
        'beds' => ['required','numeric', 'min:1'],
        'bathrooms' => ['required','numeric', 'min:1'],
        'full_address' => ['required']
        ]);
        
        $data = $request -> all();
        $new_property = Property::create($data);
        
        $property_id = (Property::latest() -> first()) -> id;
        
        // Salva i servizi associati alla nuova proprietà
        $services_db = Service::all();
        $services_array = [];

        foreach($services_db as $service){
            array_push($services_array, $service -> name);
        }
        
        foreach($services_array as $service){

            if(array_key_exists($service, $data)){
                $new_property_service = Property_service::create([
                    'property_id' => $property_id,
                    'service_id' => $data[$service]
                ]);
            }
        }

        // Redirect verso la home
        return redirect() -> route('dashboard');
    }
    
    // Rende non visibile una determinata proprietà
    public function delete($id){
        $property = Property::findOrFail($id);

        $property -> update(['deleted' => 1]);
        return redirect() -> route('dashboard');
    }

    // Restituisce la view per modificare una proprietà
    public function property_edit($id){

        $property = Property::findOrFail($id);
        $services = Service::all();

        return view('prop-edit', compact('property', 'services'));
    }

    // Salva le modifiche della proprietà
    public function property_edit_store(Request $request){

        // Validazione
        $validateData = $request -> validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'max:255'],
            'm2' => ['required', 'numeric'],
            'floors' => ['required', 'numeric', 'min:1'],
            'beds' => ['required','numeric', 'min:1'],
            'bathrooms' => ['required','numeric', 'min:1'],
            'full_address' => ['required']
        ]);

        $data = $request -> all();
        $property_update = Property::findOrFail($data['id_property_edit']);
        $property_update -> update($data);

        // Redirect verso la dashboard
        return redirect() -> route('dashboard');
    }


}
