<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\StartAndEndTime; // 出勤退勤時間との接続
use App\Models\Schedule; // スケジュールとの接続
use App\Models\SalaryRequest; // 給与更新との接続
use App\Models\PtoRequest;
use App\Models\Role;
use App\Models\Projects;

/**
 * @mixin IdeHelperUser
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
        'admin',
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
    public function works() {
        return $this->hasMany(StartAndEndTime::class);
    }

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }

    public function salaryRequest() {
        return $this->hasMany(SalaryRequest::class);
    }

    public function ptoRequest() {
        return $this->hasMany(PtoRequest::class);
    }

    public function roles() {
        return $this->belongsTo(Role::class);
    }

    public function projects () {
        return $this->belongsToMany(Projects::class);
    }
}
