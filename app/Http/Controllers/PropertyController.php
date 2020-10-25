<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Property;
use App\Service;

class PropertyController extends Controller
{

  public function show($id) {

    $prop = Property::findOrFail($id);
    $services = Service::all();

    return view('property-show', compact('prop', 'services'));
  }


  public function search(Request $request) {

    $requestInput = $request->all();

    // dd($requestInput);

    return view('search', compact('requestInput'));
  }
}
