<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['name' => 'Fiction']);
        Genre::create(['name' => 'Novel']);
        Genre::create(['name' => 'Self Development']);
        Genre::create(['name' => 'Mystery']);

    }
}
