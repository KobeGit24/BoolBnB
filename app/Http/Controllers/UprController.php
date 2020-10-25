<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Property;
use App\Property_Request;

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
    return view('create-property');
  }
}
