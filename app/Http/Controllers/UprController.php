<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UprController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {

    return view('dashboard');
  }

  public function create()
  {
    return view('create-property');
  }
}
