<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleLevel extends Model
{
    use HasFactory;

    public function roleUsers() {
        return $this->hasMany(RoleUser::class);
    }
}
