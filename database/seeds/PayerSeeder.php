<?php

use App\Payer;
use App\User;

use Illuminate\Database\Seeder;

class PayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payer::class, 10)
            -> make()
            -> each( function($payer) {

                $usr = User::inRandomOrder() -> first();
                $payer -> user() -> associate($usr);

                $payer -> save();
            });
    }
}
