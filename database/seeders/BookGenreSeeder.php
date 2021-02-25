<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=50; $i++)
        {
            $book = Book::find($i);
            $genre_id = rand(1,4);
            $book->genres()->sync($genre_id);
        }
    }
}
