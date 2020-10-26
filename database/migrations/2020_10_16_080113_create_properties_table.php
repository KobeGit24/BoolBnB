<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration properties

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            
            $table -> id();

            $table -> string('name');
            $table -> string('state');
            $table -> string('city');
            $table -> string('address');
            $table -> longText('description');

            $table -> decimal('lat', 9, 6);
            $table -> decimal('lng', 9, 6);

            $table -> integer('m2');
            $table -> integer('floors');
            $table -> integer('beds');
            $table -> integer('bathrooms');

            $table -> boolean('available') -> default(0);
            $table -> boolean('deleted') -> default(0);
            
            $table -> foreignId('user_id'); // Chiave esterna per utente

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
