<?php

use Illuminate\Database\Seeder;
use App\Property_Request;

class Property_requestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property_Request::class) -> times(1) -> create([
            'user_email' => 'ciao@ciao.ciao',
            'firstname' => 'ciao',
            'lastname' => 'ciao',
            'number' => 'ciao',
            'text' => 'ciao',
            'property_id' => 1
            ]);
    }
}
