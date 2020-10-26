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

class UprController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show Dashboard
    public function show()
    {
        $properties = Property::where('user_id', '=', Auth::id()) -> get();
        $requests = Property_Request::where('user_id', '=', Auth::id()) -> get();
        
        return view('dashboard', compact('properties', 'requests'));
    }

    // Form di aggiornamento
    public function update(){
        return view('upr-update');
    }

    // Store aggiornamento
    public function store(Request $request){

        $validateData = $request -> validate([
            'firstname' => ['string', 'max:255'],
            'lastname' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['string', 'min:8'],
            'date_of_birth' => ['date']
        ]);

        $data = $request -> all();
        $data['password'] = Hash::make($data['password']);

        $usr = User::findOrFail(Auth::id());
        $usr -> update($data);

        return redirect() -> route('dashboard');
    }

    public function create()
    {
        $services = Service::all();

        return view('create-property', compact('services'));
    }

    public function property_store(Request $request){
        
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

        return redirect() -> route('dashboard');
        }
    
    public function delete($id){
        $property = Property::findOrFail($id);

        $property -> update(['deleted' => 1]);
        return redirect() -> route('dashboard');
    }

    public function property_edit($id){

    }


}
