<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $role_level
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RoleUser> $roleUsers
 * @property-read int|null $role_users_count
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel whereRoleLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleLevel whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaksRole> $taskRoles
 * @property-read int|null $task_roles_count
 * @mixin \Eloquent
 */
class RoleLevel extends Model
{
    use HasFactory;

    public function roleUsers() {
        return $this->hasMany(RoleUser::class);
    }

    public function taskRoles() {
        return $this->hasMany(TaksRole::class, 'required_level_id');
    }
}
