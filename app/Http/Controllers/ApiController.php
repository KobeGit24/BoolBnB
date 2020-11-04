<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Property;
use App\Service;
use App\Sponsorship;

class ApiController extends Controller
{
  public function apiSearch(Request $request) {

    $floors = $request->input('floors');
    $beds = $request->input('beds');
    $wifi = $request->input('wifi');
    $parking = $request->input('parking');
    $pool = $request->input('pool');
    $sauna = $request->input('sauna');
    $seaView = $request->input('seaView');
    $concierge = $request->input('concierge');
    $sponsors = $request->input('sponsors');

    $queryProperty = Property::query();


    if ($wifi == 'checked') {
      $queryProperty->whereHas('services', function (Builder $query) {
        $query->where('service_id', '=', '1');
      });
    }

    if ($parking == 'checked') {
      $queryProperty->whereHas('services', function (Builder $query) {
        $query->where('service_id', '=', '2');
      });
    }

    if ($pool == 'checked') {
      $queryProperty->whereHas('services', function (Builder $query) {
        $query->where('service_id', '=', '3');
      });
    }

    if ($concierge == 'checked') {
      $queryProperty->whereHas('services', function (Builder $query) {
        $query->where('service_id', '=', '4');
      });
    }

    if ($sauna == 'checked') {
      $queryProperty->whereHas('services', function (Builder $query) {
        $query->where('service_id', '=', '5');
      });
    }

    if ($seaView == 'checked') {
      $queryProperty->whereHas('services', function (Builder $query) {
        $query->where('service_id', '=', '6');
      });
    }

    if ($floors) {
      $queryProperty->where('floors', ">=", $floors);
    }

    if ($beds) {
      $queryProperty->where('beds', ">=", $beds);
    }

    $queryPropertySponsor = Sponsorship::where('end_date', '>', date("Y/m/d"));

    // dd($queryPropertySponsor);

    $prop = $queryProperty->get();
    $propPromo = $queryPropertySponsor->get();

    
    return response()->json([
          'sponsored' => $propPromo,
          'normal' => $prop,
    ]);
    // return response()->json($prop);
  }
}
