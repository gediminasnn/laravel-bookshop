<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'cover', 'price', 'discount', 'user_id', 'status'];

    protected $attributes = ['status' => 0];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }

    public function getDiscountedPriceAttribute()
    {
        if($this->discount > 0)
        {
            return round($this->price - ($this->discount / 100) * $this->price, 0) / 100;
        } else {
            return $this->price;
        }
    }

    public function getIsNewAttribute ()
    {
        return now()->subdays(7) <= $this->created_at;
    }

    public function getPricePointAttribute ()
    {
        return $this->price / 100;
    }
}
