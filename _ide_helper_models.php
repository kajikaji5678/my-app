<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $start_date
 * @property string $end_date
 * @property string $days
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PtoRequestFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PtoRequest whereUserId($value)
 */
	class PtoRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Role|null $role
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $before_salary
 * @property int $after_salary
 * @property string $reason
 * @property string $status
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SalaryRequestFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereAfterSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereBeforeSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalaryRequest whereUserId($value)
 */
	class SalaryRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $date
 * @property int|null $start_time
 * @property int|null $end_time
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereUserId($value)
 */
	class Schedule extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperStartAndEndTime
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $status
 * @property-read mixed $overtime_minutes
 * @property-read mixed $salary_sum
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\StartAndEndTimeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StartAndEndTime whereUserId($value)
 */
	class StartAndEndTime extends \Eloquent {}
}

namespace App\Models{
/**
 * @mixin IdeHelperUser
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
 * @property string $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PtoRequest> $ptoRequest
 * @property-read int|null $pto_request_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SalaryRequest> $salaryRequest
 * @property-read int|null $salary_request_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Schedule> $schedules
 * @property-read int|null $schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StartAndEndTime> $works
 * @property-read int|null $works_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHourlyWage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalarySum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

