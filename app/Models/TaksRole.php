<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \App\Models\RoleLevel|null $requiredLevel
 * @method static \Illuminate\Database\Eloquent\Builder|TaksRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaksRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaksRole query()
 * @mixin \Eloquent
 */
class TaksRole extends Model
{
    use HasFactory;

    public function requiredLevel() {
        return $this->belongsTo(RoleLevel::class, 'required_level_id');
    }
}
