<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Service::class) -> times(1) -> create(['name' => 'wi-fi']);          // 1
       factory(Service::class) -> times(1) -> create(['name' => 'parking']);        // 2
       factory(Service::class) -> times(1) -> create(['name' => 'pool']);           // 3
       factory(Service::class) -> times(1) -> create(['name' => 'concierge']);      // 4
       factory(Service::class) -> times(1) -> create(['name' => 'sauna']);          // 5
       factory(Service::class) -> times(1) -> create(['name' => 'sea view']);       // 6
       

    }
}
