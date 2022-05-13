<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        if (User::count()) {
            return;
        }

        User::create([
            'name'              => 'Arendach Taras',
            'email'             => 'arendach.taras@gmail.com',
            'email_verified_at' => now(),
            'password'          => \Hash::make('qwerty123'),
            'remember_token'    => '',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
