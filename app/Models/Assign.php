<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    public function comment() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
