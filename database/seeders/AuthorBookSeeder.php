<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
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
            $author_id = [];

            $howManyAuthors = rand(1,4);
            for($y = 1; $y<=$howManyAuthors; $y++)
            {
                $author_id[] = rand(1,45);
            }

            $book->authors()->sync($author_id);
        }
    }
}
