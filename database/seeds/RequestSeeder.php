<?php

use Illuminate\Database\Seeder;
use App\Request;
use App\Property;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Request::class, 20) 
            -> make()
            -> each( function($request) {
                $property = Property::inRandomOrder() -> first();
                $request -> property() -> associate($property);

                $request -> save();
            });
    }
}
