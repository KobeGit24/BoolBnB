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
       factory(Service::class) -> times(1) -> create(['name' => 'wi-fi']);
       factory(Service::class) -> times(1) -> create(['name' => 'parking']);
       factory(Service::class) -> times(1) -> create(['name' => 'pool']);
       factory(Service::class) -> times(1) -> create(['name' => 'concierge']);
       factory(Service::class) -> times(1) -> create(['name' => 'sauna']);
       factory(Service::class) -> times(1) -> create(['name' => 'sea view']);
       

    }
}
