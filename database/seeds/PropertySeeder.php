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

        // Appartamento 4
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa a Torino',
            'state' => 'Italy',
            'city' => 'Turin',
            'address' => 'Via Santa Teresa',
            'lat' => 45.068974, 
            'lng' => 7.681364,
            'm2' =>150,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 2,
            'available' => 0,
            'description' => 'Appartamento vicino alla stazione Centrale Milano, ottimo per lavoratori',
            'deleted' => 0,
            'user_id' => 2,
            'img' => 'torino1.jpg'
        ]);

        // Appartamento 5
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento a Torino',
            'state' => 'Italy',
            'city' => 'Turin',
            'address' => 'Via Madonna Cristina',
            'lat' => 45.052104, 
            'lng' => 7.678966,
            'm2' => 60,
            'floors' => 4,
            'beds' => 1,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Casa zona San Salvario, Torino',
            'deleted' => 0,
            'user_id' => 2,
            'img' => 'torino2.jpg'
        ]);

        // ===============================     Proprieta Roma

        // Appartamento 6
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento a Roma',
            'state' => 'Italy',
            'city' => 'Rome',
            'address' => 'Via Firenze',
            'lat' => 41.902926, 
            'lng' => 12.493343,
            'm2' => 120,
            'floors' => 4,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Appartamento appena ristrutturato zona Repubblica, vicino alla Metro A',
            'deleted' => 0,
            'user_id' => 3,
            'img' => 'roma1.jpg'
        ]);

        // Appartamento 7
        factory(Property::class) -> times(1) -> create([
            'name' => 'Villa alle porte di Roma',
            'state' => 'Italy',
            'city' => 'Rome',
            'address' => "Via dell'Acqua Santa",
            'lat' => 41.853076, 
            'lng' => 12.534791,
            'm2' => 322,
            'floors' => 3,
            'beds' => 5,
            'bathrooms' => 3,
            'available' => 0,
            'description' => 'Villa vicino Via Appia, Roma Sud, accogliente e spaziosa, quartiere Appio Pignatelli',
            'deleted' => 0,
            'user_id' => 3,
            'img' => 'roma2.jpg'
        ]);

        // Appartamento 7
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa Roma Nord',
            'state' => 'Italy',
            'city' => 'Rome',
            'address' => "Viale Tiziano",
            'lat' => 41.932512,  
            'lng' => 12.468271,
            'm2' => 150,
            'floors' => 6,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Appartamento zona Ponte Milvio, Roma Nord',
            'deleted' => 0,
            'user_id' => 3,
            'img' => 'roma3.jpg'
        ]);

        // ===============================     Proprieta Napoli

        // Appartamento 8
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa in Centro a Napoli',
            'state' => 'Italy',
            'city' => 'Naples',
            'address' => "Via Genova",
            'lat' => 40.854886, 
            'lng' => 14.271820,
            'm2' => 80,
            'floors' => 1,
            'beds' => 1,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Bilocale a Napoli, pieno Centro',
            'deleted' => 0,
            'user_id' => 4,
            'img' => 'napoli1.jpg'
        ]);

        // Appartamento 9
        factory(Property::class) -> times(1) -> create([
            'name' => 'Villa sul mare',
            'state' => 'Italy',
            'city' => 'Naples',
            'address' => "Via Posillipo",
            'lat' => 40.811649, 
            'lng' => 14.205874,
            'm2' => 280,
            'floors' => 3,
            'beds' => 5,
            'bathrooms' => 3,
            'available' => 0,
            'description' => 'Villa sul Golfo di Napoli, spaziosa e ricca di comfort',
            'deleted' => 0,
            'user_id' => 4,
            'img' => 'napoli2.jpg'
        ]);

        // Appartamento 10
        factory(Property::class) -> times(1) -> create([
            'name' => 'Appartamento Napoli',
            'state' => 'Italy',
            'city' => 'Naples',
            'address' => "Via Antonio Toscano",
            'lat' => 40.847359, 
            'lng' => 14.275213,
            'm2' => 100,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Casa a Napoli, vicino al Porto',
            'deleted' => 0,
            'user_id' => 4,
            'img' => 'napoli3.jpg'
        ]);

        // ===============================     Proprieta Palermo
        
        // Appartamento 11
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa a Palermo',
            'state' => 'Italy',
            'city' => 'Palermo',
            'address' => "Via dei Leoni",
            'lat' => 38.147340, 
            'lng' => 13.341948,
            'm2' => 150,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Graziosa villetta nei pressi di Palermo',
            'deleted' => 0,
            'user_id' => 5,
            'img' => 'palermo1.jpg'
        ]);

         // ===============================     Proprieta Cagliari

         // Appartamento 12
        factory(Property::class) -> times(1) -> create([
            'name' => 'Moderno Appartamento a Cagliari',
            'state' => 'Italy',
            'city' => 'Cagliari',
            'address' => "Via Marche",
            'lat' => 39.227292,  
            'lng' => 9.118816,
            'm2' => 115,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Lussuosa casa a Cagliari Centro',
            'deleted' => 0,
            'user_id' => 6,
            'img' => 'cagliari1.jpg'
        ]);

        // ===============================     Proprieta Bari

        // Appartamento 13
        factory(Property::class) -> times(1) -> create([
            'name' => 'Villa a Bari',
            'state' => 'Italy',
            'city' => 'Bari',
            'address' => "Via Don Bosco",
            'lat' => 41.119672,   
            'lng' => 16.853135,
            'm2' => 300,
            'floors' => 3,
            'beds' => 5,
            'bathrooms' => 3,
            'available' => 0,
            'description' => 'Villa con Piscina nei pressi Bari',
            'deleted' => 0,
            'user_id' => 7,
            'img' => 'bari1.jpg'
        ]);

         // ===============================     Proprieta Bologna

         // Appartamento 14
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa a Bologna',
            'state' => 'Italy',
            'city' => 'Bologna',
            'address' => "Via Marsala",
            'lat' => 44.497571,    
            'lng' => 11.343635,
            'm2' => 100,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Casa a Bologna',
            'deleted' => 0,
            'user_id' => 8,
            'img' => 'bologna1.jpg'
        ]);

        // ===============================     Proprieta Venezia

        // Appartamento 15
        factory(Property::class) -> times(1) -> create([
            'name' => 'Weekend a venezia',
            'state' => 'Italy',
            'city' => 'Venice',
            'address' => "Calle Lion",
            'lat' => 45.436182,     
            'lng' => 12.345151,
            'm2' => 100,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Casa a Venezia',
            'deleted' => 0,
            'user_id' => 9,
            'img' => 'venezia1.jpg'
        ]);

        // Appartamento 16
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa a Venezia',
            'state' => 'Italy',
            'city' => 'Venice',
            'address' => "Via della Pila",
            'lat' => 45.478885,      
            'lng' => 12.234014,
            'm2' => 100,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Casa a Venezia',
            'deleted' => 0,
            'user_id' => 9,
            'img' => 'venezia2.jpg'
        ]);

        // ===============================     Proprieta Firenze
        
        // Appartamento 16
        factory(Property::class) -> times(1) -> create([
            'name' => 'Casa a Firenze',
            'state' => 'Italy',
            'city' => 'Florence',
            'address' => "Via Calimala",
            'lat' => 43.770484,       
            'lng' => 11.254404,
            'm2' => 100,
            'floors' => 2,
            'beds' => 2,
            'bathrooms' => 1,
            'available' => 0,
            'description' => 'Casa a Firenze',
            'deleted' => 0,
            'user_id' => 10,
            'img' => 'firenze2.jpg'
        ]);
    }
}
