<?php

use Illuminate\Database\Seeder;

use App\Property_views;
use App\Property;

class Property_viewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property_views::class, 100) 
            -> make()
            -> each( function($property_view) {
                $property = Property::inRandomOrder() -> first();
                $property_view -> property() -> associate($property);

                $property_view -> save();
            });
    }
}
