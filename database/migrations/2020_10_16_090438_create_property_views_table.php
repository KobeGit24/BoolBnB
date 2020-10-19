<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration per le visualizzazioni prorietà 

class CreatePropertyViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_views', function (Blueprint $table) {
            $table->id();

            $table -> date('date');
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
        Schema::dropIfExists('property_views');
    }
}
