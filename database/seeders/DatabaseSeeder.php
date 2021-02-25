<?php

namespace Database\Seeders;

use Couchbase\UserSettings;
use Database\Factories\UserFactory;
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
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(AuthorBookSeeder::class);
        $this->call(BookGenreSeeder::class);

//         \App\Models\User::factory(10)->create();
    }
}
