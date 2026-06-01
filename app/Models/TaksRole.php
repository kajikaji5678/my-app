<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaksRole extends Model
{
    use HasFactory;

    public function requiredLevel() {
        return $this->belongsTo(RoleLevel::class, 'required_level_id');
    }
}
