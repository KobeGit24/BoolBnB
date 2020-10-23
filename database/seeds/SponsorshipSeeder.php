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
        // factory(Sponsorship::class, 50) 
        //     -> make()
        //     -> each( function($sponsorship) {
        //         $property = Property::inRandomOrder() -> first();
        //         $type = Type_Sponsorship::inRandomOrder() -> first();

        //         $sponsorship -> property() -> associate($property);
        //         $sponsorship -> type_sponsorship() -> associate($type);

        //         $sponsorship -> save();
        //     });

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/30',
            'property_id' => 1,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/15',
            'end_date' => '2020/10/18',
            'property_id' => 2,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/30',
            'property_id' => 3,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/15',
            'end_date' => '2020/10/18',
            'property_id' => 4,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/30',
            'property_id' => 5,
            'type_sponsorship_id' => 1
        ]);
        
    }
}
