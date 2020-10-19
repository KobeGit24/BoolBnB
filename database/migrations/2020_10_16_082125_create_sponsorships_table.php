<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration per le sponsorizzazioni

class CreateSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();

            $table -> date('start_date');
            $table -> date('end_date');

            $table -> foreignId('property_id'); // Chiave esterna per la proprietà corrispondente
            $table -> foreignId('type_sponsorship_id'); // Chiave esterna per il tipo di sponsorizzazione

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
        Schema::dropIfExists('sponsorships');
    }
}
