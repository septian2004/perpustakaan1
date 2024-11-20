<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function books()
{
    return $this->belongsToMany(Book::class, 'book_member')
                ->withPivot('borrowed_at', 'returned_at')
                ->withTimestamps();
}

}
