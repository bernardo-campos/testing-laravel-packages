<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('admin');

        User::create([
            'name' => 'guest',
            'email' => 'guest@example.com',
            'password' => bcrypt('123123123'),
        ])->assignRole('guest');
    }
}
