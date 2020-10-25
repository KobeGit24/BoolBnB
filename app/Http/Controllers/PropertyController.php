<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Property;
use App\Property_service;
use App\Property_request;

class PropertyController extends Controller
{

  public function show($id) {

    $prop = Property::findOrFail($id);
    $services = Property_service::all();

    return view('property-show', compact('prop', 'services'));
  }


  public function search(Request $request) {

    $requestInput = $request->all();

    // dd($requestInput);

    return view('search', compact('requestInput'));
  }

  public function store_request(Request $request, $id){

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
    
    return redirect() -> route('home');
  }
}
