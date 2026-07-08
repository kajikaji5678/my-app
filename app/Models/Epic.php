<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|Epic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Epic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Epic query()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @mixin \Eloquent
 */
class Epic extends Model
{
    use HasFactory;

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
