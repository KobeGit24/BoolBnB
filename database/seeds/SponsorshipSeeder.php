<?php

use Illuminate\Database\Seeder;

use App\Sponsorship;
use App\Property;
use App\Type_Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsorship::class, 50) 
            -> make()
            -> each( function($sponsorship) {
                $property = Property::inRandomOrder() -> first();
                $type = Type_Sponsorship::inRandomOrder() -> first();

                $sponsorship -> property() -> associate($property);
                $sponsorship -> type_sponsorship() -> associate($type);

                $sponsorship -> save();
            });
    }
}
