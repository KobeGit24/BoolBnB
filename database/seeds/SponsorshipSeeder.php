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

        // PASSATA
        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/15',
            'end_date' => '2020/10/19',
            'property_id' => 4,
            'type_sponsorship_id' => 3
        ]);

        // PASSATA
        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/10',
            'end_date' => '2020/10/11',
            'property_id' => 2,
            'type_sponsorship_id' => 3
        ]);
        
        // ATTIVA
        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/26',
            'property_id' => 1,
            'type_sponsorship_id' => 3
        ]);
        
        // ATTIVA
        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/22',
            'property_id' => 2,
            'type_sponsorship_id' => 3
        ]);

        // PASSATA
        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/9',
            'end_date' => '2020/10/10',
            'property_id' => 10,
            'type_sponsorship_id' => 3
        ]);

         // ATTIVA
         factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/23',
            'property_id' => 3,
            'type_sponsorship_id' => 3
        ]);

         // ATTIVA
         factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => '2020/10/20',
            'end_date' => '2020/10/29',
            'property_id' => 4,
            'type_sponsorship_id' => 3
        ]);
        
    }
}
