<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration Users

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table -> string('firstname');
            $table -> string('lastname');

            $table -> string('email')->unique();
            $table -> timestamp('email_verified_at')->nullable();

            $table -> string('password');
            $table -> date('date_of_birth');
            $table -> boolean('visible') -> default(1);

            $table -> string('img') -> default('user.png');
            $table -> rememberToken();

            

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
        Schema::dropIfExists('users');
    }
}
