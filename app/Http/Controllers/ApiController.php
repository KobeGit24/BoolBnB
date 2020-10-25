<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class ApiController extends Controller
{
  public function apiResearch(Request $request) {

    $prop = Property::all();

    // dd($prop);

    return response()->json($prop);
  }
}
