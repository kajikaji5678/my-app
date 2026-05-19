<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @property int $id
 * @property string $name
 * @property string|null $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ProjectsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Projects newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects query()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Projects extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
