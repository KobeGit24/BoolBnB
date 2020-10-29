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
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento Milano centro',
            'state' => 'Italy',
            'city' => 'Milan',
            'address' => 'Via Larga',
            'lat' => 45.461727,
            'lng' => 9.192712,
            'm2' => 100,
            'floors' => 1,
            'beds' => 3,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Grazioso appartamento in centro a Milano',
            'deleted' => 0,
            'user_id' => 1,
            'img' => 'property.jpg'
        ]);

        factory(Property::class) -> times(1) -> create([
            'name' => 'Villa alle porte di Roma',
            'state' => 'Italy',
            'city' => 'Rome',
            'address' => 'Via Appia',
            'lat' => 41.844976,
            'lng' => 12.551489,
            'm2' => 400,
            'floors' => 3,
            'beds' => 5,
            'bathrooms' => 3,
            'available' => 0,
            'description' => 'Villa storica alle porte di Roma, circondata dalla natura',
            'deleted' => 0,
            'user_id' => 2,
            'img' => 'property.jpg'
        ]);

        factory(Property::class) -> times(1) -> create([
            'name' => 'Grazioso appartamento in centro Roma',
            'state' => 'Italy',
            'city' => 'Rome',
            'address' => 'Via del Corso',
            'lat' => 41.903213,
            'lng' => 12.479498,
            'm2' => 75,
            'floors' => 1,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Appartamento centralissimo a Roma, via del corso',
            'deleted' => 0,
            'user_id' => 2,
            'img' => 'property.jpg'
        ]);

        factory(Property::class) -> times(1) -> create([
            'name' => 'Attico panoramico Napoli',
            'state' => 'Italy',
            'city' => 'Naples',
            'address' => 'Via Posillipo',
            'lat' => 40.811611,
            'lng' => 14.205786,
            'm2' => 100,
            'floors' => 1,
            'beds' => 2,
            'bathrooms' => 2,
            'available' => 0,
            'description' => 'Attico panoraico alle porte di Napoli, vista mare',
            'deleted' => 0,
            'user_id' => 3,
            'img' => 'property.jpg'
        ]);

        factory(Property::class) -> times(1) -> create([
            'name' => 'Monolocale in centro',
            'state' => 'Italy',
            'city' => 'Naples',
            'address' => 'Via Firenze',
            'lat' => 40.854010,
            'lng' => 14.269197,
            'm2' => 100,
            'floors' => 1,
            'beds' => 2,
            'bathrooms' => 2,
            'available' => 0,
            'description' => 'Appartamento appena ristrutturato, Napoli centrale',
            'deleted' => 0,
            'user_id' => 3,
            'img' => 'property.jpg'
        ]);



    }
}
