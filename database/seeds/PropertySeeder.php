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
        // ===============================     Proprieta Milano

        // Appartamento 1
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento Milano centro',
            'state' => 'Italy',
            'city' => 'Milan',
            'address' => 'Via Larga',
            'lat' => 45.461727,
            'lng' => 9.192712,
            'm2' => 100,
            'floors' => 1,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Grazioso appartamento in centro a Milano',
            'deleted' => 0,
            'user_id' => 1,
            'img' => 'milano1.jpg'
        ]);

        // Appartamento 2
        factory(Property::class) -> times(1) -> create([
            'name' => 'BNB Milano',
            'state' => 'Italy',
            'city' => 'Milan',
            'address' => 'Via Senato',
            'lat' => 45.469675,
            'lng' => 9.198350,
            'm2' => 200,
            'floors' => 2,
            'beds' => 3,
            'bathrooms' => 2,
            'available' => 0,
            'description' => 'Casa spaziosa in pieno centro a Milano, vicino alla metro e molti altri servizi',
            'deleted' => 0,
            'user_id' => 1,
            'img' => 'milano2.jpg'
        ]);

        // Appartamento 3
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento vicino alla stazione centrale',
            'state' => 'Italy',
            'city' => 'Milan',
            'address' => 'Via Vitruvio',
            'lat' => 45.483112,
            'lng' => 9.205293,
            'm2' => 60,
            'floors' => 4,
            'beds' => 1,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Appartamento vicino alla stazione Centrale Milano, ottimo per lavoratori',
            'deleted' => 0,
            'user_id' => 1,
            'img' => 'milano3.jpg'
        ]);

        // ===============================     Proprieta Torino

        // Appartamento 3
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento vicino alla stazione centrale',
            'state' => 'Italy',
            'city' => 'Milan',
            'address' => 'Via Vitruvio',
            'lat' => 45.483112,
            'lng' => 9.205293,
            'm2' => 60,
            'floors' => 4,
            'beds' => 1,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Appartamento vicino alla stazione Centrale Milano, ottimo per lavoratori',
            'deleted' => 0,
            'user_id' => 1,
            'img' => 'milano3.jpg'
        ]);

       



    }
}
