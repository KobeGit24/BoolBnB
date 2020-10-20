<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call(UserSeeder::class);
        $this -> call(PropertySeeder::class);
        $this -> call(Property_imgSeeder::class);
        $this -> call(RequestSeeder::class);
        $this -> call(Property_viewsSeeder::class);
        $this -> call(ServiceSeeder::class);
        $this -> call(Type_SponsorshipSeeder::class);
        $this -> call(Property_ServiceSeeder::class);
        $this -> call(SponsorshipSeeder::class);
    }
}
