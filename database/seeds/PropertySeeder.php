<?php

use App\Property;
use App\User;

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property::class, 200) 
            -> make()
            -> each( function($property) {
                $usr = User::inRandomOrder() -> first();
                $property -> user() -> associate($usr);

                $property -> save();
            });

    }
}
