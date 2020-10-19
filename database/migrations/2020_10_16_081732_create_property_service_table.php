<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration per servizi proprietà 

class CreatePropertyServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('property_service', function (Blueprint $table) {
            $table->id();
            
            $table -> foreignId('property_id'); // Chiave esterna per la proprietà
            $table -> foreignId('service_id'); // Chiave esterna per il servizio
            
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
        Schema::dropIfExists('property_service');
    }
}
