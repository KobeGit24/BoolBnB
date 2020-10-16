<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            
           

            $table->timestamps();
        });

        
         // CREARE CAMPO IMMAGINE (MEDIUMBLOB - IMG USER)
         DB::statement('ALTER TABLE property_img ADD img MEDIUMBLOB');
        
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
