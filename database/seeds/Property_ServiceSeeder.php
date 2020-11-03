<?php

use Illuminate\Database\Seeder;

use App\Property_service;
use App\Property;
use App\Service;

class Property_ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Propertia 1
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 1, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 1, 'service_id' => 2]);

        // Propertia 2
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 2, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create(['property_id' => 2, 'service_id' => 2]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 2, 'service_id' => 4]);

        // Properita 3
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 3, 'service_id' => 1]);
       
        // Propertia 4
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 4, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 4, 'service_id' => 2]);

        //Proprieta 5
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 5, 'service_id' => 1]);

        //Properita 6
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 6, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 6, 'service_id' => 4]);

        //Propertia 7
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 7, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 7, 'service_id' => 2]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 7, 'service_id' => 3]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 7, 'service_id' => 4]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 7, 'service_id' => 5]);

        //Properita 8
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 8, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 8, 'service_id' => 2]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 8, 'service_id' => 4]);

        //Properita 9
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 9, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 9, 'service_id' => 2]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 9, 'service_id' => 3]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 9, 'service_id' => 4]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 9, 'service_id' => 5]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 9, 'service_id' => 6]);

        //Propertia 10
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 10, 'service_id' => 1]);

        //Proprieta 11
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 11, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 11, 'service_id' => 6]);

        //Proprieta 12
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 12, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 12, 'service_id' => 6]);

        //Properita 13
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 13, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 13, 'service_id' => 2]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 13, 'service_id' => 3]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 13, 'service_id' => 4]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 13, 'service_id' => 5]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 13, 'service_id' => 6]);

        //Proprieta 14
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 14, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 14, 'service_id' => 2]);

        //Proprieta 15
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 15, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 15, 'service_id' => 4]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 15, 'service_id' => 3]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 15, 'service_id' => 6]);

        // Proprieta 16
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 16, 'service_id' => 1]);

        //Proprieta 17
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 17, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 17, 'service_id' => 2]);

        //Proprieta 18
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 18, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 18, 'service_id' => 2]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 18, 'service_id' => 3]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 18, 'service_id' => 5]);

        //Proprieta 19
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 19, 'service_id' => 1]);
        factory(Property_service::class) -> times(1) -> create([ 'property_id' => 19, 'service_id' => 2]);
        
    }
}
