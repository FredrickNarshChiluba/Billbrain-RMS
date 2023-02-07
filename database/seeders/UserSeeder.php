<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>  'Ssembatya Isaac',
            'email' => 'ducky@gmail.com',
            'password' =>  Hash::make('secret'),
        ]);

        User::create([
            'name' =>  'Amokol Priscilla',
            'email' => 'amokol@gmail.com',
            'password' =>  Hash::make('secret'),
        ]);
    }
}
