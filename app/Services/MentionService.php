<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\User;

class MentionService
{
    public function sync(Comment $comment)
    {
        //@マークの後に空白および@を除く文字が1文字以上続く
        preg_match_all('/@([^\s@]+)/u', $comment->body, $matches);
        $names = array_unique($matches[1]);
        $users = User::whereIn('name', $names)->get();
        $comment->mentions()->delete();
        foreach($users as $user) {
            $comment->mentions()->create(['user_id' => $user->id]);
        }
    }
}
