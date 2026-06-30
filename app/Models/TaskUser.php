<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property int|null $assigned_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $assign
 * @property-read \App\Models\Task $task
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereAssignedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereUserId($value)
 * @property int|null $real_time
 * @method static \Illuminate\Database\Eloquent\Builder|TaskUser whereRealTime($value)
 * @mixin \Eloquent
 */
class TaskUser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function assign()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
