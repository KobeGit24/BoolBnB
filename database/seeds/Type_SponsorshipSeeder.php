<?php

use Illuminate\Database\Seeder;
use App\Type_Sponsorship;

class Type_SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type_Sponsorship::class) -> times(1) -> create(['name' => 'h24', 'price' => 2.99]);
        factory(Type_Sponsorship::class) -> times(1) -> create(['name' => 'h72', 'price' => 5.99]);
        factory(Type_Sponsorship::class) -> times(1) -> create(['name' => 'h144', 'price' => 9.99]);

    }
}
