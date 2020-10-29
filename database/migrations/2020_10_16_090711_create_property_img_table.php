<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration per immagini delle proprietà

class CreatePropertyImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('property_img', function (Blueprint $table) {

            $table->id();

            $table -> boolean('deleted');
            $table -> string('img');
            $table -> foreignId('property_id'); // Chiave esterna per la proprietà corrispondente

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_img');
    }
}
