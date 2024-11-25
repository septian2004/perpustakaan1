<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function members()
{
    return $this->belongsToMany(Member::class, 'book_member')
                ->withPivot('borrowed_at', 'returned_at')
                ->withTimestamps();
}

}
