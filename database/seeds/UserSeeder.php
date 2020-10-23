<?php

use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(User::class, 50) -> create();

        factory(User::class) -> times(1) -> create([
            'firstname' => 'Valerio',
            'lastname' => 'Trinca',
            'date_of_birth' => '1998/02/04',
            'email' => 'ciao@ciao.ciao',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        factory(User::class) -> times(1) -> create([
            'firstname' => 'Marco',
            'lastname' => 'Timone',
            'date_of_birth' => '1980/11/14',
            'email' => 'marcotimone@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        factory(User::class) -> times(1) -> create([
            'firstname' => 'Giuseppe',
            'lastname' => 'Germano',
            'date_of_birth' => '1990/06/05',
            'email' => 'giuseppe@miamail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

    }
}
