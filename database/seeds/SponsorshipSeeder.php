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

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => date('Y/m/d'),
            'end_date' => '2023/10/30',
            'property_id' => 1,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => date('Y/m/d'),
            'end_date' => '2023/10/18',
            'property_id' => 11,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => date('Y/m/d'),
            'end_date' => '2023/10/30',
            'property_id' => 7,
            'type_sponsorship_id' => 1
        ]);

        factory(Sponsorship::class) -> times(1) -> create([
            'start_date' => date('Y/m/d'),
            'end_date' => '2023/10/18',
            'property_id' => 19,
            'type_sponsorship_id' => 1
        ]);

        

    }
}
