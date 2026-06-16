<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\StartAndEndTime; // 出勤退勤時間との接続
use App\Models\Schedules; // スケジュールとの接続
use App\Models\SalaryRequest; // 給与更新との接続
use App\Models\PtoRequest;
use App\Models\Role;
use App\Models\Projects;
use App\Models\Task;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $hourly_wage
 * @property int $salary_sum
 * @property int $admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, PtoRequest> $ptoRequest
 * @property-read int|null $pto_request_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, SalaryRequest> $salaryRequest
 * @property-read int|null $salary_request_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Schedules> $schedules
 * @property-read int|null $schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Task> $task
 * @property-read int|null $task_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, StartAndEndTime> $works
 * @property-read int|null $works_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHourlyWage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalarySum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RoleUser> $roleUsers
 * @property-read int|null $role_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property string|null $icon
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskAssign> $TaskAssign
 * @property-read int|null $task_assign_count
 * @property-read mixed $icon_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTask> $userTask
 * @property-read int|null $user_task_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIcon($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Comment> $comment
 * @property-read int|null $comment_count
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'houry_wage',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 従業員はいくつもの出退勤を行うリレーション
    public function works()
    {
        return $this->hasMany(StartAndEndTime::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }

    public function salaryRequest()
    {
        return $this->hasMany(SalaryRequest::class);
    }

    public function ptoRequest()
    {
        return $this->hasMany(PtoRequest::class);
    }

    public function roleUsers()
    {
        return $this->hasMany(RoleUser::class);
    }

    public function task()
    {
        return $this->belongsToMany(Task::class);
    }

    public function userTask() {
        return $this->hasMany(UserTask::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('role_level_id');
    }

    public function TaskAssign()
    {
        return $this->hasMany(TaskAssign::class);
    }

    public function getIconUrlAttribute() {
        return $this->icon ? asset('storage/' . $this->icon) : asset('img/human.png');
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}

//
