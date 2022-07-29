<?php

namespace Database\Seeders;

use Database\Seeders\AuthorSeeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}
