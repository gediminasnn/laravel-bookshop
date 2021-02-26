<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'report'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
