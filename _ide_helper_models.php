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
 * @property string $category_name
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $milestone_name
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereMilestoneName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Milestone extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $projects_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $projects_key
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Milestone> $Milestone
 * @property-read int|null $milestone_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Type> $type
 * @property-read int|null $type_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectsKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Project extends \Eloquent {}
}

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
 * @property-read User $user
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
 * @mixin \Eloquent
 */
	class PtoRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $role_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RoleUser> $roleUsers
 * @property-read int|null $role_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $user
 * @property-read int|null $user_count
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
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
 * @mixin \Eloquent
 * @property-read RoleLevel|null $requiredLevel
 */
	class RoleLevel extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role_level_id
 * @property-read \App\Models\Role $role
 * @property-read \App\Models\RoleLevel $roleLevel
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereRoleLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUserId($value)
 * @mixin \Eloquent
 */
	class RoleUser extends \Eloquent {}
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
 * @property-read User $user
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
 * @mixin \Eloquent
 */
	class SalaryRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $date
 * @property string|null $start_time
 * @property string|null $end_time
 * @property-read User $user
 * @method static \Database\Factories\SchedulesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedules whereUserId($value)
 * @mixin \Eloquent
 */
	class Schedules extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $status
 * @property-read mixed $overtime_minutes
 * @property-read mixed $salary_sum
 * @property-read User $user
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
 * @mixin \Eloquent
 */
	class StartAndEndTime extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $status_name
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereStatusName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder|TaksRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaksRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaksRole query()
 */
	class TaksRole extends \Eloquent {}
}

namespace App\Models{
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
 * @mixin \Eloquent
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $type_name
 * @property int $projects_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereProjectsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Type extends \Eloquent {}
}

namespace App\Models{
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
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

