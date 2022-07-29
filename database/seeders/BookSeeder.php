<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::find(1)->books()->createMany([
            ['year' => 1974, 'name' => "Carrie"],
            ['year' => 1983, 'name' => "Pet Sematary"],
            ['year' => 1986, 'name' => "It"],
            ['year' => 2009, 'name' => "Under the Dome"],
        ]);

        Author::find(2)->books()->createMany([
            ['year' => 1997, 'name' => "Harry Potter and the Philosopher's Stone"],
            ['year' => 1998, 'name' => "Harry Potter and the Chamber of Secrets"],
            ['year' => 1999, 'name' => "Harry Potter and the Prisoner of Azkaban"],
            ['year' => 2000, 'name' => "Harry Potter and the Goblet of Fire"],
            ['year' => 2003, 'name' => "Harry Potter and the Order of the Phoenix"],
            ['year' => 2005, 'name' => "Harry Potter and the Half-Blood Prince"],
            ['year' => 2007, 'name' => "Harry Potter and the Deathly Hallows"],
        ]);
    }
}
