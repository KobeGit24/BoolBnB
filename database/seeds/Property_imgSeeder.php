<?php

use App\Property_img;
use App\Property;
use Illuminate\Database\Seeder;

class Property_imgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property_img::class, 200) 
            -> make()
            -> each( function($property_img) {
                $property = Property::inRandomOrder() -> first();
                $property_img -> property() -> associate($property);

                $property_img -> save();
            });
    }
}
