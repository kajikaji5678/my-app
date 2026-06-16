<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Category;
use App\Models\Type;
use App\Models\Milestone;
use App\Models\User;
use App\Models\Role;
use App\Models\Status;

/**
 * @property int $id
 * @property string $task_name
 * @property int $project_id
 * @property int $category_id
 * @property int $type_id
 * @property int $milestone_id
 * @property string $status
 * @property string $status_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status_id
 * @property-read Category $category
 * @property-read Milestone $milestone
 * @property-read Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Status|null $statuses
 * @property-read Type $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereMilestoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatusColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTaskName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskAssign> $taskAssigns
 * @property-read int|null $task_assigns_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTask> $userTask
 * @property-read int|null $user_task_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comment
 * @property-read int|null $comment_count
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory;

    //* CRUDでテーブル名あるのにエラー出てきたなら$fillableが抜けてる可能性
    protected $fillable = [
        'id',
        'task_name',
        'project_id',
        'category_id',
        'type_id',
        'milestone_id',
        'status',
        'status_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userTask() {
        return $this->hasMany(UserTask::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function statuses() {
        return $this->belongsTo(Status::class);
    }

    public function taskAssigns() {
        return $this->hasMany(TaskAssign::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
