<?php

namespace App\Models;

use Dom\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

/**
 * @property int $id
 * @property int $comment_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentMention whereUserId($value)
 * @mixin \Eloquent
 */
class CommentMention extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
