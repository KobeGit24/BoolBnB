<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// MIGRATION FOREIGN KEY

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        // CHIAVI ESTERNE

        // Per ogni Pagante c'è un solo utente
        Schema::table('payers', function (Blueprint $table) {
            $table -> foreign('user_id', 'payers-users') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('users');
        });

        // Per ogni proprietà c'è un solo user
        Schema::table('properties', function (Blueprint $table) {
            $table -> foreign('user_id', 'usr-prop') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('users');
        });

        // Per ogni immagine proprietà c'è una sola proprietà
        Schema::table('property_img', function (Blueprint $table) {
            $table -> foreign('property_id', 'prop_img-prop') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('properties');
        });

        // Per ogni visualizzazione c'è una sola proprietà 
        Schema::table('property_views', function (Blueprint $table) {
            $table -> foreign('property_id', 'prop_views-prop') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('properties');
        });

        // Per ogni richiesta c`è una sola proprietà 
        Schema::table('requests', function (Blueprint $table) {
            $table -> foreign('property_id', 'req-prop') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('properties');
        });

        // Per ogni sponsorizzazione c'è una sola proprietà 
        Schema::table('sponsorships', function (Blueprint $table) {
            $table -> foreign('property_id', 'sponsorships-prop') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('properties');
        });

        // Per ogni servizio c'è una sola prorietà 
        Schema::table('property_service', function (Blueprint $table) {
            $table -> foreign('property_id', 'prop_service-prop') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('properties');
        });

        // Per ogni servizio c'è un solo tipo di servizio
        Schema::table('property_service', function (Blueprint $table) {
            $table -> foreign('service_id', 'prop_service-service') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('services');
        });

        // Per ogni sponsorizzazione c'è un solo tipo di sponsorizzazione
        Schema::table('sponsorships', function (Blueprint $table) {
            $table -> foreign('type_sponsorship_id', 'type_sponsorship-sponsorship') 
                 -> onDelete('cascade')
                 -> references('id') 
                 -> on('type_sponsorship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Eliminazione Relations
        Schema::table('payers', function (Blueprint $table) {
            $table -> dropForeign('payers-users');
        });
        
        Schema::table('properties', function (Blueprint $table) {
            $table -> dropForeign('usr-prop');
        });

        Schema::table('property_img', function (Blueprint $table) {
            $table -> dropForeign('prop_img-prop');
        });


        Schema::table('property_views', function (Blueprint $table) {
            $table -> dropForeign('prop_views-prop');
        });

        Schema::table('requests', function (Blueprint $table) {
            $table -> dropForeign('req-prop');
        });

        Schema::table('sponsorships', function (Blueprint $table) {
            $table -> dropForeign('sponsorships-prop');
        });

        Schema::table('property_service', function (Blueprint $table) {
            $table -> dropForeign('prop_service-prop');
        });

        Schema::table('property_service', function (Blueprint $table) {
            $table -> dropForeign('prop_service-service');
        });

        Schema::table('sponsorships', function (Blueprint $table) {
            $table -> dropForeign('type_sponsorship-sponsorship');
        });
    }
}
