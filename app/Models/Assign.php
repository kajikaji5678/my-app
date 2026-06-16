<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comment
 * @property-read int|null $comment_count
 * @method static \Illuminate\Database\Eloquent\Builder|Assign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assign query()
 * @mixin \Eloquent
 */
class Assign extends Model
{
    use HasFactory;

    public function comment() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
