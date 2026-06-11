<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign query()
 * @property int $id
 * @property string $assign_name
 * @property int $user_id
 * @property int $task_id
 * @property string $assign_content
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereAssignContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereAssignName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskAssign whereUserId($value)
 * @mixin \Eloquent
 */
class TaskAssign extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_name',
        'start_time',
        'end_time',
        'task_id',
        'user_id',
        'assign_content'
    ];

    public function user()
    {
        $this->belongsToMany(User::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }
}
