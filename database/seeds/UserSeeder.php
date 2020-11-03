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
        // Proprietario delle case Milano
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Valerio',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@milano.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Torino
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Marco',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@torino.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Roma
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Gianni',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@roma.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Napoli
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Federico',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@napoli.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Palermo
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Franco',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@palermo.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Cagliari
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Sara',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@cagliari.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Bari
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Valentina',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@bari.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Bologna
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Giulia',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@bologna.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Venezia
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Claudio',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@venezia.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Firenze
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Nicole',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@firenze.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Monza
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Valentina',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@monza.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);

        // Proprietario delle case Caserta
        factory(User::class) -> times(1) -> create([
            'firstname' => 'Biagio',
            'lastname' => 'Timone',
            'date_of_birth' => '1998/02/04',
            'email' => 'case@caserta.it',
            'email_verified_at' => now(),
            'password' => Hash::make('provaprova'),
            'visible' => 1,
            'img' => 'user.png',
            'remember_token' => Str::random(10),
        ]);



        

    }
}
