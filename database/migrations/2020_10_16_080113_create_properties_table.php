<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table -> decimal('lat', 7, 5);
            $table -> decimal('lng', 7, 5);
            $table -> integer('m2');
            $table -> integer('floors');
            $table -> integer('beds');
            $table -> integer('bathrooms');
            $table -> boolean('available');
            $table -> longText('description');
            $table -> boolean('deleted');

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
