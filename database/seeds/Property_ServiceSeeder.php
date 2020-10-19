<?php

use Illuminate\Database\Seeder;

use App\Property_service;
use App\Property;
use App\Service;

class Property_ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property_service::class, 50) 
            -> make()
            -> each( function($link) {
                $property = Property::inRandomOrder() -> first();
                $service = Service::inRandomOrder() -> first();

                $link -> property() -> associate($property);
                $link -> service() -> associate($service);

                $link -> save();
            });
    }
}
