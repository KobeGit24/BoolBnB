<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration Richieste

class CreatePropertyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('property_requests', function (Blueprint $table) {
            $table->id();

            $table -> string('user_email');
            $table -> string('firstname');
            $table -> string('lastname');
            $table -> string('number');
            $table -> longText('text');

            $table -> foreignId('property_id'); // Chiave esterna per la proprietà richiesta
            
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
        Schema::dropIfExists('property_requests');
    }
}
